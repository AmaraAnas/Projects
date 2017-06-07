package aas.insat.jee.entity;
import java.io.Serializable;
import java.util.*;

public class Panier implements Serializable {
	private Map<Long, ArticlePanier> articles=new HashMap<Long, ArticlePanier>();
	
	public void ajouterArticle(Jouet p,int quantite){
		ArticlePanier art= articles.get(p.getIdJouet());
		if(art!=null) art.setQuantite(art.getQuantite()+quantite);
		else articles.put(p.getIdJouet(), new ArticlePanier(p, quantite));
		}
	
		public Collection<ArticlePanier> getArticles(){
		return articles.values();
		}
		
		public double getTotal(){
		double total=0;
		Collection<ArticlePanier> items=getArticles();
		for(ArticlePanier art:items){
		total+=art.getQuantite()*art.getjouet().getPrix();
		}
		return total;
		}
		
		public void deleteItem(Long idJouet){
			articles.remove(idJouet);
			}
		public void clear(){
			articles.clear();
			}
		
		public int getSize(){
			int nb=0;
			Collection<ArticlePanier> items=getArticles();
			for(ArticlePanier art:items){
			nb+=art.getQuantite();}
			return nb;
			}

}
