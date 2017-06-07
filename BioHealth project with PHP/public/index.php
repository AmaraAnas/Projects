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
<?php require('inc_top.php'); var_dump($_COOKIE);  ?>

<div id="carousel-example-generic" class="carousel  slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item  active"> <a href="produit-details.php"><img src="images/organic-slider-40.jpg" alt=""></a></div>
		<div class="item "> <a href="produit-details.php"><img src="images/organic-slider-39.jpg" alt=""></a></div>
		<div class="item"> <a href="produit-details.php"><img src="images/organic-slider-40.jpg" alt=""></a></div>
	</div>
	<!-- Controls -->
	<a class="left  carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon  glyphicon-chevron-left"></span> </a> <a class="right  carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon  glyphicon-chevron-right"></span> </a> </div>
<div class="banners  push-down-30">
	<div class="container">
		<div class="row">
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box"> <span class="glyphicon glyphicon-phone glyphicon--banners"></span> <b class="banners__title">CONTACTEZ NOUS</b> +216 95 763 04 </div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box"> <span class="glyphicon glyphicon-plane glyphicon--banners"></span> <b class="banners__title">LIVRAISON EN 48H MAX.</b> partout dans le monde entier </div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box"> <span class="glyphicon glyphicon-credit-card glyphicon--banners"></span><b class="banners__title">PAIEMENT <span style="font-size:16px">100%</span> SECURISE</b> Credit cards, Paypal ... </div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box"> <span class="glyphicon glyphicon-leaf glyphicon--banners"></span> <b class="banners__title">100% PURE & NATURELLE</b> We think about your health </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<!-- Navigation for products -->
<div class="products-navigation  push-down-15">
	<div class="row">
		<div class="col-xs-12  col-sm-8">
			<div class="products-navigation__title">
				<h3><span class="light">Nos </span> Nouveautés</h3>
			</div>
		</div>
		<div class="col-xs-12  col-sm-4">
			<div class="products-navigation__arrows">
				<a href="#js--latest-products-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left  glyphicon-circle  products-navigation__arrow"></span></a>&nbsp;
				<a href="#js--latest-products-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right  glyphicon-circle  products-navigation__arrow"></span></a>
			</div>
		</div>
	</div>
</div>

<!-- Products -->
<div id="js--latest-products-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
	<!-- Wrapper for slides -->
	<div class="carousel-inner">


	<?php
		@mysql_connect('localhost', 'root', '');
		@mysql_select_db('boutiquebase');
		include_once("/Controllers/Produit.Controller.php");
		$controller=new ProduitController();
		$controller->index();
	?>

	

					
				
					
					
					
						
					
			

<!-- Banners big -->
<div class="banners-big  banners-big--newsletter">
	<div class="row">
		<div class="col-xs-12  col-md-7">
			<div class="banners-big__text">
				Inscrivez-vous dans notre newsletter pour recevoir les nouveautés de <strong>BioHealth</strong>
			</div>
		</div>
		<div class="col-xs-12  col-md-5">
			<div class="banners-big__form">
				<form action="#" method="post" name="mc-embedded-subscribe-form" role="form" target="_blank">
					<div class="form-group  form-group--form">
						<input type="email" name="EMAIL" class="form-control  form-control--form" placeholder="Entrez votre adresse email" required>
						<button class="btn  btn-primary" type="submit">S'inscrire</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<div class="row">
	<div class="col-xs-12 col-sm-4">
		<div class="widgets__navigation">
			<div class="widgets__heading--line">
				<h4 class="widgets__heading">Top Produits</h4>
			</div>
			
	
	<div class="push-down-20  clearfix">
		<a href="produit-details.php">
			<img alt="" class="widgets__products" width="78" src="images/produits/p1.jpg">
		</a>
		<h5 class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 1</a>    </h5>
		<span class="line-through">€11.25</span> <span class="products__price--widgets">€8.25</span><br><br>

		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
	</div>
	

	
	<div class="push-down-20  clearfix">
		<a href="produit-details.php"><img alt="" class="widgets__products" width="78" src="images/produits/p2.jpg"></a>
		<h5 class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 2</a></a>
		</h5>
		<span class="line-through">€14.63</span> <span class="products__price--widgets">€11.63</span>
		<br><br>

		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
	</div>
	

	
	<div class="push-down-20  clearfix">
		<a href="produit-details.php"><img alt="" class="widgets__products" width="78" src="images/produits/p3.jpg"></a>
		<h5 class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 3</a></a>
		</h5>
		<span class="line-through">€9.18</span> <span class="products__price--widgets">€6.18</span>
		<br><br>

		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-on"></span>
		
		<span class="glyphicon glyphicon-star  star-off"></span>
		
	</div>
	

		</div>
	</div>
	<div class="col-xs-12 col-sm-4">
		<div class="widgets__navigation">
			<div class="widgets__heading--line">
				<h4 class="widgets__heading">Meilleures ventes</h4>
			</div>
			
	
	<div class="clearfix  push-down-15">
		<a href="produit-details.php"><img alt="" class="widgets__products" width="78" src="images/produits/p4.jpg"></a>
		<div class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 4</a></a>
		</div>
		<span class="line-through">€16.71</span> <span class="products__price--widgets">€13.71</span>
		<br><br>
		<div class="products__category">
			Catégorie 1
		</div>
	</div>
	

	
	<div class="clearfix  push-down-15">
		<a href="produit-details.php"><img alt="" class="widgets__products" width="78" src="images/produits/p5.jpg"></a>
		<div class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 5</a></a>
		</div>
		<span class="line-through">€19.91</span> <span class="products__price--widgets">€16.91</span>
		<br><br>
		<div class="products__category">
			Catégorie3</div>
	</div>
	

	
	<div class="clearfix  push-down-15">
		<a href="produit-details.php"><img alt="" class="widgets__products" width="78" src="images/produits/p6.jpg"></a>
		<div class="products__title">
			<a class="products__link" href="produit-details.php">BioHealth produit 6</a></a>
		</div>
		<span class="line-through">€17.95</span> <span class="products__price--widgets">€14.95</span>
		<br><br>
		<div class="products__category">
			Autres
		</div>
	</div>
	


		</div>
	</div>
	<div class="col-xs-12 col-sm-4">
		<div class="widgets__navigation">
			<div class="widgets__heading--line">
				<h4 class="widgets__heading">A propos de Omega Tunisie</h4>
			</div>
			<a href="presentation.php"><img alt="#" class="product__image" src="images/omega-tunisie-1.jpg" width="353" height="186"></a>
			<div class="products__title">
			<div class="push-down-10"></div>
				<strong>OMEGA TUNISIE</strong> is an innovative company specialized in the extraction and export of Natural and Organic vegetable oils for cosmetic and pharmaceutical applications... <br>
				<br>
				<a href="presentation.php"><strong>Lire la suite</strong></a></div></div>
	</div>
