package aas.insat.jee.dao;
import java.util.List;

import aas.insat.jee.entity.*;

public interface IBoutiqueDAO {
	
	public Long ajouterCategorie(Categorie c);
	public List<Categorie> listCategories();
	public Categorie getCategorie(Long idCat);
	public void supprimerCategrorie(Long idcat);
	public void modifierCategorie(Categorie c);
	public Long ajouterJouet(Jouet j, Long idCat);
	public List<Jouet> listjouets();
	public List<Jouet> jouetsParMotCle(String mc);
	public List<Jouet> jouetsParCategorie(Long idCat);
	public List<Jouet> jouetsSelectionnes();
	public Jouet getJouet(Long idJ);
	public void supprimerJouet(Long idJ);
	public void modifierJouet(Jouet j);
	public void ajouterUser(User c);
	public void modifierUser(User c);
	public void supprimerUser(Long idC);
	public User getUser(Long idC);
	public List<User> listUsers();
	public void quantitemodif (Long IdJ, int q);
	public User getUser(String name);

}
