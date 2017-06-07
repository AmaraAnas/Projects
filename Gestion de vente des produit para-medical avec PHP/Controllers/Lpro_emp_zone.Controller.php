<?php 
	require_once('Controller.Controller.php');
	class Lpro_emp_zoneController extends Controller{
		public function index(){
			$li_pro_emp_zone = new Lpro_emp_zoneModel();
			$this->viewData["listLpro_emp_zone"] = $li_pro_emp_zone->listLpro_emp_zone();
			$this->View(__FUNCTION__);
			}
		public function ajouter(){
			$li_pro_emp_zone = new Lpro_emp_zoneModel();
			$this->viewData["Lpro_emp_zone"] = $li_pro_emp_zone;
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone(); 
		if(!isset($_POST["zone_id"])) $this->View(__FUNCTION__); else{
			$li_pro_emp_zone->setzone_id($_POST["zone_id"]);
			$li_pro_emp_zone->AddModelError("zone_id", " * Erreur zone_id");
			$li_pro_emp_zone->setempl_id($_POST["empl_id"]);
			$li_pro_emp_zone->AddModelError("empl_id", " * Erreur empl_id");
			$li_pro_emp_zone->setpro_id($_POST["pro_id"]);
			$li_pro_emp_zone->AddModelError("pro_id", " * Erreur pro_id");
			$li_pro_emp_zone->addLpro_emp_zone();
			$this->RederictAction("Lpro_emp_zone");}
 }
		public function modifier($id){
			$li_pro_emp_zone = new Lpro_emp_zoneModel();
			$this->viewData["Lpro_emp_zone"] = $li_pro_emp_zone->findLpro_emp_zone($id);
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(!isset($_POST["zone_id"])) $this->View(__FUNCTION__); else{
			$li_pro_emp_zone->setzone_id($_POST["zone_id"]);
			$li_pro_emp_zone->setempl_id($_POST["empl_id"]);
			$li_pro_emp_zone->setpro_id($_POST["pro_id"]);
			$li_pro_emp_zone->updateLpro_emp_zone($id);
			$this->RederictAction("Lpro_emp_zone");
		}}

		public function supprimer($id){
			$li_pro_emp_zone = new Lpro_emp_zoneModel();
			$this->viewData["Lpro_emp_zone"] = $li_pro_emp_zone->findLpro_emp_zone($id);
			$employer = new EmployerModel();
			$this->viewData["listEmployer"] = $employer->listEmployer();
			$produits = new ProduitsModel();
			$this->viewData["listProduits"] = $produits->listProduits();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(isset($_POST["li_id"])){
				$li_pro_emp_zone->deleteLpro_emp_zone($id);
				$this->RederictAction("li_pro_emp_zone");
			}
			$this->View(__FUNCTION__);
		}
	}
 ?>