
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
            
            <li class="active">Contact</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="simple-map  js--where-we-are"></div>
<div class="container  push-down-30">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="center"><span class="light">Envoyez-nous </span>un message</h1>
      <hr class="divider">
      <div class="text-shrink">
        <p class="text-highlight">Nous vous remercions de nous contacter pour toute question,<br>
demande, commentaire ou suggestion.</p>
      </div>
      <hr class="divider  divider-about">
      <div class="push-down-30"></div>
      <div class="row">
      <form action="#">
        <div class="col-xs-12  col-sm-3">
          <div class="form-group"> <span class="text-dark">Nom et Prénom <span class="warning">*</span></span>
            <input type="text" class="form-control  form-control--contact" required>
          </div>
          <div class="form-group"> <span class="text-dark">E-mail <span class="warning">*</span></span>
            <input type="email" class="form-control  form-control--contact" required>
          </div>
          <div class="form-group"> <span class="text-dark">Sujet <span class="warning">*</span></span>
            <input type="text" class="form-control  form-control--contact" required>
          </div>
          Les champs marqués d'un <span class="warning">*</span> sont obligatoires </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group"> <span class="text-dark">Message <span class="warning">*</span></span>
            <textarea name="textarea" rows="12" class="form-control form-control--contact form-control--big" required></textarea>
          </div>
          <div class="pull-right">
            <button type="Submit" class="btn btn-warning">Envoyer votre message</button>
          </div>
        </div>
        </form>
        <div class="col-xs-12 col-sm-3">
          <h2><span class="light">Bio</span>Health</h2>
          <h5>Omega Tunisie. Sidi Essayeh,<br>
Sidi Bouzid 9131,<br>
Tunisie<br></h5>
          <span class="glyphicon  glyphicon-earphone"></span> <span class="text-dark">+216 95 763 04</span><br>
          <span class="glyphicon  glyphicon-envelope"></span> <a class="secondary-link" href="mailto:contact@biohealth-products.com"><strong>contact@biohealth-products.com</strong></a> </div>
      </div>
    </div>
  </div>
</div>
<?php require('inc_foot.php'); ?>
  <div class="search-mode__overlay"></div>
    <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
  </body>
</html>