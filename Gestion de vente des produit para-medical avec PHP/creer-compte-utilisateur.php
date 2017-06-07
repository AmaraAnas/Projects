<?php

function nettoieProtect(){

foreach($_POST as $k => $v){
  $v=mysql_real_escape_string(strip_tags(trim($v)));
  $_POST[$k]=$v;
  }
  foreach($_GET as $k => $v){
  $v=mysql_real_escape_string(strip_tags(trim($v)));
  $_GET[$k]=$v;
  }
  foreach($_REQUEST as $k => $v){
  $v=mysql_real_escape_string(strip_tags(trim($v)));
  $_REQUEST[$k]=$v;
  }
}
require "secret/config.php";

// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: index.php");exit;
}
else
{
     
     // Formulaire visible par défaut
     $masquer_formulaire = false;
     
     // Une fois le formulaire envoyé
     if(isset($_POST["BT_Envoyer"]))
     {
          
          // Vérification de la validité des champs
          if(!preg_match('/^[A-Za-z0-9_]{4,20}$/', $_POST["TB_Nom_Propre"]))
          {
               $message = "Votre nom propre doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
		  if(!preg_match('/^[A-Za-z0-9_]{4,20}$/', $_POST["TB_Prenom"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
		  if(!preg_match('/^[A-Za-z0-9_]{4,20}$/', $_POST["TB_Nom_Utilisateur"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
          elseif(!preg_match('/^[A-Za-z0-9]{4,}$/', $_POST["TB_Mot_de_Passe"]))
          {
               $message = "Votre mot de passe doit comporter au moins 4 caractères";
          }
          elseif($_POST["TB_Mot_de_Passe"] != $_POST["TB_Confirmation_Mot_de_Passe"])
          {
               $message = "Votre mot de passe n'a pas été correctement confirmé";
          }
          elseif(!preg_match('/^[A-Z\d\._-]+@[A-Z\d\.-]{2,}\.[A-Z]{2,4}$/i',
               $_POST["TB_Adresse_Email"]))
          {
               $message = "Votre adresse e-mail n'est pas valide";
          }
          else
          {
               
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
               mysql_connect("$dbhost", "$dbuser", "$dbpass");
               mysql_select_db("$db");
			   nettoieProtect();
               extract($_POST);
               
               // Vérification de l'unicité du nom d'utilisateur et de l'adresse e-mail
               $result = mysql_query("
                    SELECT Nom_Utilisateur
                         , Adresse_Email
                    FROM Comptes_Utilisateurs
                    WHERE Nom_Utilisateur = '" . $_POST["TB_Nom_Utilisateur"] . "'
                    OR Adresse_Email = '" . $_POST["TB_Adresse_Email"] . "'
               ");
               
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Erreur d'accès à la base de données lors de la vérification d'unicité";
               }
               else
               {
                    
                    // Si un enregistrement est trouvé
                    if(mysql_num_rows($result) > 0)
                    {
                         
                         while($row = mysql_fetch_array($result))
                         {
                              
                              if($_POST["TB_Nom_Utilisateur"] == $row["Nom_Utilisateur"])
                              {
                                   $message = "Le nom d'utilisateur " . $_POST["TB_Nom_Utilisateur"];
                                   $message .= " est déjà utilisé";
                              }
                              elseif($_POST["TB_Adresse_Email"] == $row["Adresse_Email"])
                              {
                                   $message = "L'adresse e-mail " . $_POST["TB_Adresse_Email"];
                                   $message .= " est déjà utilisée";
                              }
                              mysql_close();
                         }
                         
                    }
                    else
                    {
                         
                         // Génération de la clef d'activation
                         $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_activation = "";
                         
                         foreach($caracteres_aleatoires as $i)
                         {
                              $clef_activation .= $caracteres[$i];
                         }
                         

                         // Création du compte utilisateur
                         $result = mysql_query("
                              INSERT INTO Comptes_Utilisateurs(
                                   Nom_Propre
								   , Prenom
								   , Nom_Utilisateur
                                   , Mot_de_Passe
                                   , Adresse_Email
                                   , Date_Inscription
                              )
                              VALUES(
                                     '" . $_POST["TB_Nom_Propre"] . "'
								   , '" . $_POST["TB_Prenom"] . "'
								   , '" . $_POST["TB_Nom_Utilisateur"] . "'
                                   , '" . md5($_POST["TB_Mot_de_Passe"]) . "'
                                   , '" . $_POST["TB_Adresse_Email"] . "'
                                   , '" . time() . "'
                              )
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Erreur d'accès à la base de données lors de la création du compte utilisateur";
                         }
                         else
                         {
                              
                              // Envoi du mail d'activation
                              $sujet = "Activation de votre compte utilisateur";
                              
                         $message = " Ce mail vous a été envoyer car il a été enregistré lors de l'inscription sur le \n";
             $message .= "site de (votre site). Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                         //$message .= "http://" . $_SERVER["SERVER_NAME"];
                         $message .= 'http://'.$_SERVER['HTTP_HOST'];
                         $end=end(explode('/',$_SERVER['PHP_SELF']));
                         $rep=str_replace($end,'',$_SERVER['PHP_SELF']);
                         $message .= $message.$rep.'activer-compte-utilisateur.php?id='.mysql_insert_id();
                         $message .= '&clef='.$clef_activation;
                              
                              // Si une erreur survient
                              if(!@mail($_POST["TB_Adresse_Email"], $sujet, $message))
                              {
                                   $message = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                                   $message .= "Veuillez contacter l'administrateur afin d'activer votre compte";
                              }
                              else
                              {
                                   
                                   // Message de confirmation
                                   $message = "Votre compte utilisateur a correctement été créer<br />\n";
                                   $message .= "Un email vient de vous être envoyer afin de l'activer";
                                   
                                   // On masque le formulaire
                                   $masquer_formulaire = true;
								   
								   								   
								 //L'utilisateur à 48h (172800 secondes) pour valider son inscription par mail: 
								 //(le rafraichissement de la base se fait lors de l'inscription d'une personne).
								   $heure=time();
mysql_query("DELETE FROM Comptes_Utilisateurs WHERE Date_Inscription < ($heure - 172800) AND Compte_Active='0'");                                   
                              }                              
                         }                        
                    }
               }// Fermeture de la connexion à la base de données
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
  <h1>Inscription  </h1>
  <form action="http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">
    
	<label>Nom :</label>
        <input type="text" name="TB_Nom_Propre" />
  
    <label>Pr&eacute;nom :</label>
      <input type="text" name="TB_Prenom" />
  
    <label>Nom d'utilisateur :</label>
  <input type="text" name="TB_Nom_Utilisateur" />
    <label> Mot de passe :</label>
      <input type="password" name="TB_Mot_de_Passe" />
    <label>Confirmer le passe:</label>
      <input type="password" name="TB_Confirmation_Mot_de_Passe" />
    <label> Adresse e-mail :</label>
      <input type="text" name="TB_Adresse_Email" />
    
      <input type="submit" name="BT_Envoyer" value="Envoyer" />
    
  </form>
  <p class="formulairetexte"><span class="formu">
  <?php if(isset($message)) { ?>
  <?php echo $message; ?>
  <?php } if($masquer_formulaire != true) { ?>
</span>  
  <?php } ?>
</p>
  </div>
</div>

</body>
</html>