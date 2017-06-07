<?php
require "./secret/config.php";
// Redirige l'utilisateur s'il est d�j� identifi�

if(isset($_COOKIE["ID_ADMIN"]))
{
     header("Location: index.php");
}
else
{     
     // Formulaire visible par d�faut
     $masquer_formulaire = false;     
     // Une fois le formulaire envoy�
     if(isset($_POST["BT_Envoyer"]))
     {          
          // V�rification de la validit� des champs
          if(!preg_match('/^[A-Za-z0-9_]{2,20}$/', $_POST["TB_Nom_Utilisateur"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 2 et 20 caract�res<br />\n";
               $message .= "L'utilisation de l'underscore est autoris�e";
          }
          elseif(!preg_match('/^[A-Za-z0-9]{4,}$/', $_POST["TB_Mot_de_Passe"]))
          {
               $message = "Votre mot de passe doit comporter au moins 4 caract�res";
          }
          else
          {              
               // Connexion � la base de donn�es
               // Valeurs � modifier selon vos param�tres configuration
               @mysql_connect("$dbhost", "$dbuser", "$dbpass");
               mysql_select_db("$db");
               // S�lection de l'utilisateur concern�
			   //ID_Utilisateur, Nom_Utilisateur, Mot_de_Passe, Compte_Active
               $result = mysql_query("SELECT * FROM admin WHERE login = '" . $_POST["TB_Nom_Utilisateur"] . "'");

               if(!$result)
               {
                    $message = "Une erreur est survenue lors de la tentative de connexion";
               }
               else
               {
                    // Si aucun utilisateur n'a �t� trouv�
                    if(mysql_num_rows($result) == 0)
                    {
                         $message = "Le nom d'utilisateur " . $_POST["TB_Nom_Utilisateur"] . " n'existe pas";
                    }
                    else
                    {
                         // R�cup�ration des donn�es
                         $row = mysql_fetch_array($result);

                              // V�rification du mot de passe
                              if(md5($_POST["TB_Mot_de_Passe"]) != $row["password"])
                              {
                                  $message = "Votre mot de passe est incorrect";
                              }
                              else
                              {
                                  // D�finition du temps d'expiration des cookies (90jours)
                                 // $expiration = empty($_POST["CB_Connexion_Automatique"]) ? 0 : time() + 90 * 24 * 60 * 60;
                                  // Cr�ation des cookies



                                 setcookie("ID_ADMIN", $row["admin_id"], $expiration, "/");
                                 setcookie("PSEUDO", $row["login"], $expiration, "/");


                                // Fermeture de la connexion � la base de donn�es
                                mysql_close();
                                // Redirection de l'utilisateur
                                header("Location: index.php");  
                            }    
                         }
                    }
               }
               // Fermeture de la connexion � la base de donn�es
               mysql_close();
          }

}
?>
<!doctype html>
<html>
<head>
	<title>Login</title>
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

			<input type="submit" name="BT_Envoyer" style="float: none; clear: both;" />   

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