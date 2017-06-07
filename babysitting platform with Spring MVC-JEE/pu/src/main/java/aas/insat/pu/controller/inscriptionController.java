package aas.insat.pu.controller;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurerAdapter;

import aas.insat.pu.entity.Parent;
import aas.insat.pu.metier.ParentManager;

@Controller
public class inscriptionController extends WebMvcConfigurerAdapter{
	@Autowired
	private ParentManager metier;
	 

    @Override
    public void addViewControllers(ViewControllerRegistry registry) {
        registry.addViewController("/index").setViewName("index");
    }


	//@RequestMapping(value="/inscrit", method = RequestMethod.GET, params="new")
	@RequestMapping(value="/inscrit", method = RequestMethod.GET)
	public String inscrire(Model model) {
		model.addAttribute("parent", new Parent());
		return "inscription";
	}

	
	@RequestMapping(value="/inscrit", method = RequestMethod.POST)
	public String inscrireFromForm(@Valid Parent parent, BindingResult result) {
		if (result.hasErrors()) {
			return "inscription";
		}else {
			metier.ajouterParent(parent);;
		return "login" ;
		}
	}
	
	
	
}

   
	



