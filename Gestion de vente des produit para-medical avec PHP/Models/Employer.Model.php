<?php 
	require_once('Model.Model.php');
	class EmployerModel extends Model{
		private $empl_id;
		private $empl_phone;
		private $empl_mobile;
		private $empl_address1;
		private $empl_city;
		private $empl_zip;
		private $empl_date_emb;
		private $empl_id_parent;
		private $lab_id;
		private $ID_Utilisateur;
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
		public function getempl_phone(){
			return $this->empl_phone;
		}
		public function setempl_phone($value){
			if(!empty($value))
				$this->empl_phone = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_phone";
			}
		}
		public function getempl_mobile(){
			return $this->empl_mobile;
		}
		public function setempl_mobile($value){
			if(!empty($value))
				$this->empl_mobile = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_mobile";
			}
		}
		public function getempl_address1(){
			return $this->empl_address1;
		}
		public function setempl_address1($value){
			if(!empty($value))
				$this->empl_address1 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_address1";
			}
		}
		public function getempl_city(){
			return $this->empl_city;
		}
		public function setempl_city($value){
			if(!empty($value))
				$this->empl_city = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_city";
			}
		}
		public function getempl_zip(){
			return $this->empl_zip;
		}
		public function setempl_zip($value){
			if(!empty($value))
				$this->empl_zip = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_zip";
			}
		}
		public function getempl_date_emb(){
			return $this->empl_date_emb;
		}
		public function setempl_date_emb($value){
			if(!empty($value))
				$this->empl_date_emb = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_date_emb";
			}
		}
		public function getempl_id_parent(){
			return $this->empl_id_parent;
		}
		public function setempl_id_parent($value){
			if(!empty($value))
				$this->empl_id_parent = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_id_parent";
			}
		}
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
		public function getID_Utilisateur(){
			return $this->ID_Utilisateur;
		}
		public function setID_Utilisateur($value){
			if(!empty($value))
				$this->ID_Utilisateur = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "ID_Utilisateur";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO employer (empl_phone,empl_mobile,empl_address1,empl_city,empl_zip,empl_date_emb,empl_id_parent,lab_id,ID_Utilisateur) VALUES ("'.$this->empl_phone .'","'.$this->empl_mobile .'","'.$this->empl_address1 .'","'.$this->empl_city .'","'.$this->empl_zip .'","'.$this->empl_date_emb .'","'.$this->empl_id_parent .'","'.$this->lab_id .'","'.$this->ID_Utilisateur .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE employer SET empl_phone="'.$this->empl_phone .'",empl_mobile="'.$this->empl_mobile .'",empl_address1="'.$this->empl_address1 .'",empl_city="'.$this->empl_city .'",empl_zip="'.$this->empl_zip .'",empl_date_emb="'.$this->empl_date_emb .'",empl_id_parent="'.$this->empl_id_parent .'",lab_id="'.$this->lab_id .'",ID_Utilisateur="'.$this->ID_Utilisateur .'" WHERE empl_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM employer  WHERE empl_id='.$id;
			mysql_query($rqt);
		}
		public function listEmployer(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM employer");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findEmployer($id){
			$rqt = mysql_query("SELECT * FROM employer  WHERE empl_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->empl_id = $data["empl_id"];
				$this->empl_phone = $data["empl_phone"];
				$this->empl_mobile = $data["empl_mobile"];
				$this->empl_address1 = $data["empl_address1"];
				$this->empl_city = $data["empl_city"];
				$this->empl_zip = $data["empl_zip"];
				$this->empl_date_emb = $data["empl_date_emb"];
				$this->empl_id_parent = $data["empl_id_parent"];
				$this->lab_id = $data["lab_id"];
				$this->ID_Utilisateur = $data["ID_Utilisateur"];
		}
		return $this;
	}
}
?>
