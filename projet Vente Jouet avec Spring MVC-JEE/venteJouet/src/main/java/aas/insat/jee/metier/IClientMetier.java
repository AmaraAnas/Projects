package aas.insat.jee.metier;

import aas.insat.jee.entity.User;
import aas.insat.jee.entity.Panier;

public interface IClientMetier extends InternauteMetier {

	public void ajoutUser (User c);
	public void valide_commande (Long IdJ,int q);
	public void modifierUser (User c);
	public User getUser(Long idC);
}
