package aas.insat.jee.entity;

import java.io.Serializable;
import java.util.Collection;

import javax.persistence.*;
@Entity
public class Role implements Serializable {
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="role_id")
	private Long role_id;
	private String roleName;
	@OneToMany
	@JoinColumn(name="role_id")
	private Collection<User> users;
	
	
	public Collection<User> getUsers() {
		return users;
	}
	public void setUsers(Collection<User> users) {
		this.users = users;
	}
	public Role(String roleName) {
		super();
		this.roleName = roleName;
	}
	public Long getIdRole() {
		return role_id;
	}
	public void setIdRole(Long idRole) {
		this.role_id = idRole;
	}
	public String getRoleName() {
		return roleName;
	}
	public void setRoleName(String roleName) {
		this.roleName = roleName;
	}
	
	
	

}
