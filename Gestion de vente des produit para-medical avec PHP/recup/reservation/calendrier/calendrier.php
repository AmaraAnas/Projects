<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--  origine ( lointaine ) du code http://www.phpcs.com/codes/CALENDRIER-RESERVATION-PHP-MYSQL_40895.aspx -->
<!--  menu langue -->

<?php 
if (isset($_GET['lang']))
	$lang = $_GET['lang'];
else
	$lang = 'fr';
	
// argument wch=x -> limitation à la chambre x
if (isset($_GET['wch']))
	$wch = $_GET['wch'];
else
	$wch = -1;

// paramètres chambres
require_once("rconfig.php");
	
$path = $_SERVER['PHP_SELF'];
$page = basename ($path);

date_default_timezone_set('Europe/Paris');

if ( $lang == 'fr' )
	{
	$locale = setlocale(LC_TIME, "fr_FR.utf8","fr_FR.UTF-8","fr","fra");
	$tformat = "%A %d %B";
	echo '<title>Les Jourdets - R&eacute;servations</title>';
  	echo '<meta name="subject" content="Chambres d\'h&ocirc;tes - Disponibilités" />';
  	echo '<meta name="keywords" content="chambres d\'h&ocirc;tes,Aude,Corbi&egrave;res,B&amp;B,h&eacute;bergement,Lairi&egrave;re,Lagrasse,pays cathare,Mouthoumet,Vignevieille,Termes,Orbieu,Champignons, bed and breakfast, Chambres hotes " />';
  	echo '<meta name="description" content="Chambres d\'h&ocirc;tes et table d\'h&ocirc;tes &agrave; Lairi&egrave;re dans les Hautes Corbi&egrave;res dans le pays cathare (Aude)" />';
	}
else if ( $lang == 'en' )
	{
	$locale = setlocale(LC_TIME, "en_EN","en","english");
	$tformat = "%A %B %d";
	echo '<title>Les Jourdets - Booking</title>';
  	echo '<meta name="subject" content="Bed and breakfast - Availability" />';
  	echo '<meta name="keywords" content="Bed and breakfast,Aude,Corbi&egrave;res,B&amp;B,accomodation,Lairi&egrave;re,Lagrasse,cathar country,Mouthoumet,Vignevieille,Termes,Orbieu,Mushrooms" />';
  	echo '<meta name="description" content="Bed and breakfast in Lairi&egrave;re in the Hautes Corbi&egrave;res int the cathar country (Aude)" />';
	}
else if ( $lang == 'es' )
	{
	$locale = setlocale(LC_TIME,"es_ES.utf8","es_ES.UTF-8","sp","spanish");
	$tformat = "%A %d de %B";
	echo '<title>Les Jourdets - Reservas</title>';
  	echo '<meta name="subject" content="Habitaciones de hu&eacute;spedes - Disponibilidades" />';
  	echo '<meta name="keywords" content="Habitaciones de hu&eacute;spedes,Aude,Corbi&egrave;res,B&amp;B,Lairi&egrave;re,Lagrasse,país  cathare,Mouthoumet,Vignevieille,Termes,Orbieu,Champignons" />';
  	echo '<meta name="description" content="Habitaciones de hu&eacute;spedes y cena en Lairi&egrave;re en las Hautes Corbi&egrave;res - país cathare (Aude)" />';
	}
?>

  <style type="text/css" media="screen">@import url(calendrier.css);</style>

<script type="text/javascript" >
function blurTT(link)
{
// pour éviter le pointillé au retour sur cette page	
link.childNodes[1].display = "none"; // le <span> ...
link.blur();
return false;
}
</script>
</head>

<body>



<?php 
if ( $lang == 'fr' )
	{
	echo '<h1 class="title">R&eacute;servations';
	if ( $wch >= 0 ) echo ' pour la chambre '.$chambres_names[$wch];
	echo '</h1>
	<p>Pour envoyer une demande de réservation, cliquez sur le symbole <img src="img/libre.png" /> ( libre )<br/>
    du jour d\'arrivée prévu et sur la chambre désirée.</p>';
	}
else if ( $lang == 'en' )
	{
	echo '<h1 class="title">Booking';
	if ( $wch >= 0 ) echo ' for room '.$chambres_names[$wch];
	echo '</h1>
	<p>To issue a booking enqiry, left clic on the <img src="img/libre.png" /> symbol( free )<br/>
    for the room an arrival date of your choice.</p>';
	}
else if ( $lang == 'es' )
	{
	echo '<h1 class="title">Reservas</h1>';
	if ( $wch >= 0 ) echo ' para la habitación '.$chambres_names[$wch];
	echo '</h1>	
	<p>Pour envoyer une demande de réservation, cliquez sur le symbole <img src="img/libre.png" /> ( libre )<br/>
    du jour d\'arrivée prévu et sur la chambre désirée.</p>';
	}    
