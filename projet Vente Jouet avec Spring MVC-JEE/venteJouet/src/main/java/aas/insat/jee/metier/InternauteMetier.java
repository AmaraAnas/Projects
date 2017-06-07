package aas.insat.jee.metier;

import java.util.List;

import aas.insat.jee.entity.*;

public interface InternauteMetier {

	public List<Categorie> listCategories();
	public Categorie getCategorie(Long idCat);
	public List<Jouet> listJouets();
	public List<Jouet> JouetsParMotCle(String mc);
	public List<Jouet> JouetsParCategorie(Long idCat);
	public List<Jouet> JouetsSelectionnes();
	public Jouet getJouet(Long idP);

}
