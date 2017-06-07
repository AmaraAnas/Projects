
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
            
            <li><a href="#">Commande</a></li>
            
            <li class="active">Panier</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="woocommerce  push-down-30">
  <div class="container">
    <div class="row">
      <div class="col-xs-12  push-down-30">
        <h3>Panier</h3>
        <hr>
        <table class="shop-table  shop-cart">
          <thead>
            <tr class="cart_table_title">
              <th class="product-remove"></th>
              <th class="product-thumbnail"></th>
              <th class="product-name">Produit</th>
              <th class="product-price">Prix</th>
              <th class="product-quantity">Quantité</th>
              <th class="product-subtotal">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr class="cart_table_item">
              <td class="product-remove"><span class="glyphicon  glyphicon-remove"></span></td>
              <td class="product-thumbnail"><a href="produit-details.php"><img src="images/produits/p0.jpg" width="80"></a></td>
              <td class="product-name"><a href="produit-details.php">Produit 1</a></td>
              <td class="product-price">€35</td>
              <td class="product-quantity"><div class="quantity  js--quantity">
                <input type="button" value="-" class="quantity__button  js--minus-one  js--clickable">
                <input type="text" name="quantity" value="1" class="quantity__input">
                <input type="button" value="+" class="quantity__button  js--plus-one  js--clickable">
              </div></td>
              <td class="product-subtotal">€35</td>
            </tr>
            <tr class="cart_table_item">
              <td class="product-remove"><span class="glyphicon  glyphicon-remove"></span></td>
              <td class="product-thumbnail"><a href="produit-details.php"><img src="images/produits/p_01.jpg" width="80"></a></td>
              <td class="product-name"><a href="produit-details.php">Produit 2</a></td>
              <td class="product-price">€35</td>
              <td class="product-quantity"><div class="quantity  js--quantity">
                <input type="button" value="-" class="quantity__button  js--minus-one  js--clickable">
                <input type="text" name="quantity" value="1" class="quantity__input">
                <input type="button" value="+" class="quantity__button  js--plus-one  js--clickable">
              </div></td>
              <td class="product-subtotal">€35</td>
            </tr>
            <tr class="cart_table_action">
              <td colspan="6" class="actions"><div class="col-xs-6">
                <div class="coupon">
                  <input name="coupon_code" class="input-text">
                  <a href="cart.php" class="btn  btn-warning">Coupon de réduction</a> </div>
              </div>
                <div class="col-xs-6"> <a href="commande-checkout.php" class="btn  btn-primary  pull-right">Passer la commande</a> <a href="cart.php" class="btn  btn-warning  pull-right">Mise à jour panier</a> </div></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-xs-12 col-sm-6"></div>
      <div class="col-xs-12 col-sm-6">
        <!-- Your order - table -->
        <table class="shop_table  push-down-30">
          <tfoot>
            <tr class="cart-subtotal">
              <th>Total produits</th>
              <td><span class="amount">€70</span></td>
            </tr>
            <tr class="shipping">
              <th>Total frais de port</th>
              <td>Livraison gratuite</td>
            </tr>
            <tr class="total">
              <th><strong>Total de la commande</strong></th>
              <td><strong><span class="amount">€70</span></strong></td>
            </tr>
          </tfoot>
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