package aas.insat.pu.metier;

import org.springframework.transaction.annotation.Transactional;

import aas.insat.pu.dao.IDAO;
import aas.insat.pu.entity.Parent;

@Transactional
public class ParentManager {
	
	private IDAO dao;
	public void setDao(IDAO dao) {
	this.dao = dao;
	}
	
	public void ajouterParent(Parent p){
		dao.ajouterParent(p);
	}

}
