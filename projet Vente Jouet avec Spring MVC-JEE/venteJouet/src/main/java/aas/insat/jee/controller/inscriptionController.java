package aas.insat.jee.controller;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurerAdapter;

import aas.insat.jee.entity.User;
import aas.insat.jee.metier.IAdminMetier;

@Controller
public class inscriptionController extends WebMvcConfigurerAdapter{
	@Autowired
	private IAdminMetier metier;
	 


	//@RequestMapping(value="/inscrit", method = RequestMethod.GET, params="new")
	@RequestMapping(value="/inscrit", method = RequestMethod.GET)
	public String ajoutUser(Model model) {
		model.addAttribute("User", new User());
		return "inscription";
	}

	
	@RequestMapping(value="/inscrit", method = RequestMethod.POST)
	public String addUserFromForm(@Valid User User, BindingResult result) {

		if (result.hasErrors()) {
			return "inscription";
		}else {
			metier.ajoutUser(User);;
		return "redirect:/index" ;
		}
	}
	
	
	
}

   
	