?>    


<?php
// recuperation du jour, mois, et année actuel
$jour_actuel = date("j", time());
$mois_actuel = date("m", time());
$an_actuel = date("Y", time());
$jour = $jour_actuel;

include("fonctions.php");

// si la variable mois n'existe pas, mois et année correspondent au mois et à l'année courante

if (isset($_GET['mois']))
{$mois=$_GET['mois'];$an=$_GET['an'];}
else
	{
	$mois = $mois_actuel;
	$an = $an_actuel;
	}

//definir le mois suivant 
$mois_suivant = $mois + 1;
$an_suivant = $an;
if ($mois_suivant == 13)
{
	$mois_suivant = 1;
	$an_suivant = $an + 1;
}

//defini le mois précédent
$mois_prec = $mois - 1;
$an_prec = $an;
if ($mois_prec == 0)
{
	$mois_prec = 12;
	$an_prec = $an - 1;
}

if ( $lang == 'fr' )
	{
	$cha="Cha";
	$mois_en_clair = $mois_de_annee_fr[$mois - 1];
	$lundi="Lu";
	$mardi="Ma";
	$mercredi="Me";
	$jeudi="Je";
	$vendredi="Ve";
	$samedi="Sa";
	$dimanche="Di";
	$legend="légende";
	$res1 = "réservation";
	$res2 = "à partir du";
	}
else if ( $lang == 'en' )
	{
	$cha="Roo";
	$mois_en_clair = $mois_de_annee_en[$mois - 1];
	$lundi="Mo";
	$mardi="Tu";
	$mercredi="We";
	$jeudi="Th";
	$vendredi="Fr";
	$samedi="Sa";
	$dimanche="Su";
	$legend="legend";
	$res1 = "booking";
	$res2 = "from";
	}
else if ( $lang == 'es' )
	{
	$cha="Hab";
	$mois_en_clair = $mois_de_annee_es[$mois - 1];
	$lundi="Lu";
	$mardi="Ma";
	$mercredi="Mi";
	$jeudi="Ju";
	$vendredi="Vi";
	$samedi="Sa";
	$dimanche="Do";
	$legend="leyenda";
	$res1 = "reserva";
	$res2 = "desde el";
	}

$moisan = $mois_en_clair." ".$an;

// connexion à la bdd pour remplir $tab_jours[] et $tab_nch[]
include("fillmonth.php");

?>

<!-- La légende -->

<?php 
$imgdir = "img/";
include("legend.php"); 
?>

<!--  le calendrier -->
<div id="cal-main">
<table cellpadding="0" cellspacing="0"  class="tab_cal">
	<tr>
		<td height="51" colspan="8">
			<table width="345" border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="245" align="center" class="mois-en-cours"><a href="protected/calendar_mod.php?mois=<?php echo $mois; ?>&an=<?php echo $an; ?>&lang=<?php echo $lang;?>"><img id="redit" src="img/b_edit.png" title="modifier les réservations" width="16" height="16" border="0" /></a><strong id="idCalMois"><?php echo $mois_en_clair; ?></strong> <?php echo $an ?></td>
				  <td width="50">
					<a href="calendrier.php?mois=<?php echo $mois_prec; ?>&an=<?php echo $an_prec; ?>&lang=<?php echo $lang;?><?php if ( $wch >= 0 ) echo '&wch='.$wch;?>" rel="nofollow">
					<img id="month-prev" src="img/prec.png" title="mois précédent" border="0" />
					</a>
				  </td>
					<td width="50">
					<a href="calendrier.php?mois=<?php echo $mois_suivant; ?>&an=<?php echo $an_suivant; ?>&lang=<?php echo $lang;?><?php if ( $wch >= 0 ) echo '&wch='.$wch;?>" rel="nofollow">
					<img id="month-next" src="img/suiv.png" title="mois suivant" border="0" />
					</a>					
				  </td>
				</tr>
		  </table>
	  </td>
	</tr>
	<tr align="center" class="jours">
	    <td width="30" id="idCalCh"><?php echo $cha;?></td>
		<td width="45" id="idCalLu"><?php echo $lundi;?></td>
		<td width="45" id="idCalMa"><?php echo $mardi;?></td>
		<td width="45" id="idCalMe"><?php echo $mercredi;?></td>
		<td width="45" id="idCalJe"><?php echo $jeudi;?></td>
		<td width="45" id="idCalVe"><?php echo $vendredi;?></td>
		<td width="45" id="idCalSa"><?php echo $samedi;?></td>
		<td width="45" id="idCalDi"><?php echo $dimanche;?></td>
	</tr>

