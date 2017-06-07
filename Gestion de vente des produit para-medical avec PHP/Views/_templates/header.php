<?php
session_start(); 
//echo '<pre>'.$_COOKIE['type'];
//echo '<pre>';print_r($_COOKIE );
?>
<!doctype html>
<html>
<head>
	<title>My Lab</title>
	
	<link href="Views/Style/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="Views/Style/site.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="public/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="public/js/custom.js"></script>
</head>
<body>
    <div class="header">
       <!-- <div class="header_left_box">		-->
	   <div id="menu-wrapper">
    <!--    <ul id="menu">-->
			<ul id="menu" class="menu">
			
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1050 separator">
								<a href="">Clients<span class="arrow"></span>
									<span class="l"></span>
									<span class="r"></span>
								</a>
								<span class="center"></span>
								<ul class="sub-menu">
									
									
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Medecins">Clients<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Lmed">Detaille client<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								</ul>
							</li>
							
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1050 separator">
								<a href="">Planing<span class="arrow"></span>
									<span class="l"></span>
									<span class="r"></span>
								</a>
								<span class="center"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Planing">Planing<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Lplanings">Detaille planings<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								
								</ul>
							</li>
						
						<!--<li><a href="?controler=Employer">Employer</a></li>-->
						<li><a href="?controler=Lab">Lab</a></li>
						<li><a href="?controler=Lpro_emp_zone">Lpro_emp_zone</a></li>
						
					<?php // if($_COOKIE['type']==0){ ?>
						<li><a href="?controler=Produits">Produits</a></li>
						<li><a href="?controler=Comptes_utilisateurs">Users</a></li>
							<?php if (isset($_COOKIE["ID_UTILISATEUR"]) and $_COOKIE["type"]==0): ?>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1050 separator">
								<a href="">configuration<span class="arrow"></span>
									<span class="l"></span>
									<span class="r"></span>
								</a>
								<span class="center"></span>
								<ul class="sub-menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Country">Paye<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Gouvernorat">Gouvernorat<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Municipalite">Municipalite<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Zone">Zone</a><span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Fonction">Fonction<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1054 separator">
									<a href="?controler=Specialite">Specialite<span class="arrow"></span><span class="l"></span>
								<span class="r"></span></a><span class="center"></span></li>
								</ul>
							</li>
			<?php endif ?>
        </ul>   
        
        <?php if (isset($_COOKIE["ID_UTILISATEUR"])): ?>
                    Hello <?php echo ($_COOKIE["NOM_UTILISATEUR"]); ?> ! <a href="deconnexion.php" style="color: #fff;">Déconnexion</a>
                
        <?php endif; ?></div>
        <div class="clear-both"></div>
    </div>	
	