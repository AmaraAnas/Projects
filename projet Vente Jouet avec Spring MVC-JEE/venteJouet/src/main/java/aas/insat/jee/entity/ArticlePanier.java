package aas.insat.jee.entity;

import java.io.Serializable;

public class ArticlePanier implements Serializable {
	
	private Jouet jouet;
	private int quantite;
	
	
	
	public ArticlePanier() {
		super();
	}
	
	public ArticlePanier(Jouet jouet, int quantite) {
		super();
		this.jouet = jouet;
		this.quantite = quantite;
	}

	public Jouet getjouet() {
		return jouet;
	}
	public void setjouet(Jouet jouet) {
		this.jouet = jouet;
	}
	public int getQuantite() {
		return quantite;
	}
	public void setQuantite(int quantite) {
		this.quantite = quantite;
	}

	
}
