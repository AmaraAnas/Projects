<?php
require "secret/config.php";
$Adresse_Email = isset($_POST['TB_Adresse_Email']) ? $_POST['TB_Adresse_Email'] : null;
    
     // Une fois le formulaire envoy�
     if(isset($_POST["BT_Envoyer"]))
     {
           
          // V�rification de la validit� des champs
           if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$/',
               $_POST["TB_Adresse_Email"]))
          {
               $message = "Votre adresse e-mail n'est pas valide";
          }
          else
          {
               
               // Connexion � la base de donn�es
               // Valeurs � modifier selon vos param�tres configuration
               mysql_connect("$dbhost", "$dbuser", "$dbpass");
               mysql_select_db("$db");
               
               // V�rification de l'unicit� du nom d'utilisateur et de l'adresse e-mail
               $result = mysql_query("
                    SELECT Adresse_Email
                    FROM Comptes_Utilisateurs
                    WHERE Adresse_Email = '" . $_POST["TB_Adresse_Email"] . "'
               ");
			   
	              // G�n�ration de la clef de suppression
                         $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_suppression = "";
                         
                         foreach($caracteres_aleatoires as $i)
                         {
                              $clef_suppression .= $caracteres[$i];
                         }
						 
						     // Cr�ation du compte utilisateur
                         $result2 = mysql_query("
                              UPDATE Comptes_Utilisateurs 
							  SET Clef_Suppression= '" . $clef_suppression . "'
							  WHERE Adresse_Email = '" . $_POST["TB_Adresse_Email"] . "'
                         ");
                             //v�rification de l'Email dans la base de donn�e
				   if(mysql_num_rows($result) == 0)
                    {
					   $message = "L'adresse mail que vous venez d'enregistrer: " . $_POST["TB_Adresse_Email"];
					   $message .= ", n'est pas correcte";
                    }else{
						// Envoi du mail de suppression
                        $sujet = "D�sinscription de votre compte utilisateur";                              
						$message = " Ce mail vous a �t� envoyer car il a �t� enregistr� pour supprimer le compte sur le \n";
						$message .= "site de (votre site). Pour valider votre d�sinscription, merci de cliquer sur le lien suivant:\n";														
						$message .= "http://" . $_SERVER["SERVER_NAME"];
						$message .= "/se/supprimer.php?Clef_Suppression=".$clef_suppression."";
						// Si une erreur survient
						  if(!@mail($_POST["TB_Adresse_Email"], $sujet, $message))
						  {
							   $message = "Une erreur est survenue lors de l'envoi du mail de suppression<br />\n";
							   $message .= "Veuillez contacter l'administrateur afin de supprimer votre compte";
						  }
						  else
						  {
							   
							   // Message de confirmation
							   $message = "Votre Email est bien dans notre base<br />\n";
							   $message .= "Un email vient de vous �tre envoyer afin de supprimer votre compte";
							   
							   // On masque le formulaire
							   $masquer_formulaire = true;
							   
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
	<title>Loguin</title>
    <link rel="stylesheet" href="<?php echo '/afifbo/';?>public/css/reset.css" />
	<link rel="stylesheet" href="<?php echo '/afifbo/'; ?>public/css/default.css" />
	<script type="text/javascript" src="<?php echo '/afifbo/'; ?>public/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo '/afifbo/'; ?>public/js/custom.js"></script>
</head>
<body>
<div class="content" >
	<div class="login" >
	<h1>D&eacute;sinscription  </h1>
  <form action="http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">
    <label> Adresse e-mail :<label>
      <input type="text" name="TB_Adresse_Email" />
      <input type="submit" name="BT_Envoyer" value="Envoyer" />
    
  </form>
  <p class="formulairetexte"><span class="formu">
  <?php if(isset($message)) { ?>
  <?php echo $message; ?>
  <?php } if(isset($masquer_formulaire) && $masquer_formulaire != true) { ?>
</span>  
  <?php } ?>
</p>
</div>

</body>
</html>