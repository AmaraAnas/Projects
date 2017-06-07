<?php 
	require_once('Model.Model.php');
	class MedModel extends Model{
		private $med_id;
		private $med_first_name;
		private $med_last_name;
		private $med_email;
		private $med_mobile1;
		private $med_mobile2;
		private $fonc_id;
		private $spe_id;
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
		public function getmed_first_name(){
			return $this->med_first_name;
		}
		public function setmed_first_name($value){
			if(!empty($value))
				$this->med_first_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_first_name";
			}
		}
		public function getmed_last_name(){
			return $this->med_last_name;
		}
		public function setmed_last_name($value){
			if(!empty($value))
				$this->med_last_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_last_name";
			}
		}
		public function getmed_email(){
			return $this->med_email;
		}
		public function setmed_email($value){
			if(!empty($value))
				$this->med_email = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_email";
			}
		}
		public function getmed_mobile1(){
			return $this->med_mobile1;
		}
		public function setmed_mobile1($value){
			if(!empty($value))
				$this->med_mobile1 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_mobile1";
			}
		}
		public function getmed_mobile2(){
			return $this->med_mobile2;
		}
		public function setmed_mobile2($value){
			if(!empty($value))
				$this->med_mobile2 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_mobile2";
			}
		}
		public function getfonc_id(){
			return $this->fonc_id;
		}
		public function setfonc_id($value){
			if(!empty($value))
				$this->fonc_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "fonc_id";
			}
		}
		public function getspe_id(){
			return $this->spe_id;
		}
		public function setspe_id($value){
			if(!empty($value))
				$this->spe_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "spe_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO med (med_first_name,med_last_name,med_email,med_mobile1,med_mobile2,fonc_id,spe_id) VALUES ("'.$this->med_first_name .'","'.$this->med_last_name .'","'.$this->med_email .'","'.$this->med_mobile1 .'","'.$this->med_mobile2 .'","'.$this->fonc_id .'","'.$this->spe_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE med SET med_first_name="'.$this->med_first_name .'",med_last_name="'.$this->med_last_name .'",med_email="'.$this->med_email .'",med_mobile1="'.$this->med_mobile1 .'",med_mobile2="'.$this->med_mobile2 .'",fonc_id="'.$this->fonc_id .'",spe_id="'.$this->spe_id .'" WHERE med_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM med  WHERE med_id='.$id;
			mysql_query($rqt);
		}
		public function listMed(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM med");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findMed($id){
			$rqt = mysql_query("SELECT * FROM med  WHERE med_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->med_id = $data["med_id"];
				$this->med_first_name = $data["med_first_name"];
				$this->med_last_name = $data["med_last_name"];
				$this->med_email = $data["med_email"];
				$this->med_mobile1 = $data["med_mobile1"];
				$this->med_mobile2 = $data["med_mobile2"];
				$this->fonc_id = $data["fonc_id"];
				$this->spe_id = $data["spe_id"];
		}
		return $this;
	}
}
?>
