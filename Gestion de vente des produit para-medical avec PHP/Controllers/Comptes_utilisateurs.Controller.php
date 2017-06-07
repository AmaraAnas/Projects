<?php 

	require_once('Controller.Controller.php');
	class Comptes_utilisateursController extends Controller{
		public function index(){
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["listComptes_utilisateurs"] = $comptes_utilisateurs->listComptes_utilisateurs();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["comptes_utilisateurs"] = $comptes_utilisateurs;
			
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["listComptes_utilisateurs"] = $comptes_utilisateurs->listComptes_utilisateurs();
			
			if(!isset($_POST["Nom_Propre"]) )
				$this->View(__FUNCTION__);
			else{
				$comptes_utilisateurs->setNom_Propre($_POST["Nom_Propre"]);
				$comptes_utilisateurs->AddModelError("Nom_Propre", " * Erreur Nom");
				$comptes_utilisateurs->setPrenom($_POST["Prenom"]);
				$comptes_utilisateurs->AddModelError("Prenom", " * Erreur Prénom");
				$comptes_utilisateurs->setNom_Utilisateur($_POST["Nom_Utilisateur"]);
				$comptes_utilisateurs->AddModelError("Nom_Utilisateur", " * Erreur User name");
				$comptes_utilisateurs->setMot_De_Passe($_POST["Mot_De_Passe"]);
				$comptes_utilisateurs->AddModelError("Mot_De_Passe", " * Erreur Password");
				$comptes_utilisateurs->setAdresse_Email($_POST["Adresse_Email"]);
				$comptes_utilisateurs->AddModelError("Adresse_Email", " * Erreur Email");
				$comptes_utilisateurs->setDate_Inscription($_POST["Date_Inscription"]);
				$comptes_utilisateurs->AddModelError("Date_Inscription", " * Erreur Date de recrutement");
				$comptes_utilisateurs->setCompte_Active($_POST["Compte_Active"]);
				$comptes_utilisateurs->AddModelError("Compte_Active", " * Erreur Activer");
				$comptes_utilisateurs->setphone($_POST["phone"]);
				$comptes_utilisateurs->AddModelError("phone", " * Erreur ");
				$comptes_utilisateurs->setmobile($_POST["mobile"]);
				$comptes_utilisateurs->AddModelError("mobile", " * Erreur ");
				$comptes_utilisateurs->setaddress($_POST["address"]);
				$comptes_utilisateurs->AddModelError("address", " * Erreur ");
				$comptes_utilisateurs->setcity($_POST["city"]);
				$comptes_utilisateurs->AddModelError("city", " * Erreur ");
				$comptes_utilisateurs->setzip($_POST["zip"]);
				$comptes_utilisateurs->AddModelError("zip", " * Erreur ");
				$comptes_utilisateurs->setdate_emb($_POST["date_emb"]);
				$comptes_utilisateurs->AddModelError("date_emb", " * Erreur ");
				$comptes_utilisateurs->setparend_id($_POST["parend_id"]);
				$comptes_utilisateurs->AddModelError("parend_id", " * Erreur ");
				$comptes_utilisateurs->settype($_POST["type"]);
				$comptes_utilisateurs->AddModelError("type", " * Erreur ");
				
				if($comptes_utilisateurs->IsValid()){
					$comptes_utilisateurs->add();
					$this->RederictAction("Comptes_utilisateurs");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["comptes_utilisateurs"] = $comptes_utilisateurs->findcomptes_utilisateurs($id);
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["listComptes_utilisateurs"] = $comptes_utilisateurs->listComptes_utilisateurs();

			if(!isset($_POST["ID_Utilisateur"]))
				$this->View(__FUNCTION__);
			else{
				$comptes_utilisateurs->setNom_Propre($_POST["Nom_Propre"]);
				$comptes_utilisateurs->AddModelError("Nom_Propre", " * Erreur Nom");
				$comptes_utilisateurs->setPrenom($_POST["Prenom"]);
				$comptes_utilisateurs->AddModelError("Prenom", " * Erreur Prénom");
				$comptes_utilisateurs->setNom_Utilisateur($_POST["Nom_Utilisateur"]);
				$comptes_utilisateurs->AddModelError("Nom_Utilisateur", " * Erreur User name");
				$comptes_utilisateurs->setMot_De_Passe($_POST["Mot_De_Passe"]);
				$comptes_utilisateurs->AddModelError("Mot_De_Passe", " * Erreur Password");
				$comptes_utilisateurs->setAdresse_Email($_POST["Adresse_Email"]);
				$comptes_utilisateurs->AddModelError("Adresse_Email", " * Erreur Email");
				$comptes_utilisateurs->setDate_Inscription($_POST["Date_Inscription"]);
				$comptes_utilisateurs->AddModelError("Date_Inscription", " * Erreur Date de recrutement");
				$comptes_utilisateurs->setCompte_Active($_POST["Compte_Active"]);
				$comptes_utilisateurs->AddModelError("Compte_Active", " * Erreur Activer");
				$comptes_utilisateurs->setphone($_POST["phone"]);
				$comptes_utilisateurs->AddModelError("phone", " * Erreur ");
				$comptes_utilisateurs->setmobile($_POST["mobile"]);
				$comptes_utilisateurs->AddModelError("mobile", " * Erreur ");
				$comptes_utilisateurs->setaddress($_POST["address"]);
				$comptes_utilisateurs->AddModelError("address", " * Erreur ");
				$comptes_utilisateurs->setcity($_POST["city"]);
				$comptes_utilisateurs->AddModelError("city", " * Erreur ");
				$comptes_utilisateurs->setzip($_POST["zip"]);
				$comptes_utilisateurs->AddModelError("zip", " * Erreur ");
				$comptes_utilisateurs->setdate_emb($_POST["date_emb"]);
				$comptes_utilisateurs->AddModelError("date_emb", " * Erreur ");
				$comptes_utilisateurs->setparend_id($_POST["parend_id"]);
				$comptes_utilisateurs->AddModelError("parend_id", " * Erreur ");
				$comptes_utilisateurs->settype($_POST["type"]);
				$comptes_utilisateurs->AddModelError("type", " * Erreur ");
				
				if($comptes_utilisateurs->IsValid()){
					$comptes_utilisateurs->update($id);
					$this->RederictAction("Comptes_utilisateurs");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["comptes_utilisateurs"] = $comptes_utilisateurs->findcomptes_utilisateurs($id);
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["comptes_utilisateurs"] = $comptes_utilisateurs->findcomptes_utilisateurs($id);
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
			$comptes_utilisateurs = new Comptes_utilisateursModel();
			$this->viewData["listComptes_utilisateurs"] = $comptes_utilisateurs->listComptes_utilisateurs(); 
			
			if(isset($_POST["id"])){
				$comptes_utilisateurs->delete($id);
				$this->RederictAction("Comptes_utilisateurs");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>