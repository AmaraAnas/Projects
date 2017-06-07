package aas.insat.jee.controller;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.util.List;

import javax.validation.Valid;

import org.apache.commons.io.IOUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.multipart.MultipartFile;

import aas.insat.jee.entity.*;
import aas.insat.jee.metier.IAdminMetier;

@Controller
@RequestMapping(value="/adminJouet")
public class JouetController {
	@Autowired
	private IAdminMetier metier;
	
	@RequestMapping(value="/index")
	public String index(Model model){
	model.addAttribute("jouet", new Jouet());
	model.addAttribute("jouets", metier.listJouets());
	model.addAttribute("categories", metier.listCategories());
	return "jouets";
	}
	
	
	@RequestMapping(value="/saveJouet")
	public String enregistrer(@Valid Jouet p, BindingResult bindingResult,MultipartFile file, Model model) throws Exception{
	
		if(bindingResult.hasErrors()) {
			model.addAttribute("jouets", metier.listJouets());
			return "jouets" ; }
		if(!file.isEmpty()){ p.setPhoto(file.getOriginalFilename()); }
		if(p.getIdJouet()==null){
		metier.ajouterJouet(p, p.getCategorie().getIdCategorie());
		} else{ metier.modifierJouet(p); }
		if(!file.isEmpty()){
		String path=System.getProperty("java.io.tmpdir")+"/PROD_"+p.getIdJouet();
		file.transferTo(new File(path+file.getOriginalFilename()));
		}
		
		/*if(!file.isEmpty()){ 
			String path= System.getProperty("java.io.tmpdir");
			p.setPhoto(file.getOriginalFilename());
			Long idJ =null;
			if(p.getIdJouet()==null){ idJ = metier.ajouterJouet(p, p.getCategorie().getIdCategorie());}
			else{ metier.modifierJouet(p); idJ=p.getIdJouet();}
			file.transferTo(new File(path+"/PROD_"+idJ+file.getOriginalFilename()));}
		else {
			if(p.getIdJouet()==null){
				metier.ajouterJouet(p, p.getCategorie().getIdCategorie());}
				else{ metier.modifierJouet(p);}
			}*/
			
	model.addAttribute("jouet", new Jouet());
	model.addAttribute("jouets", metier.listJouets());
	return "jouets";
	}
	
	
	@RequestMapping(value="/photoJouet",produces=MediaType.IMAGE_JPEG_VALUE)
	@ResponseBody
	public byte[] getPhoto(Long idJ) throws IOException{
	Jouet j=metier.getJouet(idJ);
	File f =new File(System.getProperty("java.io.tmpdir")+"/PROD_"+idJ+j.getPhoto());
    return IOUtils.toByteArray(new FileInputStream(f));
	}
	
	
	
	@ModelAttribute("categories")
	public List<Categorie> listCategories(){
	return metier.listCategories();
	}
	@RequestMapping(value="/deleteJouet")
	public String deleteJouet(@RequestParam("idJ")Long idJ,Model model){
	metier.supprimerJouet(idJ);
	model.addAttribute("jouets", metier.listJouets());
	model.addAttribute("jouet",new Jouet());
	return "jouets";
	}
	@RequestMapping(value="/editJouet")
	public String editJouet(@RequestParam("idJ")Long idJ,Model model){
	Jouet p=metier.getJouet(idJ);
	model.addAttribute("jouet",p);
	model.addAttribute("jouets", metier.listJouets());
	return "jouets";
	}
	}

