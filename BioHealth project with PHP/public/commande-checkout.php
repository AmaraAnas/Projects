
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
            <li class="active">Commande</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<form action="confirmation-commande.php">
<div class="woocommerce  push-down-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h3>Récapitulatif</h3>
        <hr>
      </div>
      <div class="col-xs-12  col-sm-6">
        <h3><span class="light">Adresse de</span> facturation</h3>
        <div class="row">
          <div class="col-xs-12  col-sm-12  push-down-10">
            <p>
              <label> Pays <abbr class="required"> * </abbr> </label>
              <select name="select" class="input-text">
                <option>Choisissez un pays...</option>
                <option value="TUN" selected>Tunisie</option>
                <option value="FR">France</option>
                <option value="USA">USA</option>
              </select>
            </p>
          </div>
          <div class="col-xs-12  col-sm-6  push-down-10">
            <p>
              <label> Nom <abbr class="required"> * </abbr> </label>
              <input class="input-text" required>
            </p>
          </div>
          <div class="col-xs-12  col-sm-6  push-down-10">
            <p>
              <label> Prénom <abbr class="required"> * </abbr> </label>
              <input class="input-text">
            </p>
          </div>
          <div class="col-xs-12  col-sm-12  push-down-10">
            <p>
              <label> Adresse <abbr class="required"> * </abbr> </label>
              <input class="input-text  push-down-10" placeholder="Adresse de la rue">
              <input class="input-text" placeholder="Appartement, bureau, unité, etc. (en option)">
            </p>
          </div>
          <div class="col-xs-12  col-sm-12  push-down-10">
            <p>
              <label> Code postal / Zip <abbr class="required"> * </abbr> </label>
              <input class="input-text  push-down-10" placeholder="Code postal / Zip">
            </p>
          </div>
          <div class="col-xs-12  col-sm-12  push-down-10">
            <p>
              <label> Ville <abbr class="required"> * </abbr> </label>
              <input class="input-text  push-down-10" placeholder="Ville">
            </p>
          </div>
          <div class="col-xs-12  col-sm-6  push-down-10">
            <p>
              <label> Adresse e-mail <abbr class="required"> * </abbr> </label>
              <input class="input-text">
            </p>
          </div>
          <div class="col-xs-12  col-sm-6  push-down-10">
            <p>
              <label> Tél. <abbr class="required"> * </abbr> </label>
              <input class="input-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <p class="form-row">
          <input class="input-checkbox" type="checkbox">
          Utiliser la même adresse de la facturation? </p>
        <h3><span class="light">Adresse de </span> livraison</h3>
        <p>
          <label> Informations supplémentaires </label>
          <textarea name="textarea" rows="3" class="input-text"></textarea>
        </p>
      </div>
      <div class="col-xs-12">
        <!-- Your order - table -->
        <h3><span class="light">Votre</span> commande</h3>
        <table class="shop_table  push-down-30">
          <thead>
            <tr>
              <th class="product-name">Produit</th>
              <th class="product-total">Total</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="cart-subtotal">
              <th>Sous-total</th>
              <td><span class="amount">€70</span></td>
            </tr>
            <tr class="shipping">
              <th>Livraison</th>
              <td>Livraison gratuite</td>
            </tr>
            <tr class="total">
              <th><strong>Total de la commande</strong></th>
              <td><strong><span class="amount">€70</span></strong></td>
            </tr>
          </tfoot>
          <tbody>
            <tr class="checkout_table_item">
              <td class="product-name">Produit 1 <strong class="product-quantity">× 1</strong><br>
                <strong>option:</strong> op1</td>
              <td class="product-total"><span class="amount">€35</span></td>
            </tr>
          </tbody>
          <tbody>
            <tr class="checkout_table_item">
              <td class="product-name">Produit 2 <strong class="product-quantity">× 3</strong><br>
                <strong>option:</strong> op4</td>
              <td class="product-total"><span class="amount">€35</span></td>
            </tr>
          </tbody>
        </table>
        <!-- Payment methods -->
        <div class="payment">
          <ul class="payment_methods">
            <li>
              <input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="1" checked="checked">
              <label class="test">Payer comptant à la livraison</label>
            </li>
            <li>
              <input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="2">
              <label class="test">Virement bancaire</label>
            </li>
            <li>
              <input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="3" checked="checked">
              <label>Paiement par chèque</label>
            </li>
            <li>
              <input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" value="bacs" checked="checked">
              <label>PayPal</label>
            </li>
          </ul>
        </div>
        <div class="payment">
          <ul class="payment_methods">
            <li>
              <input type="checkbox" id="accepter_cond_gen" class="input-checkbox" name="accepter_cond_gen" value="1">
              <label class="test" style="font-weight:normal">J'ai lu les conditions générales de vente et j'y adhère sans réserve. (<a href="#">Lire les Conditions générales de vente</a>)</label>
            </li>
          </ul>
          <div class="pull-right">
            <button type="Submit" class="btn btn-warning">Je confirme ma commande</button>
          </div>
</div>
      </div>
    </div>
    <hr class="divider">
  </div>
</div>
</form>
  <?php require('inc_foot.php'); ?>
  <div class="search-mode__overlay"></div>
    <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
  </body>
</html>