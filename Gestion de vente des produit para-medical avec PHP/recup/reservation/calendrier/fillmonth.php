<?php
// il faut avoir défini $mois et $an
// output : 
// $tab_reserv[chambre][jour] true/false
// $tab_njours[chambre][jour] ( seulement pour le premier jour )
// $tab_infos[chambre][jour]  ( seulement pour le premier jour )
// $tab_vacances[chambre][jour]  true/false ; true si la chambre est fermée ce jour
// creation d'un tableau à 31 entrées (1 pour chaque jour) et on dit qu'aucun jour n'est reservé

// paramètres chambres
require_once("rconfig.php");

for($j = 1; $j < 32; $j++){
	for ( $k = 0 ; $k < $nchambres ; $k++ ) {
		$tab_njours[$k][$j] = 0;
		$tab_reserv[$k][$j] = (bool)false;
		$tab_vacances[$k][$j] = (bool)false;
		$tab_interv[$k][$j] = '';
	}
}

// connexion à la bdd
include("config.inc.php");
$connect = mysql_connect($hote, $user, $password);
if (!$connect) 
	{  die('Invalid connect: ' . mysql_error());}
mysql_select_db($base, $connect);

$requete = mysql_query("SELECT * FROM calendrier WHERE YEAR(jour) = $an	AND MONTH(jour) = $mois");
if (!$requete) 
	{  die('Invalid query: ' . mysql_error());}
	
while ($ligne = mysql_fetch_array($requete)){
	// recupération du jour ou il y a la reservation
	$jour = $ligne["jour"];
	// transforme aaaa-mm-jj en jj
	$jour_reserve = (int)substr($jour, 8, 2);
	// insertion des jours reservé dans le tableau
	for ( $i = 1 ; $i <= (int)$ligne['njours'] ; $i++ )
		{
		$mask = 1;
		for ( $j = 0 ; $j < $nchambres ; $j++ )
			{
			if ( (int)$ligne['nch'] & $mask )
				{
				$tab_reserv[$j][$jour_reserve] = (bool)true;	
				if ( $i == 1 )
					{ if ( $i != (int)$ligne['njours'] ) $tab_interv[$j][$jour_reserve] = 'fd1'; }
				else if ( $i == (int)$ligne['njours'] )
					{ if ( $i != 1 ) $tab_interv[$j][$jour_reserve] = 'fd3'; }
				else
					$tab_interv[$j][$jour_reserve] = 'fd2';
				if ( $i == 1 )
					{ // le 1er jour de la resa a ces infos
					$tab_njours[$j][$jour_reserve] = (int)$ligne['njours'];
					$tab_infos[$j][$jour_reserve] = preg_replace("/(\r\n)|(\n)|(\r)/", "/ /", $ligne['infos']); 
					}
				}
			$mask = $mask << 1;
			}	
		$jour_reserve++;
		}
	}

// et les réservations du mois d'avant qui débordent ...

$amois = $mois-1;
$aan = $an;
if ( $amois == 0 )
	{
	$aan--;
	$amois = 12;
	}
$requete = mysql_query("SELECT * FROM calendrier WHERE YEAR(jour) = $aan	AND MONTH(jour) = $amois");
if (!$requete) 
	{  die('Invalid query: ' . mysql_error());}
while ($ligne = mysql_fetch_array($requete)){
	// recupération du jour ou il y a la reservation
	$jours = $ligne["jour"];
	// transforme aaaa/mm/jj en jj
	$jour_reserve = (int)substr($jours, 8, 2);
	// insertion des jours reservé dans le tableau
	$doit = false;
	for ( $i = 1 ; $i <= (int)$ligne['njours'] ; $i++ )
		{
		if ( $doit )
			{
			$mask = 1;
			for ( $j = 0 ; $j < $nchambres ; $j++ )
				{
				if ( (int)$ligne['nch'] & $mask )
					{
					$tab_reserv[$j][$jour_reserve] = (bool)true;
					if ( $i == 1 )
						{ if ( $i != (int)$ligne['njours'] ) $tab_interv[$j][$jour_reserve] = 'fd1'; }
					else if ( $i == (int)$ligne['njours'] )
						{ if ( $i != 1 ) $tab_interv[$j][$jour_reserve] = 'fd3'; }
					else
						$tab_interv[$j][$jour_reserve] = 'fd2';	
					if ( $i == 1 )
						{
						$tab_njours[$j][$jour_reserve] = (int)$ligne['njours'];
						$tab_infos[$j][$jour_reserve] = ereg_replace("(\r\n)|(\n)|(\r)", " ", $ligne['infos']); 
						}
					}
				$mask = $mask << 1;
				}
			}
		if (checkdate($amois, $jour_reserve + 1, $aan))
			$jour_reserve++;
		else 
			{
			$doit = true; // ah ah !
			$jour_reserve = 1;
			$amois++;
			if ( $amois > 12 ) 
				{
				$amois=1;
				$aan++;	
				}
			} 
		} 
	}
	
// et les fermetures

$requete = mysql_query("SELECT * FROM fermetures");
while ($ligne = mysql_fetch_array($requete)){
	$from = $ligne["ffrom"];
	$nch = $ligne["nch"];
	// transforme aaaa/mm/jj en jj
	$mfrom = (int)substr($from, 5, 2);
	$jfrom = (int)substr($from, 8, 2);
	$to = $ligne["fto"];
	// transforme aaaa/mm/jj en jj
	$mto = (int)substr($to, 5, 2);
	$jto = (int)substr($to, 8, 2);
	// insertion des jours reservés dans le tableau
	for($j = 1; $j < 32; $j++){
		{
		$today = ajout_zero($j,$mois,$an);
		// if ( strcmp($from,$today) >=0 && strcmp($today,$to) <= 0 )
		if ( $from <= $today && $today <= $to )
			{
			$mask = 1;
			for ( $k = 0 ; $k < $nchambres ; $k++ )
				{
				if ( $nch & $mask )
					$tab_vacances[$k][$j] = true;
				$mask = $mask << 1;
				}
			}
		}	
	}		
}

mysql_close($connect);
?>