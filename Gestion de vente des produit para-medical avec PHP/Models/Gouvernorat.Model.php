<?php 
	require_once('Model.Model.php');
	class GouvernoratModel extends Model{
		private $gov_id;
		private $gov_name;
		private $count_id;
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
		public function getgov_name(){
			return $this->gov_name;
		}
		public function setgov_name($value){
			if(!empty($value))
				$this->gov_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "gov_name";
			}
		}
		public function getcount_id(){
			return $this->count_id;
		}
		public function setcount_id($value){
			if(!empty($value))
				$this->count_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "count_id";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO gouvernorat (gov_name,count_id) VALUES ("'.$this->gov_name .'","'.$this->count_id .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE gouvernorat SET gov_name="'.$this->gov_name .'",count_id="'.$this->count_id .'" WHERE gov_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM gouvernorat  WHERE gov_id='.$id;
			mysql_query($rqt);
		}
		public function listGouvernorat(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM gouvernorat");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findGouvernorat($id){
			$rqt = mysql_query("SELECT * FROM gouvernorat  WHERE gov_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->gov_id = $data["gov_id"];
				$this->gov_name = $data["gov_name"];
				$this->count_id = $data["count_id"];
		}
		return $this;
	}
}
?>
