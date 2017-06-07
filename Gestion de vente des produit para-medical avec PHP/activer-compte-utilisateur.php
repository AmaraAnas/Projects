<?php

require "secret/config.php";
// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: index.php");
}
else
{
     // Vérifie que de bonnes valeurs sont passées en paramètres
     if(!preg_match('/^[0-9]+$/', $_GET["id"]) || !preg_match('/^[a-f0-9]{8}$/', strtolower($_GET["clef"])))
     {
          header("Location: index.php");
     }
     else
     {
          // Connexion à la base de données
          // Valeurs à modifier selon vos paramètres configuration
          mysql_connect("$dbhost", "$dbuser", "$dbpass");
               mysql_select_db("$db");
          // Sélection de l'utilisateur concerné
          $result = mysql_query("
               SELECT ID_Utilisateur
                    , Compte_Active
               FROM Comptes_Utilisateurs
               WHERE ID_Utilisateur = '" . $_GET["id"] . "'
               AND Clef_Activation = '" . strtolower($_GET["clef"]) . "'
          ");
          // Si une erreur survient
          if(!$result)
          {
               $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
          }
          else
          {
               // Si aucun enregistrement n'est trouvé
               if(mysql_num_rows($result) == 0)
               {
                    header("Location: index.php");
               }
               else
               {
                    // Récupération du tableau de données retourné
                    $row = mysql_fetch_array($result);
                    
                    // Vérification que le compte ne soit pas déjà activé
                    if($row["Compte_Active"] != 0)
                    {
                         $message = "Votre compte utilisateur a déjà été activé";
                    }
                    else
                    {
                         
                         // Activation du compte utilisateur
                         $result = mysql_query("
                              UPDATE Comptes_Utilisateurs
                              SET Compte_Active = '1'
                              WHERE ID_Utilisateur = '" . $_GET["id"] . "'
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Une erreur est survenue lors de l'activation de votre compte utilisateur";
                         }
                         else
                         {
                              $message = "Votre compte utilisateur a correctement été activé";
                         }
                         
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion à la base de données
          mysql_close();
          
     }
     
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Compte Activ&eacute;</title>
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
#activer {
	background-color: #CCC;
	text-align: center;
	height: 75px;
	width: 300px;
	margin-right: auto;
	margin-left: auto;
	border-top-style: double;
	border-right-style: double;
	border-bottom-style: double;
	border-left-style: double;
	font-size: 18px;
	font-weight: bold;
	text-decoration: underline;
}
</style>
</head>

<body>
<div id="activer"><?php echo $message; ?></div>
</body>
</html>