<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>R&eacute;servations</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--  menu langue -->

<?php 
if (isset($_GET['lang']))
	$lang = $_GET['lang'];
else
	$lang = 'fr';

$path = $_SERVER['PHP_SELF'];
$page = basename ($path);
?>

  <style type="text/css" media="screen">@import url(../calendrier.css);</style>

</head>

<body>



        

<h1 class="title">R&eacute;servations</h1>
<p>Pour créer une réservation, cliquez sur le symbole <img src="../img/libre.png" /> ( libre )<br/>
du jour d'arrivée prévu et sur la chambre désirée.</p>
<p>Pour modifier ou détruire une réservation, cliquez sur le symbole <img src="../img/occupe.png" /> ( occupé )<br/>
du jour d'arrivée prévu et sur la chambre désirée.</p>
        

<?php
// recuperation du jour, mois, et année actuel
$jour_actuel = date("j", time());
$mois_actuel = date("m", time());
$an_actuel = date("Y", time());
$jour = $jour_actuel;

include("../fonctions.php");

// si la variable mois n'existe pas, mois et année correspondent au mois et à l'année courante

if (isset($_GET['mois']))
{$mois=$_GET['mois'];$an=$_GET['an'];}
else
	{
	$mois = $mois_actuel;
	$an = $an_actuel;
	}

//defini le mois suivant 
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

//affichage du mois et de l'année en french
if ( $lang == 'fr' )
	{
	$mois_en_clair = $mois_de_annee_fr[$mois - 1];
	$lundi="Lu";
	$mardi="Ma";
	$mercredi="Me";
	$jeudi="Je";
	$vendredi="Ve";
	$samedi="Sa";
	$dimanche="Di";
	$legend="légende";
	}
else if ( $lang == 'en' )
	{
	$mois_en_clair = $mois_de_annee_en[$mois - 1];
	$lundi="Mo";
	$mardi="Tu";
	$mercredi="We";
	$jeudi="Th";
	$vendredi="Fr";
	$samedi="Sa";
	$dimanche="Su";
	$legend="legend";
	}
else if ( $lang == 'es' )
	{
	$mois_en_clair = $mois_de_annee_es[$mois - 1];
	$lundi="Lu";
	$mardi="Ma";
	$mercredi="Mi";
	$jeudi="Ju";
	$vendredi="Vi";
	$samedi="Sa";
	$dimanche="Do";
	$legend="leyenda";
	}

// connexion à la bdd pour remplir les $tab_...[][] 
include("../fillmonth.php");
?>

<!-- La légende -->

<?php 
$imgdir = "../img/";
include("../legend.php"); 
?>


<!--  le calendrier -->
<div id="cal-main">

<table cellpadding="0" cellspacing="0"  class="tab_cal">
	<tr>
		<td height="51" colspan="8">
			<table width="345" border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="245" align="center" class="mois-en-cours"><a href="vacances_mod1.php"><img id="redit" src="../img/cadenas.png" title="gérer les fermetures" width="16" height="16" border="0" /></a><?php echo $mois_en_clair," ", $an; ?></td>
				  <td width="50">
						<a href="calendar_mod.php?mois=<?php echo $mois_prec; ?>&an=<?php echo $an_prec; ?>&lang=<?php echo $lang;?>">
					    <img id="month-prev" src="../img/prec.png" title="mois précédent" border="0" />
						</a>
				  </td>
					<td width="50">
					<a href="calendar_mod.php?mois=<?php echo $mois_suivant; ?>&an=<?php echo $an_suivant; ?>&lang=<?php echo $lang;?>">
					<img id="month-next" src="../img/suiv.png" title="mois suivant" border="0" />
					</a>					
				  </td>
				</tr>
		  </table>
	  </td>
	</tr>
	<tr align="center" class="jours">
	    <td width="30">Ch</td>
		<td width="45"><?php echo $lundi;?></td>
		<td width="45"><?php echo $mardi;?></td>
		<td width="45"><?php echo $mercredi;?></td>
		<td width="45"><?php echo $jeudi;?></td>
		<td width="45"><?php echo $vendredi;?></td>
		<td width="45"><?php echo $samedi;?></td>
		<td width="45"><?php echo $dimanche;?></td>
	</tr>

<?php

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
		$date = ajout_zero($ce_jour, $mois, $an);	
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
					
				if ( $tab_vacances[$j][$ce_jour] )	
					echo '<img class="img-cal" src="../img/cadenas.png" />'; 
				else
					{
					if ( $tab_reserv[$j][$ce_jour] )
						{ // occupe
						if ( $tab_njours[$j][$ce_jour] > 0 ) // le 1er jour de la reserv
							{
							echo '<a class="tooltip" href="calendar_mod1.php?chambre='.$j.'&arrivee='.$date.'">';
							}
						echo '<img class="img-cal" src="../img/occupe.png" />';
						if ( $tab_njours[$j][$ce_jour] > 0 )
							{
							echo '<span>'.$tab_infos[$j][$ce_jour].'</span>'; // tooltip en CSS
							echo '</a>';	
							}
						}
					else
						{
						echo '<a href="calendar_mod1.php?chambre='.$j.'&arrivee='.$date.'">';
						echo '<img class="img-cal" src="../img/libre.png" />';
						echo '</a>';	
						}
					}
				echo '</div>';
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

</div> 



</body>
</html>
