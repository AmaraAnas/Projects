<?php 
	require_once('Model.Model.php');
	class Lpro_emp_zoneModel extends Model{
 		private $li_id;
		private $zone_id;
		private $empl_id;
		private $pro_id;
 
		public function getli_id(){
			return $this->li_id;
		} 

		public function getzone_id(){
			return $this->zone_id;
		} 
		public function setzone_id($value){
			if(!empty($value)) $this->zone_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "zone_id";
			}
		}

		public function getempl_id(){
			return $this->empl_id;
		} 
		public function setempl_id($value){
			if(!empty($value)) $this->empl_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_id";
			}
		}

		public function getpro_id(){
			return $this->pro_id;
		} 
		public function setpro_id($value){
			if(!empty($value)) $this->pro_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "pro_id";
			}
		}
 		public function addLpro_emp_zone(){
			$rqt = 'INSERT INTO li_pro_emp_zone(`zone_id`,`empl_id`,`pro_id`) VALUES ("';
			$rqt .= $this->zone_id . '"," ';
			$rqt .= $this->empl_id . '"," ';
			$rqt .= $this->pro_id . '")'; 
 mysql_query($rqt);}
 			public function updateLpro_emp_zone($idLpro_emp_zone){
				$rqt = 'UPDATE  Lpro_emp_zone  SET ';
				$rqt .= 'zone_id="'.$this->zone_id.'",';
				$rqt .= 'empl_id="'.$this->empl_id.'",';
				$rqt .= 'pro_id="'.$this->pro_id.'" WHERE li_id='. $idLpro_emp_zone; 
				mysql_query($rqt);}
			public function deleteLpro_emp_zone($idLpro_emp_zone){
				$rqt = 'DELETE FROM Lpro_emp_zone WHERE li_id = '.$idLpro_emp_zone;
				mysql_query($rqt);
			}
			public function listLpro_emp_zone(){
				$tab = array();
				$rqt = mysql_query('SELECT *  FROM li_pro_emp_zone');
				while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
				return $tab;
			}
			public function findLpro_emp_zone($idli_pro_emp_zone){
				$rqt = mysql_query("SELECT * FROM li_pro_emp_zone WHERE li_id = ".$idli_pro_emp_zone);
				$data = mysql_fetch_assoc($rqt);
				if(count($data)>0){
					$this->li_id = $data["li_id"];
					$this->zone_id = $data["zone_id"];
					$this->empl_id = $data["empl_id"];
					$this->pro_id = $data["pro_id"];
				}
				return $this;
			}}
  ?>