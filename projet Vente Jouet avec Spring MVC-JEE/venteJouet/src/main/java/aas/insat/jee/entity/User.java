package aas.insat.jee.entity;
import javax.persistence.*;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

import java.io.Serializable;

@Entity
@Table(name="user")
public class User implements Serializable  {
	@Id
	@GeneratedValue(strategy=GenerationType.AUTO)	
	
	private Long idUser;
	 @NotNull
	 @Size(min=2, max=30)
	private String nomUser;
	 @NotNull
	 @Size(min=2, max=30)
	private String adresse;
	 @NotNull
	 @Size(min=2, max=30)
	private String email;
	 @NotNull
	 @Size(min=2, max=30)
	private String tel;
	 @NotNull
	 @Size(min=2, max=30)
	private String userName;
	 @NotNull
	 @Size(min=2, max=30)
	private String password;

	 
	
	
	
	
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
	public User()  {
		super();
	}
	public User(String nomUser, String adresse, String email, String tel) {
		super();
		this.nomUser = nomUser;
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
	public String getNomUser() {
		return nomUser;
	}
	public void setNomUser(String nomUser) {
		this.nomUser = nomUser;
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
