<?php 
	require_once('Model.Model.php');
	class ProduitsModel extends Model{
		private $pro_id;
		private $pro_name;
		private $pro_ref;
		private $pro_obs;
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
		/*public function getlab_id(){
			return $this->lab_id;
		}
		public function setlab_id($value){
			if(!empty($value))
				$this->lab_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "lab_id";
			}
		}*/
		public function getpro_name(){
			return $this->pro_name;
		}
		public function setpro_name($value){
			if(!empty($value))
				$this->pro_name = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "pro_name";
			}
		}
		public function getpro_ref(){
			return $this->pro_ref;
		}
		public function setpro_ref($value){
			if(!empty($value))
				$this->pro_ref = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "pro_ref";
			}
		}
		public function getpro_obs(){
			return $this->pro_obs;
		}
		public function setpro_obs($value){
			if(!empty($value))
				$this->pro_obs = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "pro_obs";
			}
		}
		public function add(){
			$rqt = 'INSERT INTO produits (pro_name,pro_ref,pro_obs) VALUES ("'.$this->pro_name .'","'.$this->pro_ref .'","'.$this->pro_obs .'")';
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE produits SET pro_name="'.$this->pro_name .'",pro_ref="'.$this->pro_ref .'",pro_obs="'.$this->pro_obs .'" WHERE pro_id="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM produits  WHERE pro_id='.$id;
			mysql_query($rqt);
		}
		public function listProduits(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM produits");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findProduits($id){
			$rqt = mysql_query("SELECT * FROM produits  WHERE pro_id=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->pro_id = $data["pro_id"];
				$this->pro_name = $data["pro_name"];
				$this->pro_ref = $data["pro_ref"];
				$this->pro_obs = $data["pro_obs"];
		}
		return $this;
	}
}
?>
