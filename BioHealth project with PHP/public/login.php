<?php
require "./secret/config.php";
if(isset($_POST["BT_Envoyer"]))
{
@mysql_connect("$dbhost", "$dbuser", "$dbpass");
mysql_select_db("$db");
$result = mysql_query("SELECT * FROM client WHERE email = '" . $_POST["email"] . "'");
if(!$result)
{
  $message = "Une erreur est survenue lors de la tentative de connexion";
}
else
{
  // Si aucun utilisateur n'a �t� trouv�
  if(mysql_num_rows($result) == 0)
  {
    $message = "Le nom d'utilisateur " . $_POST["name"] . " n'existe pas";
  }
  else
  {
    // R�cup�ration des donn�es
    $row = mysql_fetch_array($result);

    // V�rification du mot de passe
    if($_POST["subject"] != $row["password"])
    {
      $message = "Votre mot de passe est incorrect";
    }
    else
    {
      setcookie("ID_CLIENT", $row["client_id"], $expiration, "/");
      header("Location: index.php");




      mysql_close();
      header("Location: index.php");
    }
  }
}
mysql_close(); }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="BIS">
    <link rel="icon" type="image/ico" href="images/favicon.png">

    <title>BioHealth products - WE THINK ABOUT YOUR HEALTH</title>

    <!-- Custom styles for this template -->
    <!-- build:css stylesheets/main.css -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/main.css" rel="stylesheet">
    <!-- endbuild -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Google fonts -->
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Arvo:700:latin', 'Open+Sans:400,600,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

  </head>
  <body>
<?php require('inc_top.php'); ?>
<div class="breadcrumbs  no-margin">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="index.php">Accueil</a></li>
            <li class="active">Connexion</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="woocommerce  push-down-30">
  <div class="container">
  
    <div class="row">
      <div class="col-xs-12">
        <h3>Authentification</h3>
        <hr>
        <table width="60%" border="0" align="center" cellpadding="2">
          <tr>
            <td><div class="modal-body" style="text-align: center">
              <form action="http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>"   method="post" class="push-down-15">
                <div class="form-group">
                  <input type="text"  name="email" class="form-control  form-control--contact" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="text"  name="subject" class="form-control  form-control--contact" placeholder="Mot de passe">
                </div>
                <button type="submit" name="BT_Envoyer" class="btn  btn-primary">SE CONNECTER</button>
              </form>
                              <span class="page-not-found__text">vous n'avez pas encore de compte? <a href="inscription.php">Créez votre compte</a></span>
            </div></td>
          </tr>
        </table>
      </div>
    </div>
    <hr class="divider">
  </div>
</div>
  <?php require('inc_foot.php'); ?>
  <div class="search-mode__overlay"></div>
    <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
  </body>
</html>