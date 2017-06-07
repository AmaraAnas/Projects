<?php 
	require_once('Model.Model.php');
	class MedecinsModel extends Model{
 		private $med_id;
		private $med_first_name;
		private $med_last_name;
		private $med_email;
		private $med_mobile1;
		private $med_mobile2;
		private $fonc_id;
		private $fonc_name;
		private $spe_id;
 
		public function getmed_id(){
			return $this->med_id;
		} 

		public function getmed_first_name(){
			return $this->med_first_name;
		} 
		public function setmed_first_name($value){
			if(!empty($value)) $this->med_first_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_first_name";
			}
		}

		public function getmed_last_name(){
			return $this->med_last_name;
		} 
		public function setmed_last_name($value){
			if(!empty($value)) $this->med_last_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_last_name";
			}
		}

		public function getmed_email(){
			return $this->med_email;
		} 
		public function setmed_email($value){
			if(!empty($value)) $this->med_email = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_email";
			}
		}

		public function getmed_mobile1(){
			return $this->med_mobile1;
		} 
		public function setmed_mobile1($value){
			if(!empty($value)) $this->med_mobile1 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_mobile1";
			}
		}

		public function getmed_mobile2(){
			return $this->med_mobile2;
		} 
		public function setmed_mobile2($value){
			if(!empty($value)) $this->med_mobile2 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "med_mobile2";
			}
		}

		public function getfonc_id(){
			return $this->fonc_id;
		} 
		public function setfonc_id($value){
			if(!empty($value)) $this->fonc_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "fonc_id";
			}
		}

		public function getspe_id(){
			return $this->spe_id;
		} 
		public function setspe_id($value){
			if(!empty($value)) $this->spe_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "spe_id";
			}
		}
 		public function addMedecins(){
			$rqt = 'INSERT INTO med(`med_first_name`,`med_last_name`,`med_email`,`med_mobile1`,`med_mobile2`,`fonc_id`,`spe_id`) VALUES ("';
			$rqt .= $this->med_first_name . '"," ';
			$rqt .= $this->med_last_name . '"," ';
			$rqt .= $this->med_email . '"," ';
			$rqt .= $this->med_mobile1 . '"," ';
			$rqt .= $this->med_mobile2 . '"," ';
			$rqt .= $this->fonc_id . '"," ';
			$rqt .= $this->spe_id . '")'; 
 mysql_query($rqt);}
 			public function updateMedecins($idMedecins){
				$rqt = 'UPDATE  med  SET ';
				$rqt .= 'med_first_name="'.$this->med_first_name.'",';
				$rqt .= 'med_last_name="'.$this->med_last_name.'",';
				$rqt .= 'med_email="'.$this->med_email.'",';
				$rqt .= 'med_mobile1="'.$this->med_mobile1.'",';
				$rqt .= 'med_mobile2="'.$this->med_mobile2.'",';
				$rqt .= 'fonc_id="'.$this->fonc_id.'",';
				$rqt .= 'spe_id="'.$this->spe_id.'" WHERE med_id='. $idMedecins; 
				mysql_query($rqt);}
			public function deleteMedecins($idMedecins){
				$rqt = 'DELETE FROM med WHERE med_id = '.$idMedecins;
				mysql_query($rqt);
			}
			public function listMedecins(){
				$tab = array();
				$rqt = mysql_query('SELECT *  FROM med');
				while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
				return $tab;
			}
			public function findMedecins($idmed){
				$rqt = mysql_query("SELECT * FROM med WHERE med_id = ".$idmed);
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
			return $this;}
				
	}
  ?>