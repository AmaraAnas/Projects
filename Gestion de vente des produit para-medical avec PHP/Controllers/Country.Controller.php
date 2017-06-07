<?php 

	require_once('Controller.Controller.php');
	class CountryController extends Controller{
		public function index(){
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$country = new CountryModel();
			$this->viewData["country"] = $country;
			if(!isset($_POST["count_name"]))
				$this->View(__FUNCTION__);
			else{
				$country->setcount_name($_POST["count_name"]);
				$country->AddModelError("count_name", " * Erreur Libele");
				if($country->IsValid()){
					$country->add();
					$this->RederictAction("Country");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$country = new CountryModel();
			$this->viewData["country"] = $country->findcountry($id);
			if(!isset($_POST["count_name"]))
				$this->View(__FUNCTION__);
			else{
				$country->setcount_name($_POST["count_name"]);
				$country->AddModelError("count_name", " * Erreur Libele");
				if($country->IsValid()){
					$country->update($id);
					$this->RederictAction("Country");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$country = new CountryModel();
			$this->viewData["country"] = $country->findcountry($id);
			if(isset($_GET["id"])){
				$country->delete($id);
				$this->RederictAction("Country");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>