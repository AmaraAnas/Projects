<?php 

	require_once('Controller.Controller.php');
	class LabController extends Controller{
		public function index(){
			$lab = new LabModel();
			$this->viewData["listLab"] = $lab->listLab();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$lab = new LabModel();
			$this->viewData["lab"] = $lab;
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["lab_name"]))
				$this->View(__FUNCTION__);
			else{
				$lab->setlab_name($_POST["lab_name"]);
				$lab->AddModelError("lab_name", " * Erreur Libele");
				$lab->setlab_first_name($_POST["lab_first_name"]);
				$lab->AddModelError("lab_first_name", " * Erreur Nom");
				$lab->setlab_last_name($_POST["lab_last_name"]);
				$lab->AddModelError("lab_last_name", " * Erreur Prénom");
				$lab->setlab_email($_POST["lab_email"]);
				$lab->AddModelError("lab_email", " * Erreur Email");
				$lab->setlab_phone($_POST["lab_phone"]);
				$lab->AddModelError("lab_phone", " * Erreur Tel");
				$lab->setlab_fax($_POST["lab_fax"]);
				$lab->AddModelError("lab_fax", " * Erreur Fax");
				$lab->setlab_mobile($_POST["lab_mobile"]);
				$lab->AddModelError("lab_mobile", " * Erreur GSM");
				$lab->setlab_address1($_POST["lab_address1"]);
				$lab->AddModelError("lab_address1", " * Erreur Adresse");
				$lab->setlab_zip($_POST["lab_zip"]);
				$lab->AddModelError("lab_zip", " * Erreur Code postale");
				$lab->setmun_id($_POST["mun_id"]);
				$lab->AddModelError("mun_id", " * Erreur Municipalie");
				$lab->setlogo($_POST["logo"]);
				$lab->AddModelError("logo", " * Erreur Logo");
				if($lab->IsValid()){
					$lab->add();
					$this->RederictAction("Lab");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$lab = new LabModel();
			$this->viewData["lab"] = $lab->findlab($id);
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(!isset($_POST["lab_name"]))
				$this->View(__FUNCTION__);
			else{
				$lab->setlab_name($_POST["lab_name"]);
				$lab->AddModelError("lab_name", " * Erreur Libele");
				$lab->setlab_first_name($_POST["lab_first_name"]);
				$lab->AddModelError("lab_first_name", " * Erreur Nom");
				$lab->setlab_last_name($_POST["lab_last_name"]);
				$lab->AddModelError("lab_last_name", " * Erreur Prénom");
				$lab->setlab_email($_POST["lab_email"]);
				$lab->AddModelError("lab_email", " * Erreur Email");
				$lab->setlab_phone($_POST["lab_phone"]);
				$lab->AddModelError("lab_phone", " * Erreur Tel");
				$lab->setlab_fax($_POST["lab_fax"]);
				$lab->AddModelError("lab_fax", " * Erreur Fax");
				$lab->setlab_mobile($_POST["lab_mobile"]);
				$lab->AddModelError("lab_mobile", " * Erreur GSM");
				$lab->setlab_address1($_POST["lab_address1"]);
				$lab->AddModelError("lab_address1", " * Erreur Adresse");
				$lab->setlab_zip($_POST["lab_zip"]);
				$lab->AddModelError("lab_zip", " * Erreur Code postale");
				$lab->setmun_id($_POST["mun_id"]);
				$lab->AddModelError("mun_id", " * Erreur Municipalie");
				$lab->setlogo($_POST["logo"]);
				$lab->AddModelError("logo", " * Erreur Logo");
				if($lab->IsValid()){
					$lab->update($id);
					$this->RederictAction("Lab");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$lab = new LabModel();
			$this->viewData["lab"] = $lab->findlab($id);
			$municipalite = new MunicipaliteModel();
			$this->viewData["listMunicipalite"] = $municipalite->listMunicipalite();
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			if(isset($_GET["id"])){
				$lab->delete($id);
				$this->RederictAction("Lab");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>