<?php 
	require_once('Controller.Controller.php');
	class MedecinsController extends Controller{
		public function index(){
			$med = new MedecinsModel();
			$this->viewData["listMedecins"] = $med->listMedecins();
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			$specialite = new SpecialiteModel();
			$this->viewData["listSpecialite"] = $specialite->listSpecialite(); 
			$this->View(__FUNCTION__);
			}
		public function ajouter(){
			$med = new MedecinsModel();
			$this->viewData["Medecins"] = $med;
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			$specialite = new SpecialiteModel();
			$this->viewData["listSpecialite"] = $specialite->listSpecialite(); 
		if(!isset($_POST["med_first_name"])) $this->View(__FUNCTION__); else{
			$med->setmed_first_name($_POST["med_first_name"]);
			$med->AddModelError("med_first_name", " * Erreur med_first_name");
			$med->setmed_last_name($_POST["med_last_name"]);
			$med->AddModelError("med_last_name", " * Erreur med_last_name");
			$med->setmed_email($_POST["med_email"]);
			$med->AddModelError("med_email", " * Erreur med_email");
			$med->setmed_mobile1($_POST["med_mobile1"]);
			$med->AddModelError("med_mobile1", " * Erreur med_mobile1");
			$med->setmed_mobile2($_POST["med_mobile2"]);
			$med->AddModelError("med_mobile2", " * Erreur med_mobile2");
			$med->setfonc_id($_POST["fonc_id"]);
			$med->AddModelError("fonc_id", " * Erreur fonc_id");
			$med->setspe_id($_POST["spe_id"]);
			$med->AddModelError("spe_id", " * Erreur spe_id");
			$med->addMedecins();
			$this->RederictAction("Medecins");}
 }
		public function modifier($id){
			$med = new MedecinsModel();
			$this->viewData["Medecins"] = $med->findMedecins($id);
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			$specialite = new SpecialiteModel();
			$this->viewData["listSpecialite"] = $specialite->listSpecialite();
			if(!isset($_POST["med_first_name"])) $this->View(__FUNCTION__); else{
			$med->setmed_first_name($_POST["med_first_name"]);
			$med->setmed_last_name($_POST["med_last_name"]);
			$med->setmed_email($_POST["med_email"]);
			$med->setmed_mobile1($_POST["med_mobile1"]);
			$med->setmed_mobile2($_POST["med_mobile2"]);
			$med->setfonc_id($_POST["fonc_id"]);
			$med->setspe_id($_POST["spe_id"]);
			$med->updateMedecins($id);
			$this->RederictAction("Medecins");
		}}

		public function supprimer($id){
			$med = new MedecinsModel();
			$this->viewData["Medecins"] = $med->findMedecins($id);
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			$specialite = new SpecialiteModel();
			$this->viewData["listSpecialite"] = $specialite->listSpecialite();
			if(isset($_POST["med_id"])){
				$med->deleteMedecins($id);
				$this->RederictAction("Medecins");
			}
			$this->View(__FUNCTION__);
		}
	}
 ?>