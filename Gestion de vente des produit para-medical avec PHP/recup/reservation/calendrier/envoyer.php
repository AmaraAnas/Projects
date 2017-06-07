<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--  menu langue -->

<?php 
if (isset($_GET['lang']))
	$lang = $_GET['lang'];
else
	$lang = 'fr';

$path = $_SERVER['PHP_SELF'];
$page = basename ($path);
$toprep = "../../";
?>

<?php 
if ( $lang == 'fr' )
	{
	echo '<title>Les Jourdets - Message envoyé</title>';
  	echo '<meta name="subject" content="Les Jourdets - Demande de réservation envoyée" />';
  	echo '<meta name="keywords" content="Jourdets,Message" />';
  	echo '<meta name="description" content="Confirmation d\'envoi" />';
	$titre = "Demande de R&eacute;servation";
	$retour = "RETOUR A L'ACCUEIL";
	$spam = "Erreur, le code ANTI-SPAM est incorrect";
	$retry = "RECOMMENCEZ";
	$t1 = 'Arrhes pour chambre(s)';
	$t2 = 'nuit';
	$t2a = 'pour';
	$t2b = 'personne';
	$t2c = "Message";
	$t3 = 'Arrivée le';
	$t3a = 'Chambre';
	$repas1 = "Table d'hôtes le 1er soir";
	$t4 = 'Montant des arrhes';
	$t5 = 'Payez ces arrhes avec PayPal et confirmez la réservation en un clic !';
	$blang = 'fr_XC';
	}
else if ( $lang == 'en' )
	{
	echo '<title>Les Jourdets - Message sent</title>';
  	echo '<meta name="subject" content="Les Jourdets - Booking form sent" />';
  	echo '<meta name="keywords" content="Jourdets,Message" />';
  	echo '<meta name="description" content="Sent message confirmation" />';
	$titre = "Booking enquiry";
	$retour = "BACK TO MAIN PAGE";
	$spam = "ANTI-SPAM code incorrect";
	$retry = "RETRY";
	$t1 = 'Deposit for room(s)';
	$t2 = 'night';
	$t2a = 'for';
	$t2b = 'person';
	$t2c = "Message";
	$t3 = 'Arrival on';
	$t3a = 'Room';
	$repas1 = "Evening meal on first night";
	$t4 = 'Deposit of';
	$t5 = 'Pay this deposit with PayPal and secure your booking in one clic !';
	$blang = 'en_US';
	}
else if ( $lang == 'es' )
	{
	echo '<title>Les Jourdets - Mensage enviado</title>';
  	echo '<meta name="subject" content="Les Jourdets - Mensaje enviado" />';
  	echo '<meta name="keywords" content="Jourdets,Mensaje" />';
  	echo '<meta name="description" content="confirmación de mensaje enviado " />';
	$titre = "Su consulta";
	$retour = "VOLVER A PAGINA INICIAL";
	$spam = "El codigo ANTI-SPAM esta incorecto";
	$retry = "PROCESAR DE NUEVO";
	$t1 = 'Depósito para habitación(es)';
	$t2 = 'noche';
	$t2a = 'para';
	$t2b = 'persona';
	$t2c = "Mensaje";
	$t3 = 'Llegada el';
	$t3a = 'Habitacion';
	$repas1 = "Cena por la primera tarde";
	$t4 = 'Pago de';
	$t5 = 'Pague con PayPal y confirme la reserva en un clic !';
	$blang = 'es_XC';
	}
?>

  <link rel="stylesheet" type="text/css" href="<?php echo $toprep;?>css/jourdets.css" media="screen" >
  <link rel="stylesheet" type="text/css" href="calendrier.css" media="screen" >
  <script type="text/javascript" src="<?php echo $toprep;?>js/jquery-1.4.2.min.js"></script> <!-- jquery -->

  <link rel="shortcut icon" type="image/png" href="../../images/logosite.png" />

</head>

<body>
		
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableau_titre">
<tbody><tr><td>
<h1 class="title"><?php echo $titre; ?></h1>
</td></tr></tbody>
</table>      

<?php
include("rconfig.php");
require_once("fonctions.php");

echo "<div id='CONTACT'>";

// get args

$message = $_GET['message'];

$chambre = '';
$mch = 0;
$nch = 0;
if ( isset($_GET['chambre']) )
	{
	$m = 1;
	for ( $i = 0 ; $i < $nchambres ; $i++ )
		{
		if ( isset($_GET['chambre'][$i]) )
			{
			$mch |= $m;
			if ( $nch > 0 ) $chambre .= '/';
			$chambre .= $chambres_names[$i];
			$nch++;
			}
		$m = $m << 1;
		}
	}
$arrivee = $_GET['arrivee']; 
$nuits = (int)$_GET['nuits']; 
$npers = (int)$_GET['npers'];
if ( isset($_GET['repas']) ) $repas = $_GET['repas']; else $repas = "non";
$customer_name = $_GET['nom'];
$customer_mail = $_GET['mail'];

$arrhes = $nuits * $nch * 15.0;
$arrhes = sprintf("%.2f",$arrhes);

