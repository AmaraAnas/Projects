<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Les Jourdets - R&eacute;servations</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  
<?php
$path = $_SERVER['PHP_SELF'];
$page = basename ($path);
$toprep = "../../";

include("../rconfig.php");

if (isset($_GET['arrivee']))
	$arrivee=$_GET['arrivee'];
else
	$arrivee = date('Y_m-j',time());
	
if (isset($_GET['chambre']))
	$chambre=(int)$_GET['chambre']; 
else
	$chambre=0;
	

$nom_chambre = $chambres_names[$chambre];
$mask = 1 << ( $chambre );

		
include("../config.inc.php");
include("../fonctions.php");

$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$result = mysql_query("SELECT * FROM calendrier WHERE jour='".$arrivee."' AND ((nch&".$mask.")!=0)");
if (!$result) 
	{  die('Invalid query: ' . mysql_error());}
	
$mod = false;
$njours = 1;
$id = -1;

if ( @mysql_num_rows($result) > 0 ) 
	{
	$row = @mysql_fetch_assoc($result);
	$mod = true;
	echo '<h3>Mofification/Annulation réservation pour la chambre '.$nom_chambre;
	$njours = $row['njours'];
	echo '<br/>Arrivée : '.$arrivee.'</h3>';
	$infos = $row['infos'];
	$id = $row['num'];
	}
else
	{
	echo '<h3>Création réservation pour la chambre '.$nom_chambre;
	echo '<br/>Arrivée : '.$arrivee.'</h3>';
	}
echo '</hr>';


?>	

<form action="calendar_mod2.php" method="get" >
<fieldset><legend>Infos réservation</legend>
<p>Nombre de nuits : <select name="njours">
<option value="1" <?php if ( $njours==1 ) echo 'selected="selected"'; ?> >1</option>

<?php 
$jour = inc_jour($arrivee);
for ( $i = 2 ; $i < 15 ; $i++ )
	{
	$result = mysql_query("SELECT * FROM calendrier WHERE jour='".$jour."' AND ((nch&".$mask.")!=0)");
	if (!$result) 
		{  die('Invalid query: ' . mysql_error());}
	if ( @mysql_num_rows($result) > 0 ) 
		break; // une autre resa start ici ...
	$result = mysql_query("SELECT * FROM fermetures WHERE ffrom='".$jour."' AND ((nch&".$mask.")!=0)");
	if (!$result) 
		{  die('Invalid query: ' . mysql_error());}
	if ( @mysql_num_rows($result) > 0 ) 
		break; // une période de fermeture start ici ..
	echo '<option value="'.$i.'" ';
	if ( $njours == $i ) echo 'selected="selected"';
	echo '>'.$i.'</option>';
	$jour = inc_jour($jour);
	}
?>

</select></p>
<p>Infos réservations<br/>
<textarea name="infos" rows="4" cols="40">
<?php 
if ( $mod )
	echo $infos;
?>
</textarea></p>
<input name="arrivee" type="hidden" value="<?php echo $arrivee; ?>" />
<input name="mask" type="hidden" value="<?php echo $mask; ?>" />
<input name="id" type="hidden" value="<?php echo $id; ?>" />
<input type="submit" value="CREER" name="action" <?php if ( $mod ) echo 'disabled';?>/>
<input type="submit" value="MODIFIER" name="action" <?php if ( !$mod ) echo 'disabled';?>/>
<input type="submit" value="DETRUIRE" name="action" <?php if ( !$mod ) echo 'disabled';?>/>
</fieldset>
</form>
<?php 
$m = (int)substr($arrivee, 5, 2);
$a = (int)substr($arrivee, 0, 4);
mysql_close($connect);
?>

<form action="calendar_mod.php" method="get">
<input name="an" type="hidden" value="<?php echo $a; ?>" />
<input name="mois" type="hidden" value="<?php echo $m; ?>" />
<input name="retour" type="submit" style="align:center" value="ANNULER" />
</form>


</body>
</html>