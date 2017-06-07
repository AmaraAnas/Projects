<?php 

	require_once('Controller.Controller.php');
	class SpecialiteController extends Controller{
		public function index(){
			$specialite = new SpecialiteModel();
			$this->viewData["listSpecialite"] = $specialite->listSpecialite();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$specialite = new SpecialiteModel();
			$this->viewData["specialite"] = $specialite;
			if(!isset($_POST["spe_name"]))
				$this->View(__FUNCTION__);
			else{
				$specialite->setspe_name($_POST["spe_name"]);
				$specialite->AddModelError("spe_name", " * Erreur Libele");
				if($specialite->IsValid()){
					$specialite->add();
					$this->RederictAction("Specialite");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$specialite = new SpecialiteModel();
			$this->viewData["specialite"] = $specialite->findspecialite($id);
			if(!isset($_POST["spe_name"]))
				$this->View(__FUNCTION__);
			else{
				$specialite->setspe_name($_POST["spe_name"]);
				$specialite->AddModelError("spe_name", " * Erreur Libele");
				if($specialite->IsValid()){
					$specialite->update($id);
					$this->RederictAction("Specialite");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$specialite = new SpecialiteModel();
			$this->viewData["specialite"] = $specialite->findspecialite($id);
			if(isset($_GET["id"])){
				$specialite->delete($id);
				$this->RederictAction("Specialite");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>