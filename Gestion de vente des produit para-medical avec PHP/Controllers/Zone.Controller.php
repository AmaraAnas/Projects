<?php 

	require_once('Controller.Controller.php');
	class ZoneController extends Controller{
		public function index(){
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$zone = new ZoneModel();
			$this->viewData["zone"] = $zone;
			$zones = new ZoneModel();
			$this->viewData["zones"] = $zones->listZone();
			if(!isset($_POST["zone_name"]))
				$this->View(__FUNCTION__);
			else{
				$zone->setzone_name($_POST["zone_name"]);
				$zone->AddModelError("zone_name", " * Erreur Libele");
				$zone->setzone_pid($_POST["zone_pid"]);
				$zone->AddModelError("zone_pid", " * Erreur Parent zone");
				$zone->setgov_id($_POST["gov_id"]);
				$zone->AddModelError("gov_id", " * Erreur Gouvernorat");
				if($zone->IsValid()){
					$zone->add();
					$this->RederictAction("Zone");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$zone = new ZoneModel();
			$this->viewData["zone"] = $zone->findzone($id);
			$zones = new ZoneModel();
			$this->viewData["zones"] = $zones->listZone();
			if(!isset($_POST["zone_name"]))
				$this->View(__FUNCTION__);
			else{
				$zone->setzone_name($_POST["zone_name"]);
				$zone->AddModelError("zone_name", " * Erreur Libele");
				$zone->setzone_pid($_POST["zone_pid"]);
				$zone->AddModelError("zone_pid", " * Erreur Parent zone");
				$zone->setgov_id($_POST["gov_id"]);
				$zone->AddModelError("gov_id", " * Erreur Gouvernorat");
				if($zone->IsValid()){
					$zone->update($id);
					$this->RederictAction("Zone");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$zone = new ZoneModel();
			$this->viewData["zone"] = $zone->findzone($id);
			if(isset($_GET["id"])){
				$zone->delete($id);
				$this->RederictAction("Zone");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>