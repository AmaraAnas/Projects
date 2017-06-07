<?php
    @mysql_connect('localhost', 'root', '');
    @mysql_select_db('boutiquebase');
    include_once("/Controllers/Produit.Controller.php");
    $controller=new ProduitController();
    if(!isset($_GET['id']))
    {
      header("Location: produits-grille.php");
    }
    //$controller->produits_details();
?>
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
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="index.php">Accueil</a></li>
            
            <li><a href="produits.php">Produits</a></li>
            
            <li class="active">Détails</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="push-down-30">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="product-preview">
          
<?php 
  $controller->produits_details();
require('inc_foot.php'); ?>
  <div class="search-mode__overlay"></div>
    <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
  </body>
</html>