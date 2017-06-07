<?php 

	require_once('Controller.Controller.php');
	class Li_medController extends Controller{
		public function index(){
			$li_med = new Li_medModel();
			$this->viewData["listLi_med"] = $li_med->listLi_med();
			$this->View(__FUNCTION__);
		}
		public function ajouter(){
			$li_med = new Li_medModel();
			$this->viewData["li_med"] = $li_med;
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(!isset($_POST["zone_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_med->setzone_id($_POST["zone_id"]);
				$li_med->AddModelError("zone_id", " * Erreur Zone");
				$li_med->setmed_id($_POST["med_id"]);
				$li_med->AddModelError("med_id", " * Erreur Medecin");
				$li_med->setmed_phone($_POST["med_phone"]);
				$li_med->AddModelError("med_phone", " * Erreur Tel");
				$li_med->setmed_address($_POST["med_address"]);
				$li_med->AddModelError("med_address", " * Erreur Adresse");
				$li_med->setmed_city($_POST["med_city"]);
				$li_med->AddModelError("med_city", " * Erreur City");
				$li_med->setmed_zip($_POST["med_zip"]);
				$li_med->AddModelError("med_zip", " * Erreur Code postale");
				$li_med->setmun_id($_POST["mun_id"]);
				$li_med->AddModelError("mun_id", " * Erreur Municipalité");
				if($li_med->IsValid()){
					$li_med->add();
					$this->RederictAction("Li_med");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function modifier($id){
			$li_med = new Li_medModel();
			$this->viewData["li_med"] = $li_med->findli_med($id);
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(!isset($_POST["zone_id"]))
				$this->View(__FUNCTION__);
			else{
				$li_med->setzone_id($_POST["zone_id"]);
				$li_med->AddModelError("zone_id", " * Erreur Zone");
				$li_med->setmed_id($_POST["med_id"]);
				$li_med->AddModelError("med_id", " * Erreur Medecin");
				$li_med->setmed_phone($_POST["med_phone"]);
				$li_med->AddModelError("med_phone", " * Erreur Tel");
				$li_med->setmed_address($_POST["med_address"]);
				$li_med->AddModelError("med_address", " * Erreur Adresse");
				$li_med->setmed_city($_POST["med_city"]);
				$li_med->AddModelError("med_city", " * Erreur City");
				$li_med->setmed_zip($_POST["med_zip"]);
				$li_med->AddModelError("med_zip", " * Erreur Code postale");
				$li_med->setmun_id($_POST["mun_id"]);
				$li_med->AddModelError("mun_id", " * Erreur Municipalité");
				if($li_med->IsValid()){
					$li_med->update($id);
					$this->RederictAction("Li_med");
				}else
				$this->View(__FUNCTION__);
			}
		}
		public function supprimer($id){
			$li_med = new Li_medModel();
			$this->viewData["li_med"] = $li_med->findli_med($id);
			$zone = new ZoneModel();
			$this->viewData["listZone"] = $zone->listZone();
			if(isset($_GET["id"])){
				$li_med->delete($id);
				$this->RederictAction("Li_med");
			} 
			$this->View(__FUNCTION__);
		} 
	} 
?>