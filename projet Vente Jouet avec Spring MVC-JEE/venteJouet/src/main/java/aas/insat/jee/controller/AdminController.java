package aas.insat.jee.controller;
import aas.insat.jee.entity.*;

import java.io.ByteArrayInputStream;
import java.io.IOException;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.validation.Valid;

import org.apache.commons.io.IOUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.SessionAttributes;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.HandlerExceptionResolver;
import org.springframework.web.servlet.ModelAndView;

import aas.insat.jee.metier.IAdminMetier;

@Controller
@RequestMapping(value="/admin")
@SessionAttributes("editedCat")
public class AdminController implements HandlerExceptionResolver {
	
@Autowired
private IAdminMetier metier;
@RequestMapping(value="/index")
public String index(Model model){
model.addAttribute("categorie", new Categorie());
model.addAttribute("categories", metier.listCategories());
return "categories";
}

@RequestMapping(value="/saveCat")
public String saveCat(@Valid Categorie c,BindingResult bindingResult,
Model model,MultipartFile file) throws Exception{
if(bindingResult.hasErrors()){
model.addAttribute("categories", metier.listCategories());
return "categories";
}
if(!file.isEmpty()){
	//BufferedImage bi=ImageIO.read(file.getInputStream());
	//c.setNomPhoto(file.getOriginalFilename());
	c.setPhoto(file.getBytes());}
else{
if(c.getIdCategorie()!=null){
Categorie cat=(Categorie) model.asMap().get("editedCat");
c.setPhoto(cat.getPhoto());
}}
if(c.getIdCategorie()==null) metier.ajouterCategorie(c);
else metier.modifierCategorie(c);
model.addAttribute("categorie", new Categorie());
model.addAttribute("categories", metier.listCategories());
return "categories";
}
	
@RequestMapping(value="photoCat",produces=MediaType.IMAGE_JPEG_VALUE)
@ResponseBody
public byte[] getPhoto(Long idCat) throws IOException{
Categorie c=metier.getCategorie(idCat);
if(c.getPhoto()==null) return new byte[0];
else return IOUtils.toByteArray(new ByteArrayInputStream(c.getPhoto()));
}
@RequestMapping(value="/suppCat")
public String suppCat(Long idCat,Model model){
metier.supprimerCategrorie(idCat);
model.addAttribute("categorie", new Categorie());
model.addAttribute("categories", metier.listCategories());
return "categories";
}
@RequestMapping(value="/editCat")
public String editCat(Long idCat,Model model){
Categorie c=metier.getCategorie(idCat);
model.addAttribute("editedCat", c);
model.addAttribute("categorie",c );
model.addAttribute("categories", metier.listCategories());
return "categories";} 

@RequestMapping(value="/suppUser")
public String suppUser(Long idC,Model model){
metier.supprimerUser(idC);
model.addAttribute("User", new User());
model.addAttribute("Users", metier.listUsers());
return "clients";
}
@RequestMapping(value="/User")
public String listUser(Model model){
model.addAttribute("User", new User());
model.addAttribute("Users", metier.listUsers());
return "clients";
}
	
	
	@Override
	public ModelAndView resolveException (HttpServletRequest req,HttpServletResponse arg1, Object arg2, Exception exception) {
	exception.printStackTrace();
	ModelAndView mav = new ModelAndView();
	mav.addObject("categorie", new Categorie());
	mav.addObject("categories",metier.listCategories() );
	mav.addObject("exception", exception.getMessage());
	mav.setViewName("categories");
	
	
	return mav;
	} }
	
