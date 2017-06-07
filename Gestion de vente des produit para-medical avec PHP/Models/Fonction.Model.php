<?php 
	require_once('Model.Model.php');
	class FonctionModel extends Model{
		private $fonc_id;
		private $fonc_name;
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
		public function getfonc_name(){
			return $this->fonc_name;
		}
		public function setfonc_name($value){
			if(!empty($value))
				$this->fonc_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "fonc_name";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO fonction (fonc_name) VALUES ("'.$this->fonc_name .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE fonction SET fonc_name="'.$this->fonc_name .'" WHERE fonc_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM fonction  WHERE fonc_id='.$id;
			mysql_query($rqt);
		}
		public function listFonction(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM fonction");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findFonction($id){
			$rqt = mysql_query("SELECT * FROM fonction  WHERE fonc_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->fonc_id = $data["fonc_id"];
				$this->fonc_name = $data["fonc_name"];
		}
		return $this;
	}
}
?>
