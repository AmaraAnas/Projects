package aas.insat.jee.controller;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.util.Collection;

import org.apache.commons.io.IOUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.SessionAttributes;

import aas.insat.jee.metier.IClientMetier;
import aas.insat.jee.metier.InternauteMetier;
import aas.insat.jee.entity.*;

@Controller
@SessionAttributes("panier")
public class EBoutiqueController {
@Autowired
private IClientMetier metier;
@RequestMapping("/index")
public String index(Model model){
if(model.asMap().get("panier")==null){
model.addAttribute("panier", new Panier());
}
model.addAttribute("categories", metier.listCategories());
model.addAttribute("jouets", metier.JouetsSelectionnes());
return "index";
}

@RequestMapping("/jouetsParCat")
public String JouetsParCat(@RequestParam Long idCat,Model
model){
model.addAttribute("categories", metier.listCategories());
model.addAttribute("jouets",metier.JouetsParCategorie(idCat));
return "index";
}

@RequestMapping("/chercherjouets")
public String chercherJouets(@RequestParam String mc,Model model){
model.addAttribute("mc",mc);
model.addAttribute("categories", metier.listCategories());
model.addAttribute("jouets", metier.JouetsParMotCle(mc));
return "index";
}

@RequestMapping(value="/photoJouet",produces=MediaType.IMAGE_JPEG_VALUE)
@ResponseBody
public byte[] photoJouet(@RequestParam("idP")Long idP) throws IOException{
	Jouet j=metier.getJouet(idP);
	File f =new File(System.getProperty("java.io.tmpdir")+"/PROD_"+idP+j.getPhoto());
    return IOUtils.toByteArray(new FileInputStream(f));
}
@RequestMapping("/ajouterAuPanier")
public String ajouterAuPanier(@RequestParam Long idJouet,@RequestParam int quantite,Model model){
Panier panier=null;
if(model.asMap().get("panier")==null){
panier=new Panier();
model.addAttribute("panier", panier);
}
else
panier=(Panier) model.asMap().get("panier");
panier.ajouterArticle(metier.getJouet(idJouet), quantite);
model.addAttribute("categories", metier.listCategories());
model.addAttribute("jouets", metier.JouetsSelectionnes());
return "index";
}
@RequestMapping("/SuppDePanier")
public String suppDePanier(@RequestParam Long idJ ,Model model)
{ Panier p=null;
p=(Panier) model.asMap().get("panier");
p.deleteItem(idJ);
model.addAttribute("categories", metier.listCategories());
model.addAttribute("jouets", metier.JouetsSelectionnes());
	return "index";}

@RequestMapping(value="/validateCommande")
public String passer_commande(Model model){
	Panier p=(Panier) model.asMap().get("panier");
	
	for (ArticlePanier art : p.getArticles()) {
		 metier.valide_commande(art.getjouet().getIdJouet(),art.getQuantite());
	}
	p.clear();
	model.addAttribute("categories", metier.listCategories());
	model.addAttribute("jouets", metier.JouetsSelectionnes());
return "index";} 
}