<?php 

function is_passe($jour,$mois,$an)

{
global $jour_actuel;
global $mois_actuel;
global $an_actuel;

if ( $an < $an_actuel ) return true;
if ( $an > $an_actuel ) return false;
if ( $mois < $mois_actuel ) return true;
if ( $mois > $mois_actuel ) return false;
if ( $jour < $jour_actuel ) return true;
return false;
}

//Détection du 1er et dernier jour du moiS
$nombre_date = mktime(0,0,0, $mois, 1, $an);
$premier_jour = date('w', $nombre_date);
if ( $premier_jour  == 0 ) $premier_jour = 7;
$dernier_jour = 28;
while (checkdate($mois, $dernier_jour + 1, $an))
	{ $dernier_jour++;}

// Affichage de 7 jours du calendrier

$nr= (int)(($premier_jour+$dernier_jour)/7);
$r = 0;
while ( true )
	{
	echo '<tr>';
	echo '<td width="30" class="tjour-first">';

	echo '<div class="head"></div>';
	for ( $j = 0 ; $j < $nchambres ; $j++ )
		{
		echo '<div style="background-color:'.$chambres_colors[$j].';" class="cell-header';
		if ( $j == 0 )
		  	echo ' cell-middle';
		else if ( $j < $nchambres-1 )
			echo ' cell-last';
		echo '">'.$chambres_initiales[$j].'</div>';
		}
	
    echo '</td>';
    
	for ($i = 1; $i < 8; $i++)
		{
		$ce_jour = $r * 7 + $i+1 - $premier_jour;
		if ( $ce_jour <= 0 || $ce_jour > $dernier_jour )
			{ 
			echo '<td width="30" class="out"></td>';
			}
		else
			{		
				
			echo '<td width="45" class="tjour">'; 
			
			echo '<div ';
			if ( ( $fete = getPublicHoliday((int)$ce_jour,(int)$mois,$an) ) != false )
				{ 
				echo 'class="headferie tooltip">';
				echo '<span>'.$fete.'</span>';
				}
			else if ( $i == 7 ) 
				{
				echo 'class="headdimanche">'; // dimanche simple
				}
			else 
				echo 'class="head">';
			echo $ce_jour.'</div>';

			$msk = 1;
			for ( $j = 0 ; $j < $nchambres ; $j++ )
				{
				echo  '<div class="cell-main ';
				
				echo $tab_interv[$j][$ce_jour];
				echo ' ';
				
				if ( $j == 0 )
		  			echo ' cell-middle';
				else if ( $j < $nchambres-1 )
					echo ' cell-last';
				echo '">';
					
				if ( is_passe($ce_jour,$mois,$an) || ( $wch >= 0 && $j != $wch )  )
					$imgclass = "img-cal-passe";
				else
					$imgclass = "img-cal";
					
				if ( $tab_vacances[$j][$ce_jour] )	
					echo '<img class="'.$imgclass.'" src="img/cadenas.png" />'; 
				else
					{
					if ( $tab_reserv[$j][$ce_jour] )
						echo '<img class="'.$imgclass.'" src="img/occupe.png" />'; 
					else
						{
						if ( $imgclass == "img-cal" ) 
							{
							$arrivee = ajout_zero($ce_jour, $mois, $an);
							echo '<a class="tooltip" onclick="blurTT(this);" href="demande.php?chambre='.$msk.'&arrivee='.$arrivee.'&lang='.$lang.'">';
							}
						echo '<img class="'.$imgclass.'" src="img/libre.png"';
						if ( $imgclass == "img-cal" ) 
							{
							$timestamp = mktime(8, 0, 0, $mois, $ce_jour, $an); 
							$strdate = strftime($tformat,$timestamp);
							$title = $res1.' '.$chambres_names[$j].' '.$res2.' '.$strdate; 
							// echo ' title="'.$title.'"';
							echo ' />';
							echo '<span>'.$title.'</span>'; // tooltip en CSS
							echo '</a>';
							}	
						else
							echo ' />';
						}
					}
				echo '</div>';
				$msk <<= 1;
				}	
				
			echo '</td>';	
			}
		}
	echo '</tr>';
	if ( $ce_jour >= $dernier_jour )
		break;
	
	echo '<tr height="8" >';
	echo '<td width="30" class="out"></td>';
	for ( $j = 0 ; $j < 7 ; $j++ )
		echo '<td width="45" class="out"></td>';
	echo '</tr>';
	$r++;
	}

?>
</table>
<!--  merci de conserver le lien d'une manière ou d'une autre  -->
<p class="nota">Origine du code calendrier : <a href="http://www.jourdets.com" >Chambres d'hôtes des Jourdets</a></p>
</div>

</body>
</html>
