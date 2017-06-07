<?php 
	require_once('Model.Model.php');
	class LabModel extends Model{
		private $lab_id;
		private $lab_name;
		private $lab_first_name;
		private $lab_last_name;
		private $lab_email;
		private $lab_phone;
		private $lab_fax;
		private $lab_mobile;
		private $lab_address1;
		private $lab_zip;
		private $mun_id;
		private $logo;
		public function getlab_id(){
			return $this->lab_id;
		}
		public function setlab_id($value){
			if(!empty($value))
				$this->lab_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_id";
			}
		}
		public function getlab_name(){
			return $this->lab_name;
		}
		public function setlab_name($value){
			if(!empty($value))
				$this->lab_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_name";
			}
		}
		public function getlab_first_name(){
			return $this->lab_first_name;
		}
		public function setlab_first_name($value){
			if(!empty($value))
				$this->lab_first_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_first_name";
			}
		}
		public function getlab_last_name(){
			return $this->lab_last_name;
		}
		public function setlab_last_name($value){
			if(!empty($value))
				$this->lab_last_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_last_name";
			}
		}
		public function getlab_email(){
			return $this->lab_email;
		}
		public function setlab_email($value){
			if(!empty($value))
				$this->lab_email = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_email";
			}
		}
		public function getlab_phone(){
			return $this->lab_phone;
		}
		public function setlab_phone($value){
			if(!empty($value))
				$this->lab_phone = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_phone";
			}
		}
		public function getlab_fax(){
			return $this->lab_fax;
		}
		public function setlab_fax($value){
			if(!empty($value))
				$this->lab_fax = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_fax";
			}
		}
		public function getlab_mobile(){
			return $this->lab_mobile;
		}
		public function setlab_mobile($value){
			if(!empty($value))
				$this->lab_mobile = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_mobile";
			}
		}
		public function getlab_address1(){
			return $this->lab_address1;
		}
		public function setlab_address1($value){
			if(!empty($value))
				$this->lab_address1 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_address1";
			}
		}
		public function getlab_zip(){
			return $this->lab_zip;
		}
		public function setlab_zip($value){
			if(!empty($value))
				$this->lab_zip = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_zip";
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
		public function getlogo(){
			return $this->logo;
		}
		public function setlogo($value){
			if(!empty($value))
				$this->logo = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "logo";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO lab (lab_name,lab_first_name,lab_last_name,lab_email,lab_phone,lab_fax,lab_mobile,lab_address1,lab_zip,mun_id,logo) VALUES ("'.$this->lab_name .'","'.$this->lab_first_name .'","'.$this->lab_last_name .'","'.$this->lab_email .'","'.$this->lab_phone .'","'.$this->lab_fax .'","'.$this->lab_mobile .'","'.$this->lab_address1 .'","'.$this->lab_zip .'","'.$this->mun_id .'","'.$this->logo .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE lab SET lab_name="'.$this->lab_name .'",lab_first_name="'.$this->lab_first_name .'",lab_last_name="'.$this->lab_last_name .'",lab_email="'.$this->lab_email .'",lab_phone="'.$this->lab_phone .'",lab_fax="'.$this->lab_fax .'",lab_mobile="'.$this->lab_mobile .'",lab_address1="'.$this->lab_address1 .'",lab_zip="'.$this->lab_zip .'",mun_id="'.$this->mun_id .'",logo="'.$this->logo .'" WHERE lab_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM lab  WHERE lab_id='.$id;
			mysql_query($rqt);
		}
		public function listLab(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM lab");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findLab($id){
			$rqt = mysql_query("SELECT * FROM lab  WHERE lab_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->lab_id = $data["lab_id"];
				$this->lab_name = $data["lab_name"];
				$this->lab_first_name = $data["lab_first_name"];
				$this->lab_last_name = $data["lab_last_name"];
				$this->lab_email = $data["lab_email"];
				$this->lab_phone = $data["lab_phone"];
				$this->lab_fax = $data["lab_fax"];
				$this->lab_mobile = $data["lab_mobile"];
				$this->lab_address1 = $data["lab_address1"];
				$this->lab_zip = $data["lab_zip"];
				$this->mun_id = $data["mun_id"];
				$this->logo = $data["logo"];
		}
		return $this;
	}
}
?>
