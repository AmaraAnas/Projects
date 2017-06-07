<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 30/06/2016
 * Time: 12:50
 */
class ProduitController extends Controller
{
    /**
     * ProduitController constructor.
     */
    public function bridge($s)
    { $i = 0;
        $langue = new Langue();
        $table = array();
        $this->viewData['listLangues'] = $langue->lisLangues();
        if ($s==0){
            foreach ( $this->viewData['listLangues'] as $lang) : {
                $table[$i] = "lib".$lang["code"];
                $i++;
            }
            endforeach;}
        else if ($s==1) {
            foreach ( $this->viewData['listLangues'] as $lang) : {
                $table[$i] = "desc".$lang["code"];
                $i++;
            }
            endforeach;
        }

        return $table;
    }

    public function index(){
    $produit = new Produit();
    //met dans viewData une liste des produits
    $this->viewData['listProduit'] = $produit->listProduit();
    $langue = new Langue();
    $this->viewData['listLangues'] = $langue->lisLangues();
    $categorie = new Categorie();
    $this->viewData['listCategorie'] = $categorie->listCategorie();
    $details = new Prod_details();
    $this->viewData['listdetailsproduits'] = $details->listdetailsproduits();
    $photo = new Photo();
    $this->viewData['listPhoto'] = $photo->listPhoto();
    $this->View(__FUNCTION__);
}
    public function produits_grille(){
    $produit = new Produit();
    //met dans viewData une liste des produits
    $this->viewData['listProduit'] = $produit->listProduit();
    $langue = new Langue();
    $this->viewData['listLangues'] = $langue->lisLangues();
    $categorie = new Categorie();
    $this->viewData['listCategorie'] = $categorie->listCategorie();
    $details = new Prod_details();
    $this->viewData['listdetailsproduits'] = $details->listdetailsproduits();
    $photo = new Photo();
    $this->viewData['listPhoto'] = $photo->listPhoto();
    $this->View(__FUNCTION__);
}
    public function produits_list(){
    $produit = new Produit();
    //met dans viewData une liste des produits
    $this->viewData['listProduit'] = $produit->listProduit();
    $langue = new Langue();
    $this->viewData['listLangues'] = $langue->lisLangues();
    $categorie = new Categorie();
    $this->viewData['listCategorie'] = $categorie->listCategorie();
    $details = new Prod_details();
    $this->viewData['listdetailsproduits'] = $details->listdetailsproduits();
    $photo = new Photo();
    $this->viewData['listPhoto'] = $photo->listPhoto();
    $this->View(__FUNCTION__);
}
public function produits_details(){
    $produit = new Produit();
    //met dans viewData une liste des produits
    $this->viewData['listProduit'] = $produit->listProduit();
    $langue = new Langue();
    $this->viewData['listLangues'] = $langue->lisLangues();
    $categorie = new Categorie();
    $this->viewData['listCategorie'] = $categorie->listCategorie();
    $details = new Prod_details();
    $this->viewData['listdetailsproduits'] = $details->listdetailsproduits();
    $photo = new Photo();
    $this->viewData['listPhoto'] = $photo->listPhoto();
    $this->View(__FUNCTION__);
}

