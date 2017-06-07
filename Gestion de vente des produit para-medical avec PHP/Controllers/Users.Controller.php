<?php 
	require_once('Controller.Controller.php');
	class UsersController extends Controller{
		public function index(){
			$users = new UsersModel();
			$this->viewData["listUsers"] = $users->listUsers();
			$this->View(__FUNCTION__);
			}
		public function ajouter(){
			$users = new UsersModel();
			$this->viewData["Users"] = $users;
			$categorie = new CategorieModel();
			$this->viewData["listCategorie"] = $categorie->listCategorie();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer(); 
		if(!isset($_POST["empl_id"])) $this->View(__FUNCTION__); else{
			$users->setempl_id($_POST["empl_id"]);
			$users->AddModelError("empl_id", " * Erreur empl_id");
			$users->setcat_id($_POST["cat_id"]);
			$users->AddModelError("cat_id", " * Erreur cat_id");
			$users->setuser_username($_POST["user_username"]);
			$users->AddModelError("user_username", " * Erreur user_username");
			$users->setuser_password($_POST["user_password"]);
			$users->AddModelError("user_password", " * Erreur user_password");
			$users->addUsers();
			$this->RederictAction("Users");}
 }
		public function modifier($id){
			$users = new UsersModel();
			$this->viewData["Users"] = $users->findUsers($id);
			$categorie = new CategorieModel();
			$this->viewData["listCategorie"] = $categorie->listCategorie();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			if(!isset($_POST["empl_id"])) $this->View(__FUNCTION__); else{
			$users->setempl_id($_POST["empl_id"]);
			$users->setcat_id($_POST["cat_id"]);
			$users->setuser_username($_POST["user_username"]);
			$users->setuser_password($_POST["user_password"]);
			$users->updateUsers($id);
			$this->RederictAction("Users");
		}}

		public function supprimer($id){
			$users = new UsersModel();
			$this->viewData["Users"] = $users->findUsers($id);
			$categorie = new CategorieModel();
			$this->viewData["listCategorie"] = $categorie->listCategorie();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			if(isset($_POST["user_id"])){
				$users->deleteUsers($id);
				$this->RederictAction("users");
			}
			$this->View(__FUNCTION__);
		}
	}
 ?>