<?php 

	require_once('Controller.Controller.php');
	class ProduitsController extends Controller{
		public function index(){
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$produits = new ProduitsModel();
			$this->viewData["produits"] = $produits;
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["pro_name"]))
				$this->View(__FUNCTION__);
			else{
				$produits->setpro_name($_POST["pro_name"]);
				$produits->AddModelError("pro_name", " * Erreur Libele");
				$produits->setpro_ref($_POST["pro_ref"]);
				$produits->AddModelError("pro_ref", " * Erreur Ref");
				$produits->setpro_obs($_POST["pro_obs"]);
				$produits->AddModelError("pro_obs", " * Erreur Observation");
				if($produits->IsValid()){
					$produits->add();
					$this->RederictAction("Produits");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$produits = new ProduitsModel();
			$this->viewData["produits"] = $produits->findproduits($id);
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["pro_name"]))
				$this->View(__FUNCTION__);
			else{
				$produits->setpro_name($_POST["pro_name"]);
				$produits->AddModelError("pro_name", " * Erreur Libele");
				$produits->setpro_ref($_POST["pro_ref"]);
				$produits->AddModelError("pro_ref", " * Erreur Ref");
				$produits->setpro_obs($_POST["pro_obs"]);
				$produits->AddModelError("pro_obs", " * Erreur Observation");
				if($produits->IsValid()){
					$produits->update($id);
					$this->RederictAction("Produits");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$produits = new ProduitsModel();
			$this->viewData["produits"] = $produits->findproduits($id);
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_POST["pro_id"])){
				$produits->delete($id);
				$this->RederictAction("Produits");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>