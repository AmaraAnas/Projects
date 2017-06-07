package aas.insat.pu.dao;
import javax.persistence.*;

import aas.insat.pu.entity.*;


public class DAO  implements IDAO{

	@PersistenceContext
	private EntityManager em;
	

	@Override
	public void ajouterParent(Parent p) {
	em.persist(p);
	}

	}
