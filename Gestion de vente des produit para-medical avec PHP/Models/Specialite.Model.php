<?php 
	require_once('Model.Model.php');
	class SpecialiteModel extends Model{
		private $spe_id;
		private $spe_name;
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
		public function getspe_name(){
			return $this->spe_name;
		}
		public function setspe_name($value){
			if(!empty($value))
				$this->spe_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "spe_name";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO specialite (spe_name) VALUES ("'.$this->spe_name .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE specialite SET spe_name="'.$this->spe_name .'" WHERE spe_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM specialite  WHERE spe_id='.$id;
			mysql_query($rqt);
		}
		public function listSpecialite(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM specialite");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findSpecialite($id){
			$rqt = mysql_query("SELECT * FROM specialite  WHERE spe_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->spe_id = $data["spe_id"];
				$this->spe_name = $data["spe_name"];
		}
		return $this;
	}
}
?>
