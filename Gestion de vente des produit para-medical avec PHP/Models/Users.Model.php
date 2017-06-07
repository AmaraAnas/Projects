<?php 
	require_once('Model.Model.php');
	class UsersModel extends Model{
 		private $user_id;
		private $empl_id;
		private $cat_id;
		private $user_username;
		private $user_password;
 
		public function getuser_id(){
			return $this->user_id;
		} 

		public function getempl_id(){
			return $this->empl_id;
		} 
		public function setempl_id($value){
			if(!empty($value)) $this->empl_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "empl_id";
			}
		}

		public function getcat_id(){
			return $this->cat_id;
		} 
		public function setcat_id($value){
			if(!empty($value)) $this->cat_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "cat_id";
			}
		}

		public function getuser_username(){
			return $this->user_username;
		} 
		public function setuser_username($value){
			if(!empty($value)) $this->user_username = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "user_username";
			}
		}

		public function getuser_password(){
			return $this->user_password;
		} 
		public function setuser_password($value){
			if(!empty($value)) $this->user_password = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "user_password";
			}
		}
 		public function addUsers(){
			$rqt = 'INSERT INTO users(`empl_id`,`cat_id`,`user_username`,`user_password`) VALUES ("';
			$rqt .= $this->empl_id . '"," ';
			$rqt .= $this->cat_id . '"," ';
			$rqt .= $this->user_username . '"," ';
			$rqt .= $this->user_password . '")'; 
 mysql_query($rqt);}
 			public function updateUsers($idUsers){
				$rqt = 'UPDATE  Users  SET ';
				$rqt .= 'empl_id="'.$this->empl_id.'",';
				$rqt .= 'cat_id="'.$this->cat_id.'",';
				$rqt .= 'user_username="'.$this->user_username.'",';
				$rqt .= 'user_password="'.$this->user_password.'" WHERE user_id='. $idUsers; 
				mysql_query($rqt);}
			public function deleteUsers($idUsers){
				$rqt = 'DELETE FROM Users WHERE user_id = '.$idUsers;
				mysql_query($rqt);
			}
			public function listUsers(){
				$tab = array();
				$rqt = mysql_query('SELECT *  FROM users');
				while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
				return $tab;
			}
			public function findUsers($idusers){
				$rqt = mysql_query("SELECT * FROM users WHERE user_id = ".$idusers);
				$data = mysql_fetch_assoc($rqt);
				if(count($data)>0){
					$this->user_id = $data["user_id"];
					$this->empl_id = $data["empl_id"];
					$this->cat_id = $data["cat_id"];
					$this->user_username = $data["user_username"];
					$this->user_password = $data["user_password"];
				}
				return $this;
			}}
  ?>