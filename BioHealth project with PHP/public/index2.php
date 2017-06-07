<?php

?>
<html>
	<head>
		<title></title>
		<link href="Views/Style/style.css" rel="stylesheet" type="text/css" />
		<h5>Salut!!  <a href="deconnexion.php">Déconnexion</a ></h5>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<h1> Espace Admin</h1>
			</div>
			<div id="content">
				<div id="Menu">
					<h1>Menu</h1>
					<ul><li><a href="?controler=Admin">Gestion Comptes Admin</a></li>
						<li><a href="?controler=Produit">Gestion des Produits</a></li>
						<li><a href="?controler=Categorie">Gestion des Categories</a></li>
						<li><a href="?controler=Client">Gestion des Clients</a></li>

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
							$objet->$action($id);
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