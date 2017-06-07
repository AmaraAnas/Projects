<?php 

	require_once('Controller.Controller.php');
	class PlaningController extends Controller{
		public function index(){
			$planing = new PlaningModel();
			$this->viewData["listPlaning"] = $planing->listPlaning();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$users= new Comptes_utilisateursModel();
			$this->viewData["listusers"] = $users->listComptes_utilisateurs();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$planing = new PlaningModel();
			$this->viewData["planing"] = $planing;
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$users= new Comptes_utilisateursModel();
			$this->viewData["listusers"] = $users->listComptes_utilisateurs();
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["zone_id"]) || !isset($_POST["empl_id"]) || !isset($_POST["observation"]) || !isset($_POST["etat"])  )
				$this->View(__FUNCTION__);
			else{
				$planing->setzone_id($_POST["zone_id"]);
				$planing->AddModelError("zone_id", " * Erreur Zone");
				$planing->setempl_id($_POST["empl_id"]);
				$planing->AddModelError("empl_id", " * Erreur Delegué");
				$planing->setobservation($_POST["observation"]);
				$planing->AddModelError("observation", " * Erreur Observation");
				$planing->setetat($_POST["etat"]);
				$planing->AddModelError("etat", " * Erreur Etat");
				if($planing->IsValid()){
					$planing->add();
					$this->RederictAction("Planing");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$planing = new PlaningModel();
			$this->viewData["planing"] = $planing->findplaning($id);
			//$lab = new LabModel();
			//$this->viewData["listLab"] = $lab->listLab();
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["zone_id"]) || !isset($_POST["empl_id"]) || !isset($_POST["observation"]) || !isset($_POST["etat"])  )
				$this->View(__FUNCTION__);
			else{
				//$planing->setlab_id($_POST["lab_id"]);
				//$planing->AddModelError("lab_id", " * Erreur Labo");
				$planing->setzone_id($_POST["zone_id"]);
				$planing->AddModelError("zone_id", " * Erreur Zone");
				$planing->setempl_id($_POST["empl_id"]);
				$planing->AddModelError("empl_id", " * Erreur Delegué");
				$planing->setobservation($_POST["observation"]);
				$planing->AddModelError("observation", " * Erreur Observation");
				$planing->setetat($_POST["etat"]);
				$planing->AddModelError("etat", " * Erreur Etat");
				if($planing->IsValid()){
					$planing->update($id);
					$this->RederictAction("Planing");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$planing = new PlaningModel();
			$this->viewData["planing"] = $planing->findplaning($id);
			//$lab = new LabModel();
			//$this->viewData["listLab"] = $lab->listLab();
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_POST["id"])){
				$planing->delete($id);
				$this->RederictAction("Planing");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>