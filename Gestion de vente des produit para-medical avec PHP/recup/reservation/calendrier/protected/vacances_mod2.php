<?php

include("../rconfig.php");

$path = $_SERVER['PHP_SELF'];
$page = basename ($path);

$action=$_GET['action'];

function datesql($date) { 
$split = split("/",$date); 
$annee = $split[2]; 
$mois = $split[1]; 
$jour = $split[0]; 
return "$annee"."-"."$mois"."-"."$jour"; 
} 

$from=datesql($_GET['from']);
$to=datesql($_GET['to']);


$mask = 0;
if ( isset($_GET['ch']) )
	{
	$m = 1;
	for ( $i = 0 ; $i < $nchambres ; $i++ )
		{
		if ( isset($_GET['ch'][$i]) )
			$mask |= $m;
		$m = $m << 1;
		}
	}


include("../config.inc.php");


// connection BD
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

if ( isset($_GET['id']) )
	{
	$id=$_GET['id'];
	if ( $action == 'MODIFIER' )
		{
		$req_sql="UPDATE fermetures set nch=$mask,ffrom='$from',fto='$to' WHERE id=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{ die('Invalid query: ' . mysql_error());}
		}
	else if ( $action == 'DETRUIRE' )
		{
		$req_sql="DELETE FROM fermetures WHERE id=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}			
		}
	}
else
	{
	if ( $action == 'CREER' )
		{
		$req_sql="INSERT INTO fermetures (nch,ffrom,fto) VALUES('$mask','$from','$to')";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}	
		}
	}

mysql_close($connect);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'vacances_mod1.php';
header("Location: http://$host$uri/$extra");
exit; 
?>