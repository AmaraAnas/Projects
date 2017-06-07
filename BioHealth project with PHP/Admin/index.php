<?php

//$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_COOKIE['ID_ADMIN'])) {
	header ('Location: connexion.php');
	exit();
}
session_start();
if (isset($_SESSION['LAST_ACTIVITY']))
{ if (time() - $_SESSION['LAST_ACTIVITY'] > 60000) {

	/* last request was more than 30 minutes ago */

	// unset $_SESSION variable for the run-time
	session_unset();

	// destroy session data in storage
	session_destroy();
	header ('Location: deconnexion.php');
}
}


// update last activity time stamp
$_SESSION['LAST_ACTIVITY'] = time();
?>
<html>
	<head>
		<title></title>
		<link href="Views/Style/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" charset="utf8" src="Views/Script/jquery-2.0.3.js"></script>
		<script type="text/javascript" src="Views/Script/bootstrap.min.js"></script>

		<h5>Salut <?php echo $_COOKIE['PSEUDO'] ?> !!  <a href="deconnexion.php">Déconnexion</a ></h5>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1> Espace Admin</h1>
			</div>
			<div id="content">
				<div id="Menu">
					<h1>Menu</h1>
					<ul><li><a href="?controler=Admin&page=1">Gestion Comptes Admin</a></li>
						<li><a href="?controler=Produit&page=1">Gestion des Produits</a></li>
						<li><a href="?controler=Categorie&page=1">Gestion des Categories</a></li>
						<li><a href="?controler=Client&page=1">Gestion des Clients</a>
						<li><a href="?controler=Cfp&page=1">Gestion des Commandes</a>
						<li><a href="?controler=Cfp&action=list_client&page=1">Liste des Commandes & Factures par Client</a></li>

					</ul>
				</div>
				<div id="main">
					<?php
						//Connexion au serveur de base de données
					//mysqli_connect('localhost','root', '');
						@mysql_connect('localhost', 'root', '');
						@mysql_select_db('boutiquebase');
						/*Traitement de la Requete*/ 

						$controler = 'Produit';
						$action = 'index';
						$id = '';
						if(!empty($_GET['controler'])){
							$controler = $_GET['controler'];
							if(!empty($_GET['action'])){
								$action = $_GET['action'];
								if(!empty($_GET['id']))
									$id = $_GET['id'];
							}
						}
						//On inclut le fichier de conrtoleur spécifier s'il existe
						if(is_file('Controllers/'.$controler.'.Controller.php')){
							include 'Controllers/'.$controler.'.Controller.php';
							$class = $controler."Controller";
							$objet = new $class();
							$objet->$action($id,1);
						}
						//Fermeture de connexion avec Serveur de DB
						mysql_close();
					?>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>