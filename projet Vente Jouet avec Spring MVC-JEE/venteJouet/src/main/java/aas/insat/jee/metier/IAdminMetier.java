package aas.insat.jee.metier;

import java.util.List;

import aas.insat.jee.entity.*;



public interface IAdminMetier extends IClientMetier {

	public Long ajouterCategorie(Categorie c);
	public void supprimerCategrorie(Long idcat);
	public void modifierCategorie(Categorie c);
	public Long ajouterJouet(Jouet p, Long idCat);
	public void supprimerJouet(Long idP);
	public void modifierJouet(Jouet p);
	public List<User> listUsers();
	public void supprimerUser(Long idC);
}
