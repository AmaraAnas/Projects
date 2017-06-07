
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

$action=$_GET['action'];
$arrivee=$_GET['arrivee'];
$mask=(int)$_GET['mask'];
$ich = 0;
$m = $mask;
while ( $m != 1 )
	{
	$m = $m >> 1;
	$ich++;
	}

$njours=(int)$_GET['njours'];
$infos=$_GET['infos'];
$id=(int)$_GET['id'];

include("../rconfig.php");
include("../config.inc.php");
include("../fonctions.php");


// connection BD
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

if ( $synchro_gdata )
	{
	// connection google calendar
	include("gdata.php");
	}

if ( $id > 0 )
	{
	$req_sql = "SELECT * FROM calendrier WHERE jour='".$arrivee."' AND ((nch&".$mask.")!=0)";
	$result = mysql_query($req_sql);
	if (!$result) 
		{  die('Invalid query(1): ' . mysql_error());}
	$row = @mysql_fetch_assoc($result);
	}	

	
if ( $action == 'CREER' )
	{
	// reflexion google calendar
	if ( $synchro_gdata )
		$gurl = gdata_insert_event($ich,$arrivee,$njours,$infos);
	else
		$gurl = '';
	// et insertion en BD
	$req_sql="INSERT into calendrier (jour,nch,njours,infos,gurl) VALUES ('$arrivee','$mask','$njours','$infos','$gurl')";
	$result = mysql_query($req_sql);
	if (!$result) 
		{  die('Invalid query(2): ' . mysql_error());}
	}
else if ( $action == 'MODIFIER' )
	{
	if ( $row['nch'] != $mask )
		{ // compat ancienne methode : plusieurs resa sur le meme champ !
		$nch = $row['nch'] - $mask;
		$req_sql="UPDATE calendrier set nch=$nch WHERE num=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}
		// reflexion google calendar
		if ( $synchro_gdata )
			$gurl = gdata_insert_event($ich,$arrivee,$njours,$infos);
		else
			$gurl = '';
		$req_sql="INSERT into calendrier (jour,nch,njours,infos,gurl) VALUES ('$arrivee','$mask','$njours','$infos','')";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}
		}
	else
		{
		$req_sql="UPDATE calendrier set njours=$njours, infos='$infos' WHERE num=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}
		// reflexion google calendar
		
		if ( $synchro_gdata && strlen($row['gurl'])>40 ) // pourquoi pas ?
			{
			$event = $service->getCalendarEventEntry($row['gurl']);
			$event->content = $service->newContent($infos); 
			//Format JST 3339
			$startDate = $arrivee;
			// $startTime = "08:00";
			$endDate = $arrivee;
			for ( $i = 0 ; $i < $njours ; $i++ )
				$endDate = inc_jour($endDate);
			//Set When ( pas d'heure = full day )
			$when = $service->newWhen();
			$when->startTime = "{$startDate}";
			$when->endTime = "{$endDate}"; 
			$event->when = array($when);
				
			try {
			    $event->save();
				} catch (Zend_Gdata_App_Exception $e) {
			    	echo "Error: " . $e->getMessage();
				}
			}
		}
	
	}
else if ( $action == 'DETRUIRE' )
	{
	if ( $row['nch'] != $mask )
		{ // compat ancienne methode : plusieurs resa sur le meme champ !
		$nch = $row['nch'] - $mask;
		$req_sql="UPDATE calendrier set nch=$nch WHERE num=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}
		}
	else
		{
		$req_sql="DELETE FROM calendrier WHERE num=$id";
		$result = mysql_query($req_sql);
		if (!$result) 
			{  die('Invalid query: ' . mysql_error());}

		// delete de google calendar
		if ( $synchro_gdata && strlen($row['gurl'])>40 ) // pourquoi pas ?
			{
			try {
	    		$event = $service->getCalendarEventEntry($row['gurl']);
	    		$service->delete($event->getEditLink()->href);
				} catch (Zend_Gdata_App_Exception $e) {
	   	 		echo "Error: " . $e->getMessage();
				}
			}
		}
	}
	
$m = (int)substr($arrivee, 5, 2);
$a = (int)substr($arrivee, 0, 4);
mysql_close($connect);


?>
<form action="../calendrier.php" method="get">
<input name="an" type="hidden" value="<?php echo $a; ?>" />
<input name="mois" type="hidden" value="<?php echo $m; ?>" />
<input name="retour" type="submit" style="align:center" value="RETOUR AU CALENDRIER" />
</form>



</body>
</html>