<?php 
	require_once('Model.Model.php');
	class PlaningModel extends Model{
    	private $planing_id;
		//private $lab_id;
		private $zone_id;
		private $empl_id;
		private $observation;
		private $etat;
		public function getplaning_id(){
			return $this->planing_id;
		}
		public function setplaning_id($value){
			if(!empty($value))
				$this->planing_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "planing_id";
			}
		}
	/*	public function getlab_id(){
			return $this->lab_id;
		}
		public function setlab_id($value){
			if(!empty($value))
				$this->lab_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_id";
			}
		}*/
		public function getzone_id(){
			return $this->zone_id;
		}
		public function setzone_id($value){
			if(!empty($value))
				$this->zone_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "zone_id";
			}
		}
		public function getempl_id(){
			return $this->empl_id;
		}
		public function setempl_id($value){
			if(!empty($value))
				$this->empl_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_id";
			}
		}
		public function getobservation(){
			return $this->observation;
		}
		public function setobservation($value){
			if(!empty($value))
				$this->observation = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "observation";
			}
		}
		public function getetat(){
			return $this->etat;
		}
		public function setetat($value){
			if(!empty($value))
				$this->etat = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "etat";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO planing (zone_id,empl_id,observation,etat) VALUES
			("'.$this->zone_id .'","'.$this->empl_id .'","'.$this->observation .'","'.$this->etat .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE planing SET zone_id="'.$this->zone_id .'",empl_id="'.$this->empl_id .'",observation="'.$this->observation .'",etat="'.$this->etat .'" WHERE planing_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM planing  WHERE planing_id='.$id;
			mysql_query($rqt);
		}
		public function listPlaning(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM planing");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findPlaning($id){
			$rqt = mysql_query("SELECT * FROM planing  WHERE planing_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->planing_id = $data["planing_id"];
			//	$this->lab_id = $data["lab_id"];
				$this->zone_id = $data["zone_id"];
				$this->empl_id = $data["empl_id"];
				$this->observation = $data["observation"];
				$this->etat = $data["etat"];
		}
		return $this;
	}
}
?>
