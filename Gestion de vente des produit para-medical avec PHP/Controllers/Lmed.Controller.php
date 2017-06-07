<?php 
	require_once('Controller.Controller.php');
	class LmedController extends Controller{
		public function index(){
			$li_med = new LmedModel();
			$this->viewData["listLmed"] = $li_med->listLmed();
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			$zone = new ZoneModel();
			$med = new MedecinsModel();
			$this->viewData["listMedecins"] = $med->listMedecins();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$this->View(__FUNCTION__);
			}
		public function ajouter(){
			$li_med = new LmedModel();
			$this->viewData["Lmed"] = $li_med;
			$med = new MedecinsModel();
			$this->viewData["listMedecins"] = $med->listMedecins();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone(); 
			$gouvernorat = new GouvernoratModel();
			$this->viewData["listGouvernorat"] = $gouvernorat->listGouvernorat();
		if(!isset($_POST["zone_id"])) $this->View(__FUNCTION__); else{
			$li_med->setzone_id($_POST["zone_id"]);
			$li_med->AddModelError("zone_id", " * Erreur zone_id");
			$li_med->setmed_id($_POST["med_id"]);
			$li_med->AddModelError("med_id", " * Erreur med_id");
			$li_med->setcount_id($_POST["count_id"]);
			$li_med->AddModelError("count_id", " * Erreur count_id");
			$li_med->setmed_phone($_POST["med_phone"]);
			$li_med->AddModelError("med_phone", " * Erreur med_phone");
			$li_med->setmed_address($_POST["med_address"]);
			$li_med->AddModelError("med_address", " * Erreur med_address");
			$li_med->setmed_city($_POST["med_city"]);
			$li_med->AddModelError("med_city", " * Erreur med_city");
			$li_med->setmed_zip($_POST["med_zip"]);
			$li_med->AddModelError("med_zip", " * Erreur med_zip");
			$li_med->addLmed();
			$this->RederictAction("Lmed");}
 }
		public function modifier($id){
			$li_med = new LmedModel();
			$this->viewData["Lmed"] = $li_med->findLmed($id);
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			$med = new MedecinsModel();
			$this->viewData["listMedecins"] = $med->listMedecins();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(!isset($_POST["zone_id"])) $this->View(__FUNCTION__); else{
			$li_med->setzone_id($_POST["zone_id"]);
			$li_med->setmed_id($_POST["med_id"]);
			$li_med->setcount_id($_POST["count_id"]);
			$li_med->setmed_phone($_POST["med_phone"]);
			$li_med->setmed_address($_POST["med_address"]);
			$li_med->setmed_city($_POST["med_city"]);
			$li_med->setmed_zip($_POST["med_zip"]);
			$li_med->updateLmed($id);
			$this->RederictAction("Lmed");
		}}

		public function supprimer($id){
			$li_med = new LmedModel();
			$this->viewData["Lmed"] = $li_med->findLmed($id);
			$country = new CountryModel();
			$this->viewData["listCountry"] = $country->listCountry();
			$med = new MedecinsModel();
			$this->viewData["listMedecins"] = $med->listMedecins();
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(isset($_POST["li_id"])){
				$li_med->deleteLmed($id);
				$this->RederictAction("Lmed");
			}
			$this->View(__FUNCTION__);
		}
	}
 ?>