$_SESSION["customer_name"] = $customer_name;
$_SESSION["customer_mail"] = $customer_mail;
$_SESSION["customer_arrival"] = $arrivee;
$_SESSION["customer_nights"] = $nuits;
$_SESSION["customer_room"] = $chambre;
$_SESSION["customer_roommask"] = $mch;
$_SESSION["customer_lang"] = $lang;

if (isset($_GET['pay']))
{ // partie resa fixe paypal
$_SESSION["Payment_Amount"]=$arrhes;
$_SESSION["resaData"] = $t1." ".$chambre."\n".$nuits." ".$t2;
if ( $nuits > 1 ) $_SESSION["resaData"] .= 's';
$_SESSION["resaData"] .= " ".$t2a." ".$npers." ".$t2b;
if ( $npers > 1 ) $_SESSION["resaData"] .= 's';
$_SESSION["resaData"] .= " ".$t3." ".dateEnClair($arrivee);


echo '<form action="../paypal/ReviewOrder.php" method="post">';
echo '<input type=hidden name=lang value="'.$lang.'" >';
echo '<input type=hidden name=paymentType value="Sale" >';
echo '<input type=hidden name=currencyCodeType value="EUR" >';
echo '<input type=hidden name=L_NAME0 value="Arrhes jourdets.com" >';
echo '<input type=hidden name=L_AMT0 value="'.$_SESSION["Payment_Amount"].'" >';
echo '<input type=hidden name=L_QTY0 value="1" >';
echo '<input type=hidden name=L_DESC0 value="'.$_SESSION["resaData"].'" >';
echo '<input type=hidden name=PERSONNAME value="'.$_SESSION["customer_name"].'" >';
if ( $lang == 'fr' )
	echo '<input type=hidden name=LOCALECODE value="FR" >';
else if ( $lang == 'en' )
	echo '<input type=hidden name=LOCALECODE value="GB" >';
else if ( $lang == 'es' )
	echo '<input type=hidden name=LOCALECODE value="ES" >';

echo "<h3>".$_SESSION["resaData"]."</h3><hr/>";
echo '<p>'.$t4.' : '.$_SESSION["Payment_Amount"].' €</p>';
echo '<p>'.$t5.'</p><hr/>';
echo "<input type='image' name='submit' src='https://www.paypal.com/".$blang."/i/btn/btn_xpressCheckout.gif' align='left' style='margin-right:7px;' alt='Check out with PayPal'/>";
echo "</form>"; 
echo "</div>";
}
else if (isset($_GET['ask']))
{ // partie demande de contact
 
$email = "yourmail@yourfai.com";

$hdemande = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
  </head>
  <body bgcolor="#ffffff" text="#000000">';
$demande = "<h3>".$customer_name." ( ".$customer_mail." )</h3>";
$demande .= "<p>".$t3." : <b>".dateEnClair($arrivee)."</b></p>";
$demande .= "<p>".$t2a." <b>".$nuits;
$demande .= " ".$t2;
if ( $nuits > 1 ) $demande .= "s";
$demande .= " ".$npers." ";
$demande .= $t2b;
if ( $npers > 1 ) $demande .= "s";
$demande .= "</b></p>";
$demande .= "<p>".$t3a;
if ( $nch > 1 ) { if ( $lang=='es') $demande .= 'e'; $demande .= 's'; }
$demande .= " : <b>".$chambre."</b></p>";
if ( $repas == "oui" ) $demande .= "<p>".$repas1."</p>";
$demande .= "<p>".$t2c." : </p><p><b>".$message."</b></p>";
$tdemande = '</body></html>';
// $demande .= '--'.$mime_boundary.'--';
$headers ='MIME-Version: 1.0'."\n"; 
$headers.='From: '.$customer_name.'<'.$customer_mail.'>'."\n";
$headers.='Reply-To: '.$customer_mail."\n";
// $headers.='Content-Type: multipart/alternative; boundary='.$mime_boundary_header."\n";
$headers.='Content-Type: text/html; charset="utf-8"'."\n";
$headers.='Content-Transfer-Encoding: 8bit'."\n";


mail(
	$email,
	"Demande du site yourdomain.com",
	$hdemande.$demande.$tdemande,
	$headers
  );

echo '<div id="demande">'.$demande.'</div>';
echo '<form action="calendrier.php" method="get" >';
echo '<input type=hidden name=lang value="'.$lang.'" >';
$m = (int)substr($arrivee, 5, 2);
$a = (int)substr($arrivee, 0, 4);
echo '<input type="hidden" name="mois" value="'.$m.'"/>';
echo '<input type="hidden" name="an" value="'.$a.'"/>';
if ( $lang == 'fr' )
	{
	echo '<h2>Votre message a bien été envoyé</h2>
    <p>Nous vous contactons dans les plus brefs délais pour confirmer cette demande.</p>';
	}
else if ( $lang == 'en' )
	{
	echo '<h2>Message sent</h2>
    <p>We will get in touch with you as soon as possible to confirm this booking.</p>';
	}
else if ( $lang == 'es' )
	{
	echo '<h2>Su mensaje ha sido enviado</h2>
    <p>Nos ponemos en contacto con usted rapido para confirmar.</p>';
	}
echo '<input name="retour" type="submit" value="'.$retour.'" /></form></div>';
}
?>
</body>
</html>

