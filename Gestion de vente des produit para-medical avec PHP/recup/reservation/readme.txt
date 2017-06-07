Calendrier réservation  pour chambres d'hôtes en php mysql----------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/53067-calendrier-reservation-pour-chambres-d-hotes-en-php-mysqlAuteur  : oallaisDate    : 02/08/2013
Licence :
=========

Ce document intitulé « Calendrier réservation  pour chambres d'hôtes en php mysql » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Ce petit ensemble de code reprend une source d&eacute;pos&eacute;e ici (  <a hre
f='http://www.phpcs.com/codes/CALENDRIER-RESERVATION-PHP-MYSQL_40895.aspx' targe
t='_blank'>http://www.phpcs.com/codes/CALENDRIER-RESERVATION-PHP-MYSQL_40895.asp
x</a> ) mais assez profond&eacute;ment modifi&eacute;e. Il permet de g&eacute;re
r les r&eacute;servations de n chambres sur un calendrier perp&eacute;tuel.
<br
 />Il int&egrave;gre une table pour les p&eacute;riode de fermeture par chambres
.
<br />Il permet de param&eacute;trer la synchronisation avec des calendriers 
google ( 1 par chambre ) &agrave; condition d'avoir le Zend Framework. Cette syn
chro est donc marqu&eacute;e optionnelle.
<br />Il est possible de la voir en f
onctionnement sur <a href='http://www.jourdets.com/reservations/calendrier/calen
drier.php' target='_blank'>http://www.jourdets.com/reservations/calendrier/calen
drier.php</a> ( int&eacute;gr&eacute;e dans la charte graphique du site ) :
<br
 /><a name='source-exemple'></a><h2> Source / Exemple : </h2>
<br /><pre class
='code' data-mode='basic'>
Calendrier de réservations de chambres d'hôtes en PH
P/MySQL

A voir en fonctionnement sur mon site de chambres d'hôtes <a href='ht
tp://www.jourdets.com/reservations/calendrier/calendrier.php' target='_blank'>ht
tp://www.jourdets.com/reservations/calendrier/calendrier.php</a>

A paramétrer
 :

<ul>    <li> calendrier/rconfig.php -&gt; nombre et noms des chambres + co
uleur
</li>    <li> calendrier/config.inc.php -&gt; vos paramètres de base de d
onnées SQL ( voir sql.txt )
</li>    <li> calendrier/demande.php et envoyer.php
  -&gt; pour gérer une demande d'un client ( mail ... )</li></ul>

Fonctionnem
ent :

La page de lancement est calendrier.php
elle peut fonctionner en franç
ais,anglais et espagnol ( calendrier.php?lang=xx avec xx = fr,en ou es )

Au n
iveau utilisateur , on clique sur le 1er jour de la réservation sur la chambre d
emandée et on va vers demande.php avec arguments POST. demande.php envoie un mai
l au webmaster ( paramétrez votre mail ) avec les infos sur la demande de réserv
ation.

Le calendrier est multilingue ( fr , en , es ) pour l'allemand on repa
ssera ...

Au niveau administrateur ( après un clic sur le symbole d'édition /
 stylo ) on est dans protected/calendar_mod.php
On clique sur le 1er jour de la
 réservation sur la chambre voulue et on a accès à un formulaire pour renseigner
 les infos de réservations
Si le jour était réservé ( 1er jour d'une réservatio
n ) on peut la modifier ou la détruire
Il est possible de lier chaque chambre à
 un calendrier google calendar et de refléter les réservations dans ces calendri
ers
Pour ceci mettre $synchro_gdata à true dans rconfig.php et paramétrer vore 
compte google et calendriers dans protected/gdata.php

Base de données

tabl
e calendrier

<ul>    <li> jour : date : 1er jour de la réservation
</li>    
<li> nch : int : un mask pour la ( les ) chambres concernées ( 0000001 : ch 1 ; 
000002 : ch 2 ; 000004 ... etc )
</li>    <li> njours : int : nbre de jours rés
ervés
</li>    <li> infos : text : infos sur la resa , nom ....
</li>    <li> 
gurl : text : url de modif de l'événement google calendar s'il existe</li></ul>


table fermetures

<ul>    <li> nch : int : un mask pour la ( les ) chambres
 concernées ( 0000001 : ch 1 ; 000002 : ch 2 ; 000003 : 1+2 ;  ... etc )
</li> 
   <li> from : date : fermé du ...
</li>    <li> to : date : au ..</li></ul>


Remarques annexes

La gestion des jours feriés est faites dans fonctions.php 
par une fonction trouvée sur phpcs

Le répertoire protected/ est à protéger av
ec un .htaccess/.htpasswd

Olivier ALLAIS
</pre>
<br /><a name='conclusion'>
</a><h2> Conclusion : </h2>
<br />La suite logique de la r&eacute;servation ( 
demande.php ) consiste en deux choses :
<br />- demande de r&eacute;servation (
 mail ) -&gt; envoyer.php
<br />- r&eacute;servation avec paiement d'arrhes sur
 un compte PayPal ( non publi&eacute; ici ... )
