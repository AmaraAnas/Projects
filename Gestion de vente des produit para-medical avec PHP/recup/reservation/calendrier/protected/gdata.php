<?php
function gdata_insert_event($ich,$arrivee,$njours,$infos)

{
	global $service,$idcal;
	// reflexion google calendar
	$event= $service->newEventEntry();
	
	$event->title = $service->newTitle("Occupé");
	$event->where = array($service->newWhere("Les Jourdets"));
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
	
	$uri = 'https://www.google.com/calendar/feeds/'.$idcal[$ich].'/private/full'; 
	$newEvent = $service->insertEvent($event,$uri);
	$gurl = $newEvent->getEditLink()->href; // ->id ?
	return $gurl;
}

if ( $_SERVER['SERVER_NAME'] == 'localhost' )
	$path = '... votre install de test locale .../ZendFramework-1.11.5/library';
else
	$path = '... votre domaine public .../ZendFramework-1.11.5/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once 'Zend/Loader.php';

Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_HttpClient');
Zend_Loader::loadClass('Zend_Gdata_Calendar');
Zend_Loader::loadClass('Zend_Gdata_Query');
Zend_Loader::loadClass('Zend_Gdata_App') ;
Zend_Loader::loadClass('Zend_Gdata_Extension_Who');

//User account
$email = '... votre mail gmail ....@gmail.com';
$passwd = '... votre password google ...';

$idcal = array ( 
	'p91v91v3.... votre calendrier ....rkc16k@group.calendar.google.com', // atacama
	'66vpqeg.... votre calendrier ....9mqr57c@group.calendar.google.com' // punakaiki
	); 

// connection google calendar
try {
   $client = Zend_Gdata_ClientLogin::getHttpClient($email, $passwd, 'cl');
} catch (Zend_Gdata_App_CaptchaRequiredException $cre) {
    echo 'CAPTCHA  Image URL: ' . $cre->getCaptchaUrl() . "\n";
    echo 'Tokken ID: ' . $cre->getCaptchaToken() . "\n";
} catch (Zend_Gdata_App_AuthException $ae) {
   echo 'Failed: ' . $ae->exception() . "\n";
}
try {
$service = new Zend_Gdata_Calendar($client);
} catch (Zend_Gdata_App_Exception $e) {
    echo "Error: " . $e->getResponse();
}
