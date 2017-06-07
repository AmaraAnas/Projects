package aas.insat.pu.entity;

import java.io.Serializable;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.validation.constraints.Size;

import org.hibernate.validator.constraints.NotEmpty;

@Entity
@Table(name="parent")
public class Parent implements Serializable {
	
		@Id
		@GeneratedValue(strategy=GenerationType.AUTO)	
		
		private Long idUser;
		 @NotEmpty
		 @Size(min=2, max=30)
		private String nom;
		 @NotEmpty
		 @Size(min=2, max=30)
		 private String prenom;
		 @NotEmpty
		 @Size(min=2, max=30)
		private String adresse;
		 @NotEmpty
		 @Size(min=2, max=30)
		private String email;
		 @NotEmpty
		 @Size(min=2, max=30)
		private String tel;
		 @NotEmpty
		 @Size(min=4, max=30)
		private String userName;
		 @NotEmpty
		 @Size(min=6, max=30)
		private String password;

		 
		
		
		
		
		public String getPrenom() {
			return prenom;
		}
		public void setPrenom(String prenom) {
			this.prenom = prenom;
		}
		public String getUserName() {
			return userName;
		}
		public void setUserName(String userName) {
			this.userName = userName;
		}
		public String getPassword() {
			return password;
		}
		public void setPassword(String password) {
			this.password = password;
		}
		public Parent()  {
			super();
		}
		public Parent(String nom,String prenom, String adresse, String email, String tel) {
			super();
			this.nom = nom;
			this.prenom = prenom;
			this.adresse = adresse;
			this.email = email;
			this.tel = tel;
		}
		public Long getIdUser() {
			return idUser;
		}
		public void setIdUser(Long idUser) {
			this.idUser = idUser;
		}
		public String getNom() {
			return nom;
		}
		public void setNom(String nomUser) {
			this.nom = nomUser;
		}
		public String getAdresse() {
			return adresse;
		}
		public void setAdresse(String adresse) {
			this.adresse = adresse;
		}
		public String getEmail() {
			return email;
		}
		public void setEmail(String email) {
			this.email = email;
		}
		public String getTel() {
			return tel;
		}
		public void setTel(String tel) {
			this.tel = tel;
		}


}
