<?php 
if (isset($_GET['lang']))
	$lang = $_GET['lang'];
else
	$lang = 'fr';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$path = $_SERVER['PHP_SELF'];
$page = basename ($path);

include("rconfig.php");

if ( $lang == 'fr' )
	{
	echo '<title>Les Jourdets - Demande R&eacute;servations</title>';
  	echo '<meta name="subject" content="Chambres d\'h&ocirc;tes - Demande de réservation" />';
  	echo '<meta name="keywords" content="Jourdets,réservation" />';
  	echo '<meta name="description" content="Chambres d\'h&ocirc;tes et table d\'h&ocirc;tes des Jourdets - Demande de réservation" />';
	$titre = "Votre demande de R&eacute;servation";
	$t1 = "Date d'arrivée";
	$t1a = "Nbre de personnes";
	$t2 = "Nbre de nuitées";
	$t2a = "Nom";
	$t2b = "Email";
	$t2c = "Message";
	$t3l = "Chambres demandées";
	$t3 = "Chambre";
	$ttotal = "Somme totale à payer en fin de séjour<br/>( hors table d'hôtes )";
	$t4 = "Vos coordonnées et message";
	$t5 = "Merci de préciser ici toute remarque utile ...";
	$t6 = "recopiez le code anti-spam";
	$t7 = "Envoyer la demande par mail";
	$t8 = "Réserver maintenant en effectuant un versement d'arrhes avec PayPal";
	$t9 = "Avec PayPal le montant des Arrhes est de 15 € / nuit / chambre";
	$repas1 = "Table d'hôtes le 1er soir";
	$what = "Vous pouvez faire une simple demande de disponibilité par mail<br/>ou effectuer directement une réservation en payant un acompte avec Paypal";
	$blang = 'fr_XC';
	}
else if ( $lang == 'en' )
	{
	echo '<title>Les Jourdets - Booking enquiry</title>';
  	echo '<meta name="subject" content="Les Jourdets - Booking" />';
  	echo '<meta name="keywords" content="Jourdets,booking" />';
  	echo '<meta name="description" content="Les Jourdets Bed and breakfast - Booking form" />';
	$titre = "Your booking enquiry";
	$t1 = "Arrival date";
	$t1a = "Number of people";
	$t2 = "Number of nights";
	$t2a = "Name";
	$t2b = "Email";
	$t2c = "Message";
	$t3l = "Required Rooms";
	$t3 = "Room";
	$ttotal = "Total sum to,pay at the end of stay";
	$t4 = "Your coordinates and message";
	$t5 = "Please write here any usefull info  ...";
	$t6 = "please copy the anti-spam code";
	$t7 = "Send email enquiry";
	$t8 = "Book now with an instant PayPal deposit";
	$t9 = "With PayPal the deposit is of 15 € / night / room";
	$repas1 = "Evening meal on first night";
	$what = "You can email us your enquiry<br/>or secure yourself the booking with a Paypal account.";
	$blang = 'en_US';
	}
else if ( $lang == 'es' )
	{
	echo '<title>Les Jourdets - Consulta poor reserva</title>';
  	echo '<meta name="subject" content="Habitaciones de hu&eacute;spedes - Reserva" />';
  	echo '<meta name="keywords" content="Jourdets,reserva" />';
  	echo '<meta name="description" content="Les Jourdets Habitaciones de hu&eacute - Consulta" />';
	$titre = "Su consulta";
	$t1 = "Fecha de llegada";
	$t1a = "Número de personas";
	$t2 = "Número de noches";
	$t2a = "Nombre";
	$t2b = "Email";
	$t2c = "Mensaje";
	$t3l = "Habitaciónes deseadas";
	$t3 = "Habitación";
	$ttotal = "Suma total que hay que pagar al final de estancia";
	$t4 = "Sus señas y mensaje";
	$t5 = "Por favor escriba aquí cualquier información útil ...";
	$t6 = "copie el código anti-spam";
	$t7 = "Enviar consulta por email";
	$t8 = "Reserve ahora con un pagado por PayPal";
	$t9 = "Con PayPal el pagado es de 15 € / noche / hab";
	$repas1 = "Cena por la primera tarde";
	$what = "Puede pedir su consulta por email<br/>o asegurar su reserva con un Pago Paypal";
	$blang = 'es_XC';
	}

include("fonctions.php");

function datefr($date) { 
$split = preg_split("/-/",$date); 
$annee = $split[0]; 
$mois = $split[1]; 
$jour = $split[2]; 
return "$jour"."-"."$mois"."-"."$annee"; 
} 

if (isset($_GET['arrivee']))
	$arrivee=$_GET['arrivee'];
else
	$arrivee = date('Y-m-d');
	
if (isset($_GET['chambre']))
	$mch=(int)$_GET['chambre'];
else
	$mch=1;

	
if (isset($_GET['nom']))
	$nom=$_GET['nom'];
else
	$nom="";
	
if (isset($_GET['mail']))
	$mail=$_GET['mail'];
else
	$mail="";
	
if (isset($_GET['nuits']))
	$nuits=(int)$_GET['nuits'];
else
	$nuits=1;
	
if (isset($_GET['npers']))
	$npers=(int)$_GET['npers'];
else
	$npers=2;
	
