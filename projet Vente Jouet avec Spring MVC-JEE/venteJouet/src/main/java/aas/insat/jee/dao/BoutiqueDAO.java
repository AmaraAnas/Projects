package aas.insat.jee.dao;
import java.util.Date;
import java.util.List;
import javax.persistence.*;
import javax.persistence.Query;

import aas.insat.jee.entity.*;


public class BoutiqueDAO  implements IBoutiqueDAO{

	@PersistenceContext
	private EntityManager em;
	@Override
	public Long ajouterCategorie(Categorie c) {
	em.persist(c);
	return c.getIdCategorie();
	}
	@Override
	public List<Categorie> listCategories() {
	Query req=em.createQuery("select c from Categorie c");
	return req.getResultList();
	}
	
	@Override
	public Categorie getCategorie(Long idCat) {
	return em.find(Categorie.class, idCat);
	}
	@Override
	public void supprimerCategrorie(Long idcat) {
	Categorie c=em.find(Categorie.class, idcat);
	em.remove(c);
	}
	@Override
	public void modifierCategorie(Categorie c) {
	em.merge(c);
	}
	@Override
	public Long ajouterJouet(Jouet p, Long idCat) {
	Categorie c=getCategorie(idCat);
	p.setCategorie(c);em.persist(p);
	return p.getIdJouet();
	}
	@Override
	public List<Jouet> listjouets() {
	Query req=em.createQuery("select j from Jouet j");
	return req.getResultList();
	}
	@Override
	public List<Jouet> jouetsParMotCle(String mc) {
	Query req=em.createQuery("select p from Jouet p where p.designation like :x or p.description like:x");
	req.setParameter("x", "%"+mc+"%");
	return req.getResultList();
	}
	@Override
	public List<Jouet> jouetsParCategorie(Long idCat) {
	Query req=em.createQuery("select p from Jouet p where p.categorie.idCategorie=:x");
	req.setParameter("x", idCat);
	return req.getResultList();
	}
	@Override
	public List<Jouet> jouetsSelectionnes() {
	Query req=em.createQuery("select p from Jouet p where p.selectionne=true");
	return req.getResultList();
	}
	@Override
	public Jouet getJouet(Long idP) {
	return em.find(Jouet.class, idP);
	}
	@Override
	public void supprimerJouet(Long idP) {
		Jouet p=getJouet(idP);
	em.remove(p);
	}
	@Override
	public void modifierJouet(Jouet p) {
	em.merge(p);
	}
	@Override
	public void modifierUser(User u) {
	em.merge(u);
	}
	@Override
	public void ajouterUser(User c) {
	em.persist(c);
	}
	@Override
	public void supprimerUser(Long idC){
		User c=em.find(User.class, idC);
		em.remove(c);
		
	}
	@Override
	public void  quantitemodif (Long IdJ, int q){
		Jouet j = getJouet(IdJ);
		int x = j.getQuantite();
		x = x-q;
		j.setQuantite(x);
		em.merge(j);
		}
			
		
	@Override
	public List<User> listUsers(){
		Query req=em.createQuery("select c from User c");
		return req.getResultList();
		
	}
	@Override
	public User getUser(Long idC){
		return em.find(User.class, idC);
	}
	@Override
	public User getUser(String userName){
		return em.find(User.class, userName);
	}
	}
