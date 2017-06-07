<?php 

	require_once('Controller.Controller.php');
	class CategorieController extends Controller{
		public function index(){
			$categorie = new CategorieModel();
			$this->viewData["listCategorie"] = $categorie->listCategorie();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$categorie = new CategorieModel();
			$this->viewData["categorie"] = $categorie;
			if(!isset($_POST["cat_name"]))
				$this->View(__FUNCTION__);
			else{
				$categorie->setcat_name($_POST["cat_name"]);
				$categorie->AddModelError("cat_name", " * Erreur Libele");
				$categorie->setetat($_POST["etat"]);
				$categorie->AddModelError("etat", " * Erreur Etat");
				if($categorie->IsValid()){
					$categorie->add();
					$this->RederictAction("Categorie");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$categorie = new CategorieModel();
			$this->viewData["categorie"] = $categorie->findcategorie($id);
			if(!isset($_POST["cat_name"]))
				$this->View(__FUNCTION__);
			else{
				$categorie->setcat_name($_POST["cat_name"]);
				$categorie->AddModelError("cat_name", " * Erreur Libele");
				$categorie->setetat($_POST["etat"]);
				$categorie->AddModelError("etat", " * Erreur Etat");
				if($categorie->IsValid()){
					$categorie->update($id);
					$this->RederictAction("Categorie");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$categorie = new CategorieModel();
			$this->viewData["categorie"] = $categorie->findcategorie($id);
			if(isset($_GET["id"])){
				$categorie->delete($id);
				$this->RederictAction("Categorie");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>