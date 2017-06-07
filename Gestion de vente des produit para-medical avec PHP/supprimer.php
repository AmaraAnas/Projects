<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../../images/favicon.jpg">
 <link rel="shortcut icon" href="../../images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Membre supprim&eacute;</title>
<style type="text/css">
.supcentrer {
	font-size: 30px;
	text-decoration: underline;
	text-align: center;
}
#supprim {
	background-color: #CCC;
	text-align: center;
	height: 100px;
	width: 300px;
	margin-right: auto;
	margin-left: auto;
	border-top-style: double;
	border-right-style: double;
	border-bottom-style: double;
	border-left-style: double;
}
.titre {
	font-size: 18px;
	font-weight: bold;
	text-decoration: underline;
}
.retour {
	font-weight: normal;
	font-size: 16px;
}
</style>
</head>

<div class="titre" id="supprim">
  <p>Votre compte a bien &eacute;t&eacute; supprim&eacute;</p>
  <p class="retour"><a href="../index.html">RETOUR</a></p>
</div>
<div class="supcentrer">
<p>
  <?php 
  
  require "secret/config.php";
  
  
if (isset($_GET['Clef_Suppression'])) { ($tutu=htmlentities($_GET['Clef_Suppression'])); }
 
//connexion au serveur:
$cnx = mysql_connect("$dbhost", "$dbuser", "$dbpass");
$db =  mysql_select_db("$db");
//création de la requête SQL:


if(!$cnx) { echo "Connexion impossible &agrave;base $sql_bdd serveur $sql_server<br>V&eacute;rifiez config.php"; exit; }
else
  {
   $sql = "DELETE FROM Comptes_Utilisateurs WHERE Clef_Suppression ='$tutu';";
   $requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
  }
if($requete)
      { ?>
  <class="moterreur"><?php echo $TsupOK ; ?><br><br>
</p>
<?php }
      else { ?><div class="moterreur"><?php echo $TsupNOOK ; ?>

  <?php }  
?>
 </td>


</body>
</html>