    //Action :ajouter
    public function ajouter(){
        $produit = new Produit();
        $photo1 = new photo();
        $photo2 = new photo();
        $photo3 = new photo();
        $photo4 = new photo();
        $photo5 = new photo();

        $this->viewData['produit'] = $produit;
        $langue = new Langue();
        $this->viewData['listLangues'] = $langue->lisLangues();
        $categorie = new Categorie();
        $this->viewData['listCategorie'] = $categorie->listCategorie();

        $tab = array();
        $name = "";
        $descrip = "";
        $sep = "#bis#";
        $tab = $this->bridge(0);
        $list = $this->bridge(1);
        foreach ($tab as $nom ) : {
                if (isset($_POST[$nom]))
                {
                    $name =   $name.$sep.$_POST[$nom];
              }
            }
            endforeach;

        foreach ($list as $desc ) : {
            if (isset($_POST[$desc]))
            {
                $descrip =   $descrip.$sep.$_POST[$desc];
            }
        }
             endforeach;

        if(!isset($_POST[$tab[1]]))
            $this->View(__FUNCTION__);
        else{
            $produit->setNom($name);
            $produit->AddModelError("nom", " * Erreur Nom" );
            $produit->setDescription($descrip);
            $produit->AddModelError("description", " * Erreur description");
            $produit->setEnNew($_POST['en_new']);
            $produit->AddModelError("en_new", " * Erreur en_new");
            $produit->setEnTop($_POST['en_top']);
            $produit->AddModelError("en_top", " * Erreur en_top");
            $produit->setEnVedette($_POST['en_vedette']);
            $produit->AddModelError("en_vedette", " * Erreur en_vedette");
            $produit->setPromotion($_POST['promotion']);
            $produit->AddModelError("promotion", " * Erreur promotion");
            $produit->setCategorieId($_POST['categorie']);

            //Validation des données.
            if($produit->IsValid()){
               $var =$produit->add();
                $photo1->setPhoto($_POST['photo1']);
                $photo2->setPhoto($_POST['photo2']);
                $photo3->setPhoto($_POST['photo3']);
                $photo4->setPhoto($_POST['photo4']);
                $photo5->setPhoto($_POST['photo5']);
                $photo1->setIdProd($var);
                $photo2->setIdProd($var);
                $photo3->setIdProd($var);
                $photo4->setIdProd($var);
                $photo5->setIdProd($var);
                if($photo1->IsValid() && $photo2->IsValid()  && $photo3->IsValid()  && $photo4->IsValid()  && $photo5->IsValid() ){
                    $photo1->add();
                    $photo2->add();
                    $photo3->add();
                    $photo4->add();
                    $photo5->add();
                }else
                    $this->View(__FUNCTION__);


                //rederiction vers index.phtml
            // $this->RederictAction("Produit");
                die("<script>location.href = '?controler=Prod_details&action=ajouter&id=$var'</script>");
            }else
                $this->View(__FUNCTION__);
        }
    }
    //Action : Modifier
    public function modifier($id){
        $produit = new Produit();
        $current = $produit->findProduit($id);
        $this->viewData['produit'] = $current;
        $langue = new Langue();
        $this->viewData['listLangues'] = $langue->lisLangues();
        $categorie = new Categorie();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        $sep = "#bis#";

        $listname = explode($sep,$current->getNom());
        $listdesc = explode($sep,$current->getDescription());

        $this->viewData['listName'] = $listname;
        $this->viewData['listDesc'] = $listdesc;

        $tab = array();
        $name = "";
        $descrip = "";

        $tab = $this->bridge(0);
        $list = $this->bridge(1);
        foreach ($tab as $nom ) : {
            if (isset($_POST[$nom]))
            {
                $name =   $name.$sep.$_POST[$nom];
            }
        }
        endforeach;

        foreach ($list as $desc ) : {
            if (isset($_POST[$desc]))
            {
                $descrip =   $descrip.$sep.$_POST[$desc];
            }
        }
        endforeach;
        echo $descrip;
        var_dump($list);
        //$list = explode($sep, $name);


        if(!isset($_POST[$tab[0]]))
            $this->View(__FUNCTION__);
        else{
            $produit->setNom($name);
            $produit->AddModelError("nom", " * Erreur Nom" );
            $produit->setQuantiteStock($_POST['quantite_stock']);
            $produit->AddModelError("quantite_stock", " * Erreur quantite stockée");
            $produit->setDescription($descrip);
            $produit->AddModelError("description", " * Erreur description");
            $produit->setEnNew($_POST['en_new']);
            $produit->AddModelError("en_new", " * Erreur en_new");
            $produit->setEnTop($_POST['en_top']);
            $produit->AddModelError("en_top", " * Erreur en_top");
            $produit->setEnVedette($_POST['en_vedette']);
            $produit->AddModelError("en_vedette", " * Erreur en_vedette");
            $produit->setPromotion($_POST['promotion']);
            $produit->AddModelError("promotion", " * Erreur promotion");
            $produit->setCategorieId($_POST['categorie']);
            //Validation des données.
            if($produit->IsValid()){
                $produit->update($id);

                //rederiction vers index.phtml
             $this->RederictAction("Produit");
            }else
                $this->View( __FUNCTION__);
        }
    }
    //Action : Supprimer
    public function supprimer($id){
        $produit = new Produit();
        $this->viewData['produit'] = $produit->findProduit($id);
        $categorie = new Categorie();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        if(isset($_POST['produit_id'])){
            $produit->delete($id);
            //rederiction vers index.phtml
            $this->RederictAction("Produit");
        }
        $this->View(__FUNCTION__);
    }



}