<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: seif
 * Date: 11/07/2016
 * Time: 12:59
 */
class Commande extends  Controller
{	public function index(){
    $commande = new Commande();
    //met dans viewData une liste des produits
    $this->viewData['listCommande'] = $commande->listCommande();
    $this->View(__FUNCTION__);
}
    //Action :ajouter
    public function ajouter(){
        $produit = new Produit();
        $this->viewData['produit'] = $produit;
        $categorie = new Categorie();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */
        if(!isset($_POST['nom']))
            $this->View(__FUNCTION__);
        else{
            $produit->setNom($_POST['nom']);
            $produit->AddModelError("nom", " * Erreur Nom");
            $produit->setPrix($_POST['prix']);
            $produit->AddModelError("prix", " * Erreur Prix Unitaire");
            $produit->setQuantiteStock($_POST['quantite_stock']);
            $produit->AddModelError("quantite_stock", " * Erreur quantite stockée");
            $produit->setDescription($_POST['description']);
            $produit->AddModelError("description", " * Erreur description");
            $produit->setEnNew($_POST['new_list']);
            $produit->AddModelError("new_list", " * Erreur new_list");
            $produit->setEnTop($_POST['top_list']);
            $produit->AddModelError("top_list", " * Erreur top_list");
            $produit->setEnVedette($_POST['en_vedette']);
            $produit->AddModelError("en_vedette", " * Erreur en_vedette");
            $produit->setPromotion($_POST['promotion']);
            $produit->AddModelError("promotion", " * Erreur promotion");
            $produit->setCategorieId($_POST['categorie']);
            //Validation des données.
            if($produit->IsValid()){
                $produit->add();
                //rederiction vers index.phtml
                $this->RederictAction("Produit");
            }else
                $this->View(__FUNCTION__);
        }
    }



}