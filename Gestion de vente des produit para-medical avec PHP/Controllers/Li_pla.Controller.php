<?php 

	require_once('Controller.Controller.php');
	class Li_plaController extends Controller{
		public function index(){
			$li_pla = new Li_plaModel();
			$this->viewData["listLi_pla"] = $li_pla->listLi_pla();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$li_pla = new Li_plaModel();
			$this->viewData["li_pla"] = $li_pla;
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
		/*	$lab = new LabModel();
			$this->viewData["listLab"] = $lab->listLab();*/
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["planing_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_pla->setplaning_id($_POST["planing_id"]);
				$li_pla->AddModelError("planing_id", " * Erreur Labo");
				$li_pla->setmed_id($_POST["med_id"]);
				$li_pla->AddModelError("med_id", " * Erreur Medecin");
				$li_pla->setpro_id($_POST["pro_id"]);
				$li_pla->AddModelError("pro_id", " * Erreur Produit");
				$li_pla->setobservation($_POST["observation"]);
				$li_pla->AddModelError("observation", " * Erreur Observation");
				$li_pla->setetat($_POST["etat"]);
				$li_pla->AddModelError("etat", " * Erreur Etat");
				$li_pla->setdate($_POST["date"]);
				$li_pla->AddModelError("date", " * Erreur Date");
				$li_pla->setheure($_POST["heure"]);
				$li_pla->AddModelError("heure", " * Erreur Heure");
				if($li_pla->IsValid()){
					$li_pla->add();
					$this->RederictAction("Li_pla");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$li_pla = new Li_plaModel();
			$this->viewData["li_pla"] = $li_pla->findli_pla($id);
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
			/*$lab = new LabModel();
			$this->viewData["listLab"] = $lab->listLab();*/
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["planing_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_pla->setplaning_id($_POST["planing_id"]);
				$li_pla->AddModelError("planing_id", " * Erreur Labo");
				$li_pla->setmed_id($_POST["med_id"]);
				$li_pla->AddModelError("med_id", " * Erreur Medecin");
				$li_pla->setpro_id($_POST["pro_id"]);
				$li_pla->AddModelError("pro_id", " * Erreur Produit");
				$li_pla->setobservation($_POST["observation"]);
				$li_pla->AddModelError("observation", " * Erreur Observation");
				$li_pla->setetat($_POST["etat"]);
				$li_pla->AddModelError("etat", " * Erreur Etat");
				$li_pla->setdate($_POST["date"]);
				$li_pla->AddModelError("date", " * Erreur Date");
				$li_pla->setheure($_POST["heure"]);
				$li_pla->AddModelError("heure", " * Erreur Heure");
				if($li_pla->IsValid()){
					$li_pla->update($id);
					$this->RederictAction("Li_pla");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$li_pla = new Li_plaModel();
			$this->viewData["li_pla"] = $li_pla->findli_pla($id);
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
		/*	$lab = new LabModel();
			$this->viewData["listLab"] = $lab->listLab();*/
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_GET["id"])){
				$li_pla->delete($id);
				$this->RederictAction("Li_pla");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>