<?php 
	require_once('Model.Model.php');
	class Comptes_utilisateursModel extends Model{
		private $ID_Utilisateur;
		private $Nom_Propre;
		private $Prenom;
		private $Nom_Utilisateur;
		private $Mot_De_Passe;
		private $Adresse_Email;
		private $Date_Inscription;
		private $Compte_Active;
		private $phone;
		private $mobile;
		private $address;
		private $city;
		private $zip;
		private $date_emb;
		private $parend_id;
		private $type;
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
		public function getNom_Propre(){
			return $this->Nom_Propre;
		}
		public function setNom_Propre($value){
			if(!empty($value))
				$this->Nom_Propre = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Nom_Propre";
			}
		}
		public function getPrenom(){
			return $this->Prenom;
		}
		public function setPrenom($value){
			if(!empty($value))
				$this->Prenom = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Prenom";
			}
		}
		public function getNom_Utilisateur(){
			return $this->Nom_Utilisateur;
		}
		public function setNom_Utilisateur($value){
			if(!empty($value))
				$this->Nom_Utilisateur = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Nom_Utilisateur";
			}
		}
		public function getMot_De_Passe(){
			return $this->Mot_De_Passe;
		}
		public function setMot_De_Passe($value){
			if(!empty($value))
				$this->Mot_De_Passe = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Mot_De_Passe";
			}
		}
		public function getAdresse_Email(){
			return $this->Adresse_Email;
		}
		public function setAdresse_Email($value){
			if(!empty($value))
				$this->Adresse_Email = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Adresse_Email";
			}
		}
		public function getDate_Inscription(){
			return $this->Date_Inscription;
		}
		public function setDate_Inscription($value){
			if(!empty($value))
				$this->Date_Inscription = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Date_Inscription";
			}
		}
		public function getCompte_Active(){
			return $this->Compte_Active;
		}
		public function setCompte_Active($value){
			if(!empty($value))
				$this->Compte_Active = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Compte_Active";
			}
		}
		public function getphone(){
			return $this->phone;
		}
		public function setphone($value){
			if(!empty($value))
				$this->phone = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "phone";
			}
		}
		
		public function getmobile(){
			return $this->mobile;
		}
		public function setmobile($value){
			if(!empty($value))
				$this->mobile = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "mobile";
			}
		}
		
		public function getaddress(){
			return $this->address;
		}
		public function setaddress($value){
			if(!empty($value))
				$this->address1 = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "address1";
			}
		}
		
		public function getcity(){
			return $this->city;
		}
		public function setcity($value){
			if(!empty($value))
				$this->city = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "city";
			}
		}
		
		public function getzip(){
			return $this->zip;
		}
		public function setzip($value){
			if(!empty($value))
				$this->zip = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "zip";
			}
		}
		
		public function getdate_emb(){
			return $this->date_emb;
		}
		public function setdate_emb($value){
			if(!empty($value))
				$this->date_emb = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "date_emb";
			}
		}
		
		public function getparend_id(){
			return $this->parend_id;
		}
		public function setparend_id($value){
			if(!empty($value))
				$this->parend_id = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "parend_id";
			}
		}
		
		public function gettype(){
			return $this->type;
		}
		public function settype($value){
			if(!empty($value))
				$this->type = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "type";
			}
		}                                                                                                                                                                                                                                                                                                                                                                                                                                                      
		public function add(){
			$rqt = 
			'INSERT INTO comptes_utilisateurs (Nom_Propre,Prenom,Nom_Utilisateur,Mot_De_Passe,Adresse_Email,Date_Inscription,Compte_Active,phone,mobile,address,city,zip,date_emb,parend_id,type) 
			VALUES ("'.$this->Nom_Propre .'","'.$this->Prenom .'","'.$this->Nom_Utilisateur .'","'.$this->Mot_De_Passe .'","'.$this->Adresse_Email .'","'.$this->Date_Inscription .'","'.$this->Compte_Active .'","'.$this->phone .'","'.$this->mobile .'","'.$this->address .'","'.$this->city .'","'.$this->zip .'","'.$this->date_emb .'","'.$this->parend_id .'","'.$this->type .'")';
			echo $rqt;die;
			mysql_query($rqt);
		}
		public function update($id){
			$rqt = 'UPDATE comptes_utilisateurs SET Nom_Propre="'.$this->Nom_Propre .'",Prenom="'.$this->Prenom .'",Nom_Utilisateur="'.$this->Nom_Utilisateur .'",Mot_De_Passe="'.$this->Mot_De_Passe .'",Adresse_Email="'.$this->Adresse_Email .'",Date_Inscription="'.$this->Date_Inscription .'",Compte_Active="'.$this->Compte_Active .'",phone="'.$this->phone .'",mobile="'.$this->mobile .'",address="'.$this->address .'",city="'.$this->city .'",zip="'.$this->zip .'",date_emb="'.$this->date_emb .'",parend_id="'.$this->parend_id .'",type="'.$this->type .'" WHERE ID_Utilisateur="'.$id.'"';
			mysql_query($rqt);
		}
		public function delete($id){
			$rqt = 'DELETE FROM comptes_utilisateurs  WHERE ID_Utilisateur='.$id;
			mysql_query($rqt);
		}
		public function listComptes_utilisateurs(){
			$tab = array();
			$rqt = mysql_query("SELECT * FROM comptes_utilisateurs");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		public function findComptes_utilisateurs($id){
			$rqt = mysql_query("SELECT * FROM comptes_utilisateurs  WHERE ID_Utilisateur=".$id);
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
				$this->ID_Utilisateur = $data["ID_Utilisateur"];
				$this->Nom_Propre = $data["Nom_Propre"];
				$this->Prenom = $data["Prenom"];
				$this->Nom_Utilisateur = $data["Nom_Utilisateur"];
				$this->Mot_De_Passe = $data["Mot_De_Passe"];
				$this->Adresse_Email = $data["Adresse_Email"];
				$this->Date_Inscription = $data["Date_Inscription"];
				$this->Compte_Active = $data["Compte_Active"];
				$this->phone = $data["phone"];
				$this->mobile = $data["mobile"];
				$this->address = $data["address"];
				$this->city = $data["city"];
				$this->zip = $data["zip"];
				$this->date_emb = $data["date_emb"];
				$this->parend_id = $data["parend_id"];
				$this->type = $data["type"];
		}
		return $this;
	}
}
?>
