<?php 

	require_once('Controller.Controller.php');
	class EmployerController extends Controller{
		public function index(){
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$employer = new EmployerModel();
			$this->viewData["employer"] = $employer;
			if(!isset($_POST["empl_phone"]))
				$this->View(__FUNCTION__);
			else{
				$employer->setempl_phone($_POST["empl_phone"]);
				$employer->AddModelError("empl_phone", " * Erreur Tel");
				$employer->setempl_mobile($_POST["empl_mobile"]);
				$employer->AddModelError("empl_mobile", " * Erreur GSM");
				$employer->setempl_address1($_POST["empl_address1"]);
				$employer->AddModelError("empl_address1", " * Erreur Adresse");
				$employer->setempl_city($_POST["empl_city"]);
				$employer->AddModelError("empl_city", " * Erreur City");
				$employer->setempl_zip($_POST["empl_zip"]);
				$employer->AddModelError("empl_zip", " * Erreur Code postale");
				$employer->setempl_date_emb($_POST["empl_date_emb"]);
				$employer->AddModelError("empl_date_emb", " * Erreur Date de recrutement");
				$employer->setempl_id_parent($_POST["empl_id_parent"]);
				$employer->AddModelError("empl_id_parent", " * Erreur Parend");
				$employer->setlab_id($_POST["lab_id"]);
				$employer->AddModelError("lab_id", " * Erreur Labo");
				$employer->setID_Utilisateur($_POST["ID_Utilisateur"]);
				$employer->AddModelError("ID_Utilisateur", " * Erreur Utilisateur");
				if($employer->IsValid()){
					$employer->add();
					$this->RederictAction("Employer");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$employer = new EmployerModel();
			$this->viewData["employer"] = $employer->findemployer($id);
			if(!isset($_POST["empl_phone"]))
				$this->View(__FUNCTION__);
			else{
				$employer->setempl_phone($_POST["empl_phone"]);
				$employer->AddModelError("empl_phone", " * Erreur Tel");
				$employer->setempl_mobile($_POST["empl_mobile"]);
				$employer->AddModelError("empl_mobile", " * Erreur GSM");
				$employer->setempl_address1($_POST["empl_address1"]);
				$employer->AddModelError("empl_address1", " * Erreur Adresse");
				$employer->setempl_city($_POST["empl_city"]);
				$employer->AddModelError("empl_city", " * Erreur City");
				$employer->setempl_zip($_POST["empl_zip"]);
				$employer->AddModelError("empl_zip", " * Erreur Code postale");
				$employer->setempl_date_emb($_POST["empl_date_emb"]);
				$employer->AddModelError("empl_date_emb", " * Erreur Date de recrutement");
				$employer->setempl_id_parent($_POST["empl_id_parent"]);
				$employer->AddModelError("empl_id_parent", " * Erreur Parend");
				$employer->setlab_id($_POST["lab_id"]);
				$employer->AddModelError("lab_id", " * Erreur Labo");
				$employer->setID_Utilisateur($_POST["ID_Utilisateur"]);
				$employer->AddModelError("ID_Utilisateur", " * Erreur Utilisateur");
				if($employer->IsValid()){
					$employer->update($id);
					$this->RederictAction("Employer");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$employer = new EmployerModel();
			$this->viewData["employer"] = $employer->findemployer($id);
			if(isset($_GET["id"])){
				$employer->delete($id);
				$this->RederictAction("Employer");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>