<?php
require "secret/config.php";
// Redirige l'utilisateur s'il est déjà identifié

if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: index.php");
}
else
{     
     // Formulaire visible par défaut
     $masquer_formulaire = false;     
     // Une fois le formulaire envoyé
     if(isset($_POST["BT_Envoyer"]))
     {          
          // Vérification de la validité des champs
          if(!preg_match('/^[A-Za-z0-9_]{2,20}$/', $_POST["TB_Nom_Utilisateur"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 2 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
          elseif(!preg_match('/^[A-Za-z0-9]{4,}$/', $_POST["TB_Mot_de_Passe"]))
          {
               $message = "Votre mot de passe doit comporter au moins 4 caractères";
          }
          else
          {              
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
               mysql_connect("$dbhost", "$dbuser", "$dbpass");
               mysql_select_db("$db");               
               // Sélection de l'utilisateur concerné
			   //ID_Utilisateur, Nom_Utilisateur, Mot_de_Passe, Compte_Active
               $result = mysql_query("SELECT * FROM Comptes_Utilisateurs WHERE Nom_Utilisateur = '" . $_POST["TB_Nom_Utilisateur"] . "'");
	/*		   echo ("
                    SELECT * 
                    FROM Comptes_Utilisateurs
                    WHERE Mot_De_Passe = '" . md5($_POST["TB_Mot_de_Passe"]) . "'
               ");*/
//$Date_Connexion=time();			  
//mysql_query("UPDATE Comptes_Utilisateurs SET Date_Connexion ='$Date_Connexion' WHERE Nom_Utilisateur= '" . $_POST["TB_Nom_Utilisateur"] . "'");
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Une erreur est survenue lors de la tentative de connexion";
               }
               else
               {
                    // Si aucun utilisateur n'a été trouvé
                    if(mysql_num_rows($result) == 0)
                    {
                         $message = "Le nom d'utilisateur " . $_POST["TB_Nom_Utilisateur"] . " n'existe pas";
                    }
                    else
                    {
                         // Récupération des données
                         $row = mysql_fetch_array($result);
                         // Si le compte n'a pas été activé
                         if($row["Compte_Active"] == 0)
                         {
                              $message = "Votre compte utilisateur n'a pas été activé";
                         }
                         else
                         {
							/* echo '<pre>';print_r($row);
							 echo md5($_POST["TB_Mot_de_Passe"]) .  "			---			". $row["Mot_de_Passe"];die;*/
                              // Vérification du mot de passe
                              if(md5($_POST["TB_Mot_de_Passe"]) != $row["Mot_De_Passe"])
                              {
                                  $message = "Votre mot de passe est incorrect";
                              }
                              else
                              {
                                  // Définition du temps d'expiration des cookies (90jours)
                                  $expiration = empty($_POST["CB_Connexion_Automatique"]) ? 0 : time() + 90 * 24 * 60 * 60;
                                  // Création des cookies
                                  setcookie("ID_UTILISATEUR", $row["ID_Utilisateur"], $expiration, "/");
                                  setcookie("NOM_UTILISATEUR", $row["Nom_Utilisateur"], $expiration, "/");
								  
								  setcookie("type", $row["type"], $expiration, "/");
								  setcookie("parend_id", $row["parend_id"], $expiration, "/");
								  setcookie("lab_id", $row["lab_id"], $expiration, "/");
								  setcookie("Nom_Propre", $row["Nom_Propre"], $expiration, "/");
								  setcookie("Prenom", $row["Prenom"], $expiration, "/");
								
								//L'utilisateur à 48h (172800 secondes) pour valider son inscription par mail: 
								//(le rafraichissement de la base se fait lors de la connexion d'une personne).			 
								$heure=time();
mysql_query("DELETE FROM Comptes_Utilisateurs WHERE Date_Inscription < ($heure - 172800) AND Compte_Active='0'");
                                // Fermeture de la connexion à la base de données
                                mysql_close();
                                // Redirection de l'utilisateur
                                header("Location: index.php");  
                            }    
                         }
                    }
               }
               // Fermeture de la connexion à la base de données
               mysql_close();
          }
     }
}
?>
<!doctype html>
<html>
<head>
	<title>Loguin</title>
    <link rel="stylesheet" href="<?php echo '/afifbo/';?>public/css/reset.css" />
	<link rel="stylesheet" href="<?php echo '/afifbo/'; ?>public/css/default.css" />
	<script type="text/javascript" src="<?php echo '/afifbo/'; ?>public/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo '/afifbo/'; ?>public/js/custom.js"></script>
</head>
<body>
<div class="content" >
	<div class="login" >

		<h1>Login</h1>
		<form action="http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">
			<label>Username</label>
			<input type="text" name="TB_Nom_Utilisateur" required />
			<label>Password</label>
			<input type="password" name="TB_Mot_de_Passe" required />
			<input type="checkbox" name="user_rememberme" style="float: left; min-width: 0; margin: 3px 10px 15px 0;" />
			<label style="float:left; min-width: 0; font-size: 12px; color: #888;">Keep me logged in (for 2 weeks)</label>
									
			<input type="submit" name="BT_Envoyer" style="float: none; clear: both;" />   
			<a href="creer-compte-utilisateur.php">      S'inscrire</a>
			 |
		<a href="desinscription-compte-utilisateur.php">Supprimer son compte</a>
		</form>
	</div>
</div>
<p class="centrer">
  <?php if(isset($message)) { ?>
  <?php echo $message; ?>
  <?php } if($masquer_formulaire != true) { ?>
  <?php } ?>
</p>
</body>
</html>