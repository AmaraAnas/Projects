<?php 
	require_once('Model.Model.php');
	class Li_medModel extends Model{
		private $li_id;
		private $zone_id;
		private $med_id;
		private $med_phone;
		private $med_address;
		private $med_city;
		private $med_zip;
		private $mun_id;
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
		public function getmed_id(){
			return $this->med_id;
		}
		public function setmed_id($value){
			if(!empty($value))
				$this->med_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_id";
			}
		}
		public function getmed_phone(){
			return $this->med_phone;
		}
		public function setmed_phone($value){
			if(!empty($value))
				$this->med_phone = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_phone";
			}
		}
		public function getmed_address(){
			return $this->med_address;
		}
		public function setmed_address($value){
			if(!empty($value))
				$this->med_address = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_address";
			}
		}
		public function getmed_city(){
			return $this->med_city;
		}
		public function setmed_city($value){
			if(!empty($value))
				$this->med_city = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_city";
			}
		}
		public function getmed_zip(){
			return $this->med_zip;
		}
		public function setmed_zip($value){
			if(!empty($value))
				$this->med_zip = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_zip";
			}
		}
		public function getmun_id(){
			return $this->mun_id;
		}
		public function setmun_id($value){
			if(!empty($value))
				$this->mun_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "mun_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO li_med (zone_id,med_id,med_phone,med_address,med_city,med_zip,mun_id) VALUES ("'.$this->zone_id .'","'.$this->med_id .'","'.$this->med_phone .'","'.$this->med_address .'","'.$this->med_city .'","'.$this->med_zip .'","'.$this->mun_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE li_med SET zone_id="'.$this->zone_id .'",med_id="'.$this->med_id .'",med_phone="'.$this->med_phone .'",med_address="'.$this->med_address .'",med_city="'.$this->med_city .'",med_zip="'.$this->med_zip .'",mun_id="'.$this->mun_id .'" WHERE li_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM li_med  WHERE li_id='.$id;
			mysql_query($rqt);
		}
		public function listLi_med(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM li_med");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findLi_med($id){
			$rqt = mysql_query("SELECT * FROM li_med  WHERE li_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->li_id = $data["li_id"];
				$this->zone_id = $data["zone_id"];
				$this->med_id = $data["med_id"];
				$this->med_phone = $data["med_phone"];
				$this->med_address = $data["med_address"];
				$this->med_city = $data["med_city"];
				$this->med_zip = $data["med_zip"];
				$this->mun_id = $data["mun_id"];
		}
		return $this;
	}
}
?>
