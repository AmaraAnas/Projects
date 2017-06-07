package aas.insat.pu;

import static org.junit.Assert.assertTrue;

import java.util.List;

import org.junit.Test;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import aas.insat.pu.entity.Parent;
import aas.insat.pu.metier.ParentManager;



public class TestJPA {

	@Test
	public void test1() {
		try {
			
			ClassPathXmlApplicationContext context= new ClassPathXmlApplicationContext(new String[]{"applicationContext.xml"});
					ParentManager metier=(ParentManager) context.getBean("metier");
					metier.ajouterParent(new Parent("nom","prenom","adresse","email","tel"));
	
					} catch (Exception e) { assertTrue(e.getMessage(),false);}}
					

		
	}