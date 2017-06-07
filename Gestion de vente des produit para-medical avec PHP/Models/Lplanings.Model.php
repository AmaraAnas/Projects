<?php 
	require_once('Model.Model.php');
	class LplaningsModel extends Model{
 		private $li_id;
		private $planing_id;
		private $med_id;
		private $pro_id;
		private $observation;
		private $etat;
		private $date;
 
		public function getli_id(){
			return $this->li_id;
		} 

		public function getplaning_id(){
			return $this->planing_id;
		} 
		public function setplaning_id($value){
			if(!empty($value)) $this->planing_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "planing_id";
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

		public function getobservation(){
			return $this->observation;
		} 
		public function setobservation($value){
			if(!empty($value)) $this->observation = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "observation";
			}
		}

		public function getetat(){
			return $this->etat;
		} 
		public function setetat($value){
			if(!empty($value)) $this->etat = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "etat";
			}
		}

		public function getdate(){
			return $this->date;
		} 
		public function setdate($value){
			if(!empty($value)) $this->date = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "date";
			}
		}
 		public function addLplanings(){
			$rqt = 'INSERT INTO li_pla(`planing_id`,`pro_id`,`observation`,`etat`,`date`) VALUES ("';
			$rqt .= $this->planing_id . '"," ';
			$rqt .= $this->pro_id . '"," ';
			$rqt .= $this->observation . '"," ';
			$rqt .= $this->etat . '"," ';
			$rqt .= $this->date . '")'; 
			
 mysql_query($rqt);}
 			public function updateLplanings($idLplanings){
				$rqt = 'UPDATE  Lplanings  SET ';
				$rqt .= 'planing_id="'.$this->planing_id.'",';
				$rqt .= 'pro_id="'.$this->pro_id.'",';
				$rqt .= 'observation="'.$this->observation.'",';
				$rqt .= 'etat="'.$this->etat.'",';
				$rqt .= 'date="'.$this->date.'" WHERE li_id='. $idLplanings; 
				mysql_query($rqt);}
			public function deleteLplanings($idLplanings){
				$rqt = 'DELETE FROM Lplanings WHERE li_id = '.$idLplanings;
				mysql_query($rqt);
			}
			public function listLplanings(){
				$tab = array();
				$rqt = mysql_query('SELECT *  FROM li_pla');
				while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
				return $tab;
			}
			public function findLplanings($idli_pla){
				$rqt = mysql_query("SELECT * FROM li_pla WHERE li_id = ".$idli_pla);
				$data = mysql_fetch_assoc($rqt);
				if(count($data)>0){
					$this->li_id = $data["li_id"];
					$this->planing_id = $data["planing_id"];
					$this->pro_id = $data["pro_id"];
					$this->observation = $data["observation"];
					$this->etat = $data["etat"];
					$this->date = $data["date"];
				}
				return $this;
			}}
  ?>