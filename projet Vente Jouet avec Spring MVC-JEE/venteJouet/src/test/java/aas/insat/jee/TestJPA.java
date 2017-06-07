package aas.insat.jee;

import static org.junit.Assert.*;

import java.util.List;

import org.junit.Test;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import aas.insat.jee.entity.Categorie;

import aas.insat.jee.metier.IAdminMetier;

public class TestJPA {

	@Test
	public void test1() {
		
		try {
			
		ClassPathXmlApplicationContext context= new ClassPathXmlApplicationContext(new String[]{"applicationContext.xml"});
				IAdminMetier metier=(IAdminMetier) context.getBean("metier");
				List<Categorie> cats1=metier.listCategories();
				metier.ajouterCategorie(new Categorie("Ordinateur", "Ordinateurs", "", null));
				metier.ajouterCategorie(new Categorie("Imprimantes", "Imprimantes", "", null));
				List<Categorie> cats2=metier.listCategories();
				assertTrue(cats2.size()==cats1.size()+2);
				} catch (Exception e) { assertTrue(e.getMessage(),false);}}
				}

