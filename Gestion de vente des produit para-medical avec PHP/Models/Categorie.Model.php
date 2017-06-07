<?php 
	require_once('Model.Model.php');
	class CategorieModel extends Model{
		private $cat_id;
		private $cat_name;
		private $etat;
		public function getcat_id(){
			return $this->cat_id;
		}
		public function setcat_id($value){
			if(!empty($value))
				$this->cat_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "cat_id";
			}
		}
		public function getcat_name(){
			return $this->cat_name;
		}
		public function setcat_name($value){
			if(!empty($value))
				$this->cat_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "cat_name";
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
		public function add(){
			$rqt = 'INSERT INTO categorie (cat_name,etat) VALUES ("'.$this->cat_name .'","'.$this->etat .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE categorie SET cat_name="'.$this->cat_name .'",etat="'.$this->etat .'" WHERE cat_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM categorie  WHERE cat_id='.$id;
			mysql_query($rqt);
		}
		public function listCategorie(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM categorie");
			if(mysql_fetch_assoc($rqt)){
				while($data = mysql_fetch_assoc($rqt))
					$tab[] = $data;
			}
			return $tab;
		}
		public function findCategorie($id){
			$rqt = mysql_query("SELECT * FROM categorie  WHERE cat_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->cat_id = $data["cat_id"];
				$this->cat_name = $data["cat_name"];
				$this->etat = $data["etat"];
		}
		return $this;
	}
}
?>
