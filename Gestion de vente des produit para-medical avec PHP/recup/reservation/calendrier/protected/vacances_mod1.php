<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>Les Jourdets - Vacances</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css" media="screen">@import url(seldate.css);</style>
  <script type="text/javascript" src="seldate.js"></script> 

</head>
<body>
  
<?php
$path = $_SERVER['PHP_SELF'];
$page = basename ($path);

date_default_timezone_set('Europe/Paris');
$today = date("j/m/Y", time());
$an = date("Y", time());
$mois = date("m", time());

include("../rconfig.php");
include("../config.inc.php");
include("../fonctions.php");

$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

?>	

<fieldset><legend>Fermetures enregistrées</legend>
<?php 

function datefr($date) { 
$split = preg_split("/-/",$date); 
$annee = $split[0]; 
$mois = $split[1]; 
$jour = $split[2]; 
return "$jour"."/"."$mois"."/"."$annee"; 
} 

$requete = mysql_query("SELECT * FROM fermetures");
while ($row = mysql_fetch_array($requete))
	{
	echo '<form action="vacances_mod2.php" method="get" >';
	echo '<input name="id" type="hidden" value="'.$row["id"].'" />';
	$from = datefr($row["ffrom"]);
	$to = datefr($row["fto"]);

	echo 'Du : <input type="text" name="from" class="calendrier" value="'.$from.'"/>
	Au : <input type="text" name="to" class="calendrier" value="'.$to.'"/>';
	
	$mask = $row['nch'];
	$m = 1;
	for ( $i = 0 ; $i < $nchambres; $i++ )
		{
		$name = 'ch['.$i.']';
		echo $chambres_names[$i].'<input name="'.$name.'" type="checkbox" ';
		if ( $mask & $m ) echo ' checked="checked"';
		echo '/>';
		$m = $m << 1;
		}
	
	echo '<input type="submit" value="MODIFIER" name="action" />';
	echo '<input type="submit" value="DETRUIRE" name="action" />';
	echo '</form><br/>';
	}
echo '<form action="vacances_mod2.php" method="get" >';
echo 'Du : <input type="text" name="from" class="calendrier" value="'.$today.'"/>
	  Au : <input type="text" name="to" class="calendrier" value="'.$today.'"/>';

for ( $i = 0 ; $i < $nchambres; $i++ )
	{
	$name = 'ch['.$i.']';
	echo $chambres_names[$i].'<input name="'.$name.'" type="checkbox" ';
	echo '/>';
	}
	
echo '<input type="submit" value="CREER" name="action" />';
echo '</form><br/>';

mysql_close($connect);

?>
</fieldset>

<a href="calendar_mod.php?mois=<?php echo $mois;?>&an=<?php echo $an;?>"><input value="RETOUR CALENDRIER" type="button"/></a>

</body>
</html>