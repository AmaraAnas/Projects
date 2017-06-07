<?php 

	require_once('Controller.Controller.php');
	class FonctionController extends Controller{
		public function index(){
			$fonction = new FonctionModel();
			$this->viewData["listFonction"] = $fonction->listFonction();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$fonction = new FonctionModel();
			$this->viewData["fonction"] = $fonction;
			if(!isset($_POST["fonc_name"]))
				$this->View(__FUNCTION__);
			else{
				$fonction->setfonc_name($_POST["fonc_name"]);
				$fonction->AddModelError("fonc_name", " * Erreur Libele");
				if($fonction->IsValid()){
					$fonction->add();
					$this->RederictAction("Fonction");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$fonction = new FonctionModel();
			$this->viewData["fonction"] = $fonction->findfonction($id);
			if(!isset($_POST["fonc_name"]))
				$this->View(__FUNCTION__);
			else{
				$fonction->setfonc_name($_POST["fonc_name"]);
				$fonction->AddModelError("fonc_name", " * Erreur Libele");
				if($fonction->IsValid()){
					$fonction->update($id);
					$this->RederictAction("Fonction");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$fonction = new FonctionModel();
			$this->viewData["fonction"] = $fonction->findfonction($id);
			if(isset($_GET["id"])){
				$fonction->delete($id);
				$this->RederictAction("Fonction");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>