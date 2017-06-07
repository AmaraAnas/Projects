<?php
    @mysql_connect('localhost', 'root', '');
    @mysql_select_db('boutiquebase');
    include_once("/Controllers/Produit.Controller.php");
    $controller=new ProduitController();
    if(!isset($_GET['page']))
    {
        $_GET['page']=1;
    }
    //$controller->produits_grille();
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
<div class="breadcrumbs  no-margin">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ol class="breadcrumb">
            
            <li><a href="index.php">Accueil</a></li>
            
            <li class="active">Nos produits</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <!-- Big banner -->
  <div class="row">
    <div class="col-xs-12">
      <div class="push-down-30">
        <div class="banners-big"> Ici un exemple de message : "Frais de port offerts dès 70 euros d'achats !" </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12  col-sm-3">
      <aside class="sidebar  sidebar--shop">
<?php 
    $controller->produits_list();
    require('inc_foot.php'); 
?>
</html>