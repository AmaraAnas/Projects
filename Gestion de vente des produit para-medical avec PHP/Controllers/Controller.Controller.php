<?php
include(dirname(__FILE__)."/../Models/Categorie.Model.php");
include(dirname(__FILE__)."/../Models/Country.Model.php");
include(dirname(__FILE__)."/../Models/Employer.Model.php");
include(dirname(__FILE__)."/../Models/Fonction.Model.php");
include(dirname(__FILE__)."/../Models/Lab.Model.php");
include(dirname(__FILE__)."/../Models/Lmed.Model.php");
include(dirname(__FILE__)."/../Models/Lplanings.Model.php");
include(dirname(__FILE__)."/../Models/Lpro_emp_zone.Model.php");
include(dirname(__FILE__)."/../Models/Medecins.Model.php");
include(dirname(__FILE__)."/../Models/Planing.Model.php");
include(dirname(__FILE__)."/../Models/Produits.Model.php");
include(dirname(__FILE__)."/../Models/Specialite.Model.php");
include(dirname(__FILE__)."/../Models/Users.Model.php");
include(dirname(__FILE__)."/../Models/Zone.Model.php");
include(dirname(__FILE__)."/../Models/Municipalite.Model.php");
include(dirname(__FILE__)."/../Models/Gouvernorat.Model.php");
include(dirname(__FILE__)."/../Models/Comptes_utilisateurs.Model.php");
	abstract class Controller{		/*Un tableau pour Récupére le données de contrôleur (provenant 		éventuellement de models) pour usage futur(Dans les vues)*/		protected $viewData = array();				//Retourne la vue correspondante		protected function View($action){//echo get_class($this)."9999999";die;			//Récupérer le controleur a partir de classe fille.			$controller = str_replace('Controller', '', get_class($this));			//La vue correspondant			$view = $controller . '/' . $action.'.phtml';//echo dirname(__FILE__).'/../Views/'.$view;die;			include(dirname(__FILE__).'/../Views/'.$view);		}		//Rederiction vers une action d'un contrôleur		protected function RederictAction(){		/*Récupération des paramétres : contrôleur(action index par défaut ou action d'un 		contrôleur précis avec ou sans id identifiant d'un objet qui aurais subi l'action*/			$arg_list = func_get_args();			if(count($arg_list)== 1)				$url = 'controler='.$arg_list[0];			elseif(count($arg_list)== 2)				$url = 'controler='.$arg_list[0].'&action='.$arg_list[1];			else				$url = 'controler='.$arg_list[0].'&action='.$arg_list[1].'						&id='.$arg_list[2];			echo '<script type="text/javascript">					window.location = "?'.$url.'"</script>';		}	}?>