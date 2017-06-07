<?php
 
/*
[PHPSESSID] => 9d6r9uchec375hag079maihm05
[ID_UTILISATEUR] => 1
[NOM_UTILISATEUR] => admin
[type] => 0
[parend_id] => 0
[lab_id] => 1
[Nom_Propre] => Bouchoucha
[Prenom] => Afif
http://openclassrooms.com/forum/sujet/calendrier-et-agenda-php-43884
http://forum.phpfrance.com/vos-contributions/generer-planning-sous-forme-tableau-html-t249425.html
http://www.mathieuweb.fr/calendrier/calendrier_horaire.php
https://www.mathieuweb.fr/calendrier/telecharger-calendrier-journalier.php
http://www.mathieuweb.fr/calendrier/faq-simple-calendrier.php
*/
if (!isset($_COOKIE['ID_UTILISATEUR'])) { 
   header ('Location: connexion.php'); 
   exit();  
	}
	if(isset($_COOKIE["ID_UTILISATEUR"])){
		require 'Views/_templates/header.php';
		?>
				<div class="content">
					<?php
						//Connexion au serveur de base de données
						mysql_connect('localhost', 'root', '');
						mysql_select_db('medical_site');
						/*Traitement de la Requete*/ 
						$controler = 'Home';
						$action = 'index';
						$id = '';//echo $_GET['controler'];
						if(!empty($_GET['controler'])){
							$controler = $_GET['controler'];
							if(!empty($_GET['action'])){
								$action = $_GET['action'];
								if(!empty($_GET['id']))
									$id = $_GET['id'];
							}
						}
						//On inclut le fichier de conrtoleur spécifier s'il existe
						if(is_file('Controllers/'.$controler.'.Controller.php')){
							include 'Controllers/'.$controler.'.Controller.php';
							//echo 'Controllers/'.$controler.'.Controller.php';die;
							$class = $controler."Controller";//echo $class;die;
							$objet = new $class();
							$objet->$action($id);
						}
						//Fermeture de connexion avec Serveur de DB
						mysql_close();
					?>
				</div>
			</div>
		
		<?php
		require 'Views/_templates/footer.php';
	}else { ?>
<p>
     <a href="creer-compte-utilisateur.php">Créer un compte utilisateur</a> | 
     <a href="connexion.php">Connexion</a>
</p>
<?php } 
?>