</div>
	<div class="products-navigation  push-down-15">
		<div class="products-navigation__title">
			<h3><span class="light">Articles en  </span> Vedette</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12  col-sm-4  push-down-30">
		<div class="banners-medium  banners-medium--info">
			Diabète    </div>
		Ut consectetur, magna non accumsan laoreet, enim justo varius tortor, non ornare lacus lacus eu quam. Sed id leo sit amet leo facilisis consequat. Donec eget libero sed ante faucibus dignissim in vehicula sem. Mauris gravida neque vel nibh condimentum tincidunt. Cras interdum lacus eu ipsum lobortis viverra. Integer lorem justo, elementum malesuada pretium vel, egestas a eros. Curabitur consectetur nisl augue.
		<a href="#">[LIRE LA SUITE]</a></div>
	<div class="col-xs-12  col-sm-4  push-down-30">
		<div class="banners-medium  banners-medium--info">
			Appareil Digestif
		</div>
		Ut consectetur, magna non accumsan laoreet, enim justo varius tortor, non ornare lacus lacus eu quam. Sed id leo sit amet leo facilisis consequat. Donec eget libero sed ante faucibus dignissim in vehicula sem. Mauris gravida neque vel nibh condimentum tincidunt. Cras interdum lacus eu ipsum lobortis viverra. Integer lorem justo, elementum malesuada pretium vel, egestas a eros. Curabitur consectetur nisl augue.
		<a href="#">[LIRE LA SUITE]</a></div>
	<div class="col-xs-12  col-sm-4  push-down-30">
		<div class="banners-medium  banners-medium--info">Problèmes hormonaux    </div>
		Ut consectetur, magna non accumsan laoreet, enim justo varius tortor, non ornare lacus lacus eu quam. Sed id leo sit amet leo facilisis consequat. Donec eget libero sed ante faucibus dignissim in vehicula sem. Mauris gravida neque vel nibh condimentum tincidunt. Cras interdum lacus eu ipsum lobortis viverra. Integer lorem justo, elementum malesuada pretium vel, egestas a eros. Curabitur consectetur nisl augue.
		<a href="#">[LIRE LA SUITE]</a></div>
</div>
</div>

<div class="testimonials  light-paper-pattern">
	<div class="container">
		<div class="row">
			<div class="col-sm-3  hidden-xs">
				<div class="testimonials__quotes">
					<img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
				</div>
			</div>
			<div class="col-xs-12  col-sm-6">
				<a href="#js--testimonails-carousel" data-slide="prev"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-left"></span></a>
				<h4 class="testimonials__title"><span class="light">A propos de </span> BioHealth</h4>
				<a href="#js--testimonails-carousel" data-slide="next"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span></a>
				<hr class="divider-dark">
				<div id="js--testimonails-carousel" class="carousel  slide" data-ride="carousel" data-interval="5000">
					<div class="carousel-inner">
						<div class="item  active">
							<q class="testimonials__text">OMEGA TUNISIE is an innovative company specialized in the extraction and export of Natural and Organic vegetable oils for cosmetic and pharmaceutical applications.</q><br><br>
							<cite><b>Jelali Ramzi,</b></cite> General Manager
						</div>
						<div class="item">
							<q class="testimonials__text">OMEGA TUNISIE is an innovative company specialized in the extraction and export of Natural and Organic vegetable oils for cosmetic and pharmaceutical applications.</q><br><br>
							<cite><b>Jelali Ramzi,</b></cite> General Manager
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3  hidden-xs">
				<div class="testimonials__quotes--rotate">
					<img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="simple-map  js--where-we-are"></div>
	<?php require('inc_foot.php'); ?>
	<div class="search-mode__overlay"></div>
		<!--<script type="text/javascript">
			function downloadJSAtOnload() {
				var element = document.createElement("script");
				element.src = "scripts/main.js";
				document.body.appendChild(element);
			}
			if (window.addEventListener)
				window.addEventListener("load", downloadJSAtOnload, false);
			else if (window.attachEvent)
				window.attachEvent("onload", downloadJSAtOnload);
			else window.onload = downloadJSAtOnload;
		</script>-->
		
		
		<script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
		

	</body>
</html>