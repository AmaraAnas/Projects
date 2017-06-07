<?php 
	require_once('Model.Model.php');
	class MunicipaliteModel extends Model{
		private $mun_id;
		private $mun_name;
		private $gov_id;
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
		public function getmun_name(){
			return $this->mun_name;
		}
		public function setmun_name($value){
			if(!empty($value))
				$this->mun_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "mun_name";
			}
		}
		public function getgov_id(){
			return $this->gov_id;
		}
		public function setgov_id($value){
			if(!empty($value))
				$this->gov_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "gov_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO municipalite (mun_name,gov_id) VALUES ("'.$this->mun_name .'","'.$this->gov_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE municipalite SET mun_name="'.$this->mun_name .'",gov_id="'.$this->gov_id .'" WHERE mun_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM municipalite  WHERE mun_id='.$id;
			mysql_query($rqt);
		}
		public function listMunicipalite(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM municipalite");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findMunicipalite($id){
			$rqt = mysql_query("SELECT * FROM municipalite  WHERE mun_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->mun_id = $data["mun_id"];
				$this->mun_name = $data["mun_name"];
				$this->gov_id = $data["gov_id"];
		}
		return $this;
	}
}
?>
