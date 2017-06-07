<?php 

	require_once('Controller.Controller.php');
	class Li_pro_emp_zoneController extends Controller{
		public function index(){
			$li_pro_emp_zone = new Li_pro_emp_zoneModel();
			$this->viewData["listLi_pro_emp_zone"] = $li_pro_emp_zone->listLi_pro_emp_zone();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$li_pro_emp_zone = new Li_pro_emp_zoneModel();
			$this->viewData["li_pro_emp_zone"] = $li_pro_emp_zone;
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			if(!isset($_POST["zone_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_pro_emp_zone->setzone_id($_POST["zone_id"]);
				$li_pro_emp_zone->AddModelError("zone_id", " * Erreur Zone");
				$li_pro_emp_zone->setempl_id($_POST["empl_id"]);
				$li_pro_emp_zone->AddModelError("empl_id", " * Erreur Delegue");
				$li_pro_emp_zone->setpro_id($_POST["pro_id"]);
				$li_pro_emp_zone->AddModelError("pro_id", " * Erreur Produit");
				if($li_pro_emp_zone->IsValid()){
					$li_pro_emp_zone->add();
					$this->RederictAction("Li_pro_emp_zone");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$li_pro_emp_zone = new Li_pro_emp_zoneModel();
			$this->viewData["li_pro_emp_zone"] = $li_pro_emp_zone->findli_pro_emp_zone($id);
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			if(!isset($_POST["zone_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_pro_emp_zone->setzone_id($_POST["zone_id"]);
				$li_pro_emp_zone->AddModelError("zone_id", " * Erreur Zone");
				$li_pro_emp_zone->setempl_id($_POST["empl_id"]);
				$li_pro_emp_zone->AddModelError("empl_id", " * Erreur Delegue");
				$li_pro_emp_zone->setpro_id($_POST["pro_id"]);
				$li_pro_emp_zone->AddModelError("pro_id", " * Erreur Produit");
				if($li_pro_emp_zone->IsValid()){
					$li_pro_emp_zone->update($id);
					$this->RederictAction("Li_pro_emp_zone");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$li_pro_emp_zone = new Li_pro_emp_zoneModel();
			$this->viewData["li_pro_emp_zone"] = $li_pro_emp_zone->findli_pro_emp_zone($id);
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			if(isset($_GET["id"])){
				$li_pro_emp_zone->delete($id);
				$this->RederictAction("Li_pro_emp_zone");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>