if (isset($_GET['message']))
	$message=$_GET['message'];
else
	$message="";
	
if (isset($_GET['repas']))
	$repas=$_GET['repas'];
else
	$repas="non";
	
	
// longueur possible du séjour dans cette chambre
include("dispos.php");

$dispos = array();
for ( $i = 0 ; $i < $nchambres ; $i++ )
	$dispos[$i] = chDispo($i,$arrivee);
	
?>
  <style type="text/css" media="screen">@import url(calendrier.css);</style>
  <!--   jquery -->
  <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src=demande.js></script>
  
<script type="text/javascript">

var dispos = new Array();
var nchambres = <?php echo $nchambres;?>;
var chnpers = new Array();
var arg_npers = <?php echo $npers;?>;
var arg_nuits = <?php echo $nuits;?>;
<?php 
for ( $i = 0 ; $i < $nchambres ; $i++ )
{
	echo 'chnpers['.$i.'] = '.$chambres_npers[$i].';';
	echo 'dispos['.$i.'] = '.$dispos[$i].';';
}
?>

function updatePrice() {
	nj = $('#nuits').val();
	nch = 0;
	for ( i = 0 ; i < nchambres ; i++ )
	{
	select = '#chambre'+i;
	if ( $(select).is(':checked') )
		nch++;
	}
	arrhes = nj * nch * 15;
}

function updateNpers()
{
	nn = $("#npers").val();
	options = '';
	nmin = 0;
	nmax = 0;
	for ( i = 0 ; i < nchambres ; i++ )
		{
		select = '#chambre'+i;
		if ( $(select).is(':checked') )
			{ nmin++; nmax += chnpers[i]; }
		}

	
	for ( i = nmin ; i <= nmax ; i++ )
		options += '<option value="'+i+'">'+i+'</option>';

	$("#npers").html(options);
	$("#npers").val(nn);
}

function updateNjours()
{
	nn = $("#nuits").val();
	options = '';
	nj = 15;
	for ( i = 0 ; i < nchambres ; i++ )
		{
		select = '#chambre'+i;
		if ( $(select).is(':checked') )
			if ( dispos[i] < nj ) nj = dispos[i];
		}

	for ( i = 1 ; i <= nj ; i++ )
		options += '<option value="'+i+'">'+i+'</option>';

	$("#nuits").html(options);
	$("#nuits").val(nn);
}


$(document).ready(function()
{


$('#npers').change(function() {
	updatePrice();
	});
$('#nuits').change(function() {
	updatePrice();
	});

<?php 
for ( $i = 0 ; $i < $nchambres ; $i++ )
{
	echo '$("#chambre'.$i.'").change(function() {
	updateNpers();
	updateNjours();
	});';
}
?>
updateNpers();
updateNjours();
$("#nuits").val(arg_nuits);
$("#npers").val(arg_npers);
});

</script>

</head>

<body>

<h1 class="title"><?php echo $titre;?></h1>

<div id="CONTACT">
<form action="envoyer.php" method="get" id="contact_form" onsubmit="return verif_des_champs(this);" >
<input name="lang" type="hidden" value="<?php echo $lang; ?>" />
<input name="arrivee" type="hidden" value="<?php echo $arrivee; ?>" />

<fieldset class="contact-options" >
<h3><?php echo $t1;?> : <?php echo dateEnClair($arrivee);?></h3>
<p class="fr" >
<?php echo $t1a;?> : 
<select id="npers" name="npers" >
</select>
</p>
<p class="fr" >
<?php echo $t2;?> : 
<select id="nuits" name="nuits" >
</select>
</p>
<hr/>
<fieldset class="which-room" >
<legend><?php echo $t3l;?></legend>    
<?php 
$msk = 1;
for ( $i = 0 ; $i < $nchambres ; $i++ )
	{
	if ( $dispos[$i] > 0 ) {
		$name = 'chambre['.$i.']';
		$id = 'chambre'.$i;
		echo '<p>';
		echo '<input name="'.$name.'" id="'.$id.'" type="checkbox" ';
		if ( $msk & $mch ) 
			echo 'checked="checked"';
		echo '>';
		echo '<label for="'.$name.'">'.$chambres_names[$i].'</label>';
		echo '</p>';
		}
	$msk <<= 1;
	}
?>	
</fieldset>
<p>
<input name="repas" type="checkbox" value="oui" <?php if ( $repas == "oui" ) echo 'checked="checked"'; ?> /> 
<label for="repas"><?php echo $repas1;?></label>
</p>
	   
</fieldset>
<br/>
<fieldset>	
<legend> <?php echo $t4;?> </legend>  
<p><?php echo $t2a;?> : <input class="input_right" type="text" name="nom" size="50" value="<?php echo $nom;?>" /></p>
<p><?php echo $t2b;?> : <input class="input_right" type="text" name="mail" size="50" value="<?php echo $mail;?>" /></p>
<p><?php echo $t2c;?> : <textarea name="message" placeholder="<?php echo $t5;?>" class="input_right" cols="50" rows="4"><?php echo $message;?></textarea></p>
</fieldset>		
<br/>   
<p><input name="ask" type="submit"  value="<?php echo $t7;?>" />	   
</p>
		   
		   
</form>
</div> 
</body>
</html>
