
<!DOCTYPE html>
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
        <h3>Inscription</h3>
        <hr>
        <table width="60%" border="0" align="center" cellpadding="2">
          <tr>
            <td>

<div class="modal-body">
<?php
    @mysql_connect('localhost', 'root', '');
    @mysql_select_db('boutiquebase');
    include_once("/Controllers/Client.Controller.php");
    $controller=new ClientController();
    $controller->inscription();
?>

<a href="login.php">Déjà enregistré?</a>
</div>
            </td>
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
    <script type="text/javascript">
      document.getElementById("pays").selectedIndex="-1";
      for (var i = 0; i < pays.length; i++) 
      {
        document.getElementById("pays").options[document.getElementById("pays").length]=new Option(pays[i]['pays'],pays[i]['pays_id']);
      }
      function selectVille() 
      {
        document.getElementById('ville_id').length=0;
        if(document.getElementById("pays").selectedIndex!="-1")
        {
          document.getElementById("villediv").style.display="block";
          for (var i = 0; i < ville.length; i++) 
          {
            if (ville[i]['pays_id']==document.getElementById('pays').value) 
            {
              document.getElementById('ville_id').options[document.getElementById("ville_id").length]=new Option(ville[i]['libelle'],ville[i]['ville_id'])
            }
          }
        }
      }
    </script>
  </body>
</html>