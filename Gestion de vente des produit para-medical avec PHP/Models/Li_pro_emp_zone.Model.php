<?php 
	require_once('Model.Model.php');
	class Li_pro_emp_zoneModel extends Model{
		private $li_id;
		private $zone_id;
		private $empl_id;
		private $pro_id;
		public function getli_id(){
			return $this->li_id;
		}
		public function setli_id($value){
			if(!empty($value))
				$this->li_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "li_id";
			}
		}
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
		public function getpro_id(){
			return $this->pro_id;
		}
		public function setpro_id($value){
			if(!empty($value))
				$this->pro_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "pro_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO li_pro_emp_zone (zone_id,empl_id,pro_id) VALUES ("'.$this->zone_id .'","'.$this->empl_id .'","'.$this->pro_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE li_pro_emp_zone SET zone_id="'.$this->zone_id .'",empl_id="'.$this->empl_id .'",pro_id="'.$this->pro_id .'" WHERE li_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM li_pro_emp_zone  WHERE li_id='.$id;
			mysql_query($rqt);
		}
		public function listLi_pro_emp_zone(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM li_pro_emp_zone");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findLi_pro_emp_zone($id){
			$rqt = mysql_query("SELECT * FROM li_pro_emp_zone  WHERE li_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->li_id = $data["li_id"];
				$this->zone_id = $data["zone_id"];
				$this->empl_id = $data["empl_id"];
				$this->pro_id = $data["pro_id"];
		}
		return $this;
	}
}
?>
