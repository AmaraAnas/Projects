<?php 

	require_once('Controller.Controller.php');
	class MedController extends Controller{
		public function index(){
			$med = new MedModel();
			$this->viewData["listMed"] = $med->listMed();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$med = new MedModel();
			$this->viewData["med"] = $med;
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			if(!isset($_POST["med_first_name"]))
				$this->View(__FUNCTION__);
			else{
				$med->setmed_first_name($_POST["med_first_name"]);
				$med->AddModelError("med_first_name", " * Erreur Nom");
				$med->setmed_last_name($_POST["med_last_name"]);
				$med->AddModelError("med_last_name", " * Erreur Prénom");
				$med->setmed_email($_POST["med_email"]);
				$med->AddModelError("med_email", " * Erreur Email");
				$med->setmed_mobile1($_POST["med_mobile1"]);
				$med->AddModelError("med_mobile1", " * Erreur GSM 1");
				$med->setmed_mobile2($_POST["med_mobile2"]);
				$med->AddModelError("med_mobile2", " * Erreur GSM 2");
				$med->setfonc_id($_POST["fonc_id"]);
				$med->AddModelError("fonc_id", " * Erreur Fonction");
				$med->setspe_id($_POST["spe_id"]);
				$med->AddModelError("spe_id", " * Erreur Spécialité");
				if($med->IsValid()){
					$med->add();
					$this->RederictAction("Med");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$med = new MedModel();
			$this->viewData["med"] = $med->findmed($id);
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			if(!isset($_POST["med_first_name"]))
				$this->View(__FUNCTION__);
			else{
				$med->setmed_first_name($_POST["med_first_name"]);
				$med->AddModelError("med_first_name", " * Erreur Nom");
				$med->setmed_last_name($_POST["med_last_name"]);
				$med->AddModelError("med_last_name", " * Erreur Prénom");
				$med->setmed_email($_POST["med_email"]);
				$med->AddModelError("med_email", " * Erreur Email");
				$med->setmed_mobile1($_POST["med_mobile1"]);
				$med->AddModelError("med_mobile1", " * Erreur GSM 1");
				$med->setmed_mobile2($_POST["med_mobile2"]);
				$med->AddModelError("med_mobile2", " * Erreur GSM 2");
				$med->setfonc_id($_POST["fonc_id"]);
				$med->AddModelError("fonc_id", " * Erreur Fonction");
				$med->setspe_id($_POST["spe_id"]);
				$med->AddModelError("spe_id", " * Erreur Spécialité");
				if($med->IsValid()){
					$med->update($id);
					$this->RederictAction("Med");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$med = new MedModel();
			$this->viewData["med"] = $med->findmed($id);
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			if(isset($_GET["id"])){
				$med->delete($id);
				$this->RederictAction("Med");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>