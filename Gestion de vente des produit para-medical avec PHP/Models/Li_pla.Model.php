<?php 
	require_once('Model.Model.php');
	class Li_plaModel extends Model{
		private $li_id;
		private $planing_id;
		private $med_id;
		private $pro_id;
		private $observation;
		private $etat;
		private $date;
		private $heure;
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
		public function getdate(){
			return $this->date;
		}
		public function setdate($value){
			if(!empty($value))
				$this->date = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "date";
			}
		}
		public function getheure(){
			return $this->heure;
		}
		public function setheure($value){
			if(!empty($value))
				$this->heure = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "heure";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO li_pla (planing_id,med_id,pro_id,observation,etat,date,heure) VALUES ("'.$this->planing_id .'","'.$this->med_id .'","'.$this->pro_id .'","'.$this->observation .'","'.$this->etat .'","'.$this->date .'","'.$this->heure .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE li_pla SET planing_id="'.$this->planing_id .'",med_id="'.$this->med_id .'",pro_id="'.$this->pro_id .'",observation="'.$this->observation .'",etat="'.$this->etat .'",date="'.$this->date .'",heure="'.$this->heure .'" WHERE li_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM li_pla  WHERE li_id='.$id;
			mysql_query($rqt);
		}
		public function listLi_pla(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM li_pla");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findLi_pla($id){
			$rqt = mysql_query("SELECT * FROM li_pla  WHERE li_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->li_id = $data["li_id"];
				$this->planing_id = $data["planing_id"];
				$this->med_id = $data["med_id"];
				$this->pro_id = $data["pro_id"];
				$this->observation = $data["observation"];
				$this->etat = $data["etat"];
				$this->date = $data["date"];
				$this->heure = $data["heure"];
		}
		return $this;
	}
}
?>
