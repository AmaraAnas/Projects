<?php 

	require_once('Controller.Controller.php');
	class MunicipaliteController extends Controller{
		public function index(){
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$municipalite = new MunicipaliteModel();
			$this->viewData["municipalite"] = $municipalite;
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["mun_name"]))
				$this->View(__FUNCTION__);
			else{
				$municipalite->setmun_name($_POST["mun_name"]);
				$municipalite->AddModelError("mun_name", " * Erreur Libele");
				$municipalite->setgov_id($_POST["gov_id"]);
				$municipalite->AddModelError("gov_id", " * Erreur Gouvernorat");
				if($municipalite->IsValid()){
					$municipalite->add();
					$this->RederictAction("Municipalite");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$municipalite = new MunicipaliteModel();
			$this->viewData["municipalite"] = $municipalite->findmunicipalite($id);
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["mun_name"]))
				$this->View(__FUNCTION__);
			else{
				$municipalite->setmun_name($_POST["mun_name"]);
				$municipalite->AddModelError("mun_name", " * Erreur Libele");
				$municipalite->setgov_id($_POST["gov_id"]);
				$municipalite->AddModelError("gov_id", " * Erreur Gouvernorat");
				if($municipalite->IsValid()){
					$municipalite->update($id);
					$this->RederictAction("Municipalite");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$municipalite = new MunicipaliteModel();
			$this->viewData["municipalite"] = $municipalite->findmunicipalite($id);
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_GET["id"])){
				$municipalite->delete($id);
				$this->RederictAction("Municipalite");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>