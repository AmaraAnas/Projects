<?php 
	require_once('Model.Model.php');
	class ZoneModel extends Model{
		private $zone_id;
		private $zone_name;
		private $zone_pid;
		private $gov_id;
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
		public function getzone_name(){
			return $this->zone_name;
		}
		public function setzone_name($value){
			if(!empty($value))
				$this->zone_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "zone_name";
			}
		}
		public function getzone_pid(){
			return $this->zone_pid;
		}
		public function setzone_pid($value){
			if(!empty($value))
				$this->zone_pid = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "zone_pid";
			}
		}
		public function getgov_id(){
			return $this->gov_id;
		}
		public function setgov_id($value){
			if(!empty($value))
				$this->gov_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "gov_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO zone (zone_name,zone_pid,gov_id) VALUES ("'.$this->zone_name .'","'.$this->zone_pid .'","'.$this->gov_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE zone SET zone_name="'.$this->zone_name .'",zone_pid="'.$this->zone_pid .'",gov_id="'.$this->gov_id .'" WHERE zone_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM zone  WHERE zone_id='.$id;
			mysql_query($rqt);
		}
		public function listZone(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM zone");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findZone($id){
			$rqt = mysql_query("SELECT * FROM zone  WHERE zone_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->zone_id = $data["zone_id"];
				$this->zone_name = $data["zone_name"];
				$this->zone_pid = $data["zone_pid"];
				$this->gov_id = $data["gov_id"];
		}
		return $this;
	}
}
?>
