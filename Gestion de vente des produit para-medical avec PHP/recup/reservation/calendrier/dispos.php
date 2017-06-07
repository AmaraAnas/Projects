<?php

define('MARGE',15);

require_once("fonctions.php");

function chDispo($chambre,$date)

{
// connexion à la bdd
require("config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$from = $date;
for ( $i = 0 ; $i < MARGE ; $i++ ) $from = dec_jour($from);
$to = $date;
for ( $i = 0 ; $i < MARGE ; $i++ ) $to = inc_jour($to);
$mch = 1 << $chambre;

$sql = "SELECT * FROM calendrier WHERE 
( jour BETWEEN '$from' AND '$to' ) 
 AND ( ( nch & $mch ) != 0 ) ";

$requete = mysql_query($sql);
$tab_reserv = array();

while ($ligne = mysql_fetch_array($requete)){
	// recupération du jour ou il y a la reservation
	$jour = $ligne["jour"];
	// insertion des jours reservé dans le tableau
	for ( $i = 1 ; $i <= (int)$ligne['njours'] ; $i++ )
		{
		$tab_reserv["$jour"] = (bool)true;	
		$jour = inc_jour($jour);
		}
	}	

$dispo = 0;
$jour = $date;
for ( $i = 0 ; $i < MARGE ; $i++ )
	{
	if ( isset($tab_reserv["$jour"]))
		break;
	$dispo++;
	$jour = inc_jour($jour);
	}

	
/* et les fermetures ( TODO )

$requete = mysql_query("SELECT * FROM fermetures WHERE
 ( ( ffrom <= $to AND fto >= $from ) OR ( ) )
 AND ( ( nch & $mch ) != 0 ) ");

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
**/

mysql_close($connect);

return $dispo;
}
?>