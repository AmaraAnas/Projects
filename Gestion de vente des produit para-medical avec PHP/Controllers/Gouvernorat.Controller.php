<?php 

	require_once('Controller.Controller.php');
	class GouvernoratController extends Controller{
		public function index(){
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$gouvernorat = new GouvernoratModel();
			$this->viewData["gouvernorat"] = $gouvernorat;
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["gov_name"]))
				$this->View(__FUNCTION__);
			else{
				$gouvernorat->setgov_name($_POST["gov_name"]);
				$gouvernorat->AddModelError("gov_name", " * Erreur Libele");
				$gouvernorat->setcount_id($_POST["count_id"]);
				$gouvernorat->AddModelError("count_id", " * Erreur Gouvernorat");
				if($gouvernorat->IsValid()){
					$gouvernorat->add();
					$this->RederictAction("Gouvernorat");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$gouvernorat = new GouvernoratModel();
			$this->viewData["gouvernorat"] = $gouvernorat->findgouvernorat($id);
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["gov_name"]))
				$this->View(__FUNCTION__);
			else{
				$gouvernorat->setgov_name($_POST["gov_name"]);
				$gouvernorat->AddModelError("gov_name", " * Erreur Libele");
				$gouvernorat->setcount_id($_POST["count_id"]);
				$gouvernorat->AddModelError("count_id", " * Erreur Gouvernorat");
				if($gouvernorat->IsValid()){
					$gouvernorat->update($id);
					$this->RederictAction("Gouvernorat");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$gouvernorat = new GouvernoratModel();
			$this->viewData["gouvernorat"] = $gouvernorat->findgouvernorat($id);
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_GET["id"])){
				$gouvernorat->delete($id);
				$this->RederictAction("Gouvernorat");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>