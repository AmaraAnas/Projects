<?php 
	require_once('Model.Model.php');
	class CountryModel extends Model{
		private $count_id;
		private $count_name;
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
		public function getcount_name(){
			return $this->count_name;
		}
		public function setcount_name($value){
			if(!empty($value))
				$this->count_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "count_name";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO country (count_name) VALUES ("'.$this->count_name .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE country SET count_name="'.$this->count_name .'" WHERE count_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM country  WHERE count_id='.$id;
			mysql_query($rqt);
		}
		public function listCountry(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM country");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findCountry($id){
			$rqt = mysql_query("SELECT * FROM country  WHERE count_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->count_id = $data["count_id"];
				$this->count_name = $data["count_name"];
		}
		return $this;
	}
}
?>
