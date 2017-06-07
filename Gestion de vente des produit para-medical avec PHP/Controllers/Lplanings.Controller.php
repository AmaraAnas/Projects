<?php 
	require_once('Controller.Controller.php');
	class LplaningsController extends Controller{
		public function index(){
			$li_pla = new LplaningsModel();
			$this->viewData["listLplanings"] = $li_pla->listLplanings();
			$this->View(__FUNCTION__);
			}
		public function ajouter(){
			$li_pla = new LplaningsModel();
			$this->viewData["Lplanings"] = $li_pla;
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits(); 
		if(!isset($_POST["planing_id"])) $this->View(__FUNCTION__); else{
			$li_pla->setplaning_id($_POST["planing_id"]);
			$li_pla->AddModelError("planing_id", " * Erreur planing_id");
			$li_pla->setpro_id($_POST["pro_id"]);
			$li_pla->AddModelError("pro_id", " * Erreur pro_id");
			$li_pla->setobservation($_POST["observation"]);
			$li_pla->AddModelError("observation", " * Erreur observation");
			$li_pla->setetat($_POST["etat"]);
			$li_pla->AddModelError("etat", " * Erreur etat");
			$li_pla->setdate($_POST["date"]);
			$li_pla->AddModelError("date", " * Erreur date");
			$li_pla->addLplanings();
			$this->RederictAction("Lplanings");}
 }
		public function modifier($id){
			$li_pla = new LplaningsModel();
			$this->viewData["Lplanings"] = $li_pla->findLplanings($id);
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			if(!isset($_POST["planing_id"])) $this->View(__FUNCTION__); else{
			$li_pla->setplaning_id($_POST["planing_id"]);
			$li_pla->setpro_id($_POST["pro_id"]);
			$li_pla->setobservation($_POST["observation"]);
			$li_pla->setetat($_POST["etat"]);
			$li_pla->setdate($_POST["date"]);
			$li_pla->updateLplanings($id);
			$this->RederictAction("Lplanings");
		}}

		public function supprimer($id){
			$li_pla = new LplaningsModel();
			$this->viewData["Lplanings"] = $li_pla->findLplanings($id);
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			if(isset($_POST["li_id"])){
				$li_pla->deleteLplanings($id);
				$this->RederictAction("li_pla");
			}
			$this->View(__FUNCTION__);
		}
	}
 ?>