package aas.insat.jee.metier;

import java.util.List;

import org.springframework.transaction.annotation.Transactional;

import aas.insat.jee.dao.*;
import aas.insat.jee.entity.*;

@Transactional
public class MetierImpl implements IAdminMetier{
	
	private IBoutiqueDAO dao;
	public void setDao(IBoutiqueDAO dao) {
	this.dao = dao;
	}
	@Override
	public Long ajouterJouet(Jouet p, Long idCat) {
	return dao.ajouterJouet(p, idCat);
	}
	
	@Override
	public void supprimerJouet(Long idP) {
	dao.supprimerJouet(idP);
	}
	@Override
	public void modifierJouet(Jouet p) {
	dao.modifierJouet(p);
	}
	@Override
	public List<Categorie> listCategories() {
	return dao.listCategories();
	}
	@Override
	public Categorie getCategorie(Long idCat) {
	return dao.getCategorie(idCat);
	}
	@Override
	public List<Jouet> listJouets() {
	return dao.listjouets();
	}
	@Override
	public List<Jouet> JouetsParMotCle(String mc) {
	return dao.jouetsParMotCle(mc);
	}
	@Override
	public List<Jouet> JouetsParCategorie(Long idCat) {
	return dao.jouetsParCategorie(idCat);
	}
	@Override
	public List<Jouet> JouetsSelectionnes() {
	return dao.jouetsSelectionnes();
	}
	@Override
	public Jouet getJouet(Long idP) {
	return dao.getJouet(idP);
	}
	@Override
	public void valide_commande(Long IdJ, int q) {
	dao.quantitemodif(IdJ, q);;
	}
	@Override
	public Long ajouterCategorie(Categorie c) {
	return dao.ajouterCategorie(c);
	}
	@Override
	public void supprimerCategrorie(Long idcat) {
	dao.supprimerCategrorie(idcat);
	}
	@Override
	public void modifierCategorie(Categorie c) {
	dao.modifierCategorie(c);
	}
	@Override
	public void ajoutUser(User c) {
	dao.ajouterUser(c);
	}
	public List<User> listUsers(){
		return dao.listUsers();
	}
	public void supprimerUser(Long idC){
		dao.supprimerUser(idC);
	}
	public void modifierUser (User c){
		dao.modifierUser(c);
	}
	public User getUser(Long idC){
		return dao.getUser(idC);
	}

}
