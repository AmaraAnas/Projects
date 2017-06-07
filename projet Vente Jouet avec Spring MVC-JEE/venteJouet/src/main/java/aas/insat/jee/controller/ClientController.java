package aas.insat.jee.controller;

import java.util.Collection;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.multipart.MultipartFile;

import aas.insat.jee.entity.ArticlePanier;
import aas.insat.jee.entity.Panier;
import aas.insat.jee.entity.User;
import aas.insat.jee.metier.IAdminMetier;


@RequestMapping(value="/user")
@SessionAttributes("editedUser")
@Controller
public class ClientController {
	@Autowired
	private IAdminMetier metier;

	@RequestMapping(value="/index")
	public String index(Model model){
	model.addAttribute("User", new User());
	return "compte";
	}
	@RequestMapping(value="/save")
	public String save(@Valid User c,BindingResult bindingResult,
	Model model,MultipartFile file) throws Exception{
	if(bindingResult.hasErrors()){
	model.addAttribute("User", new User());
	return "compte";
	}
	if(c.getIdUser()!=null){ 
	User cl =(User) model.asMap().get("editedUser");
	metier.modifierUser(cl);}
	model.addAttribute("User", new User());
	return "compte";
	}
		

	@RequestMapping(value="/edit")
	public String editCl(Long idC,Model model){
	User c = metier.getUser(idC);
	model.addAttribute("editedUser", c);
	model.addAttribute("User", new User());
	model.addAttribute("Users", metier.listUsers());
	return "compte";} 

	

	
}
