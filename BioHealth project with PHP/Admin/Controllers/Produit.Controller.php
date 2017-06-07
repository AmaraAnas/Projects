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
            if(isset($_POST['en_new']))
                $produit->setEnNew($_POST['en_new']);
            else  $produit->setEnNew(0);
            $produit->AddModelError("en_new", " * Erreur en_new");
            if(isset($_POST['en_top']))
                $produit->setEnTop($_POST['en_top']);
            else  $produit->setEnTop(0);
            $produit->AddModelError("en_top", " * Erreur en_top");
            if(isset($_POST['en_vedette']))
                $produit->setEnVedette($_POST['en_vedette']);
            else  $produit->setEnVedette(0);
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
        $photo = new Photo();
        $list = $photo->list_Photo_Produit($id);


        $photo1 = new Photo();
        $photo2 = new Photo();
        $photo3 = new Photo();
        $photo4 = new Photo();
        $photo5 = new Photo();

        $photo1 = $photo1->findPhoto($list[0]['id_photo']);
        $this->viewData['photo1'] = $photo1 ;

        $photo2 = $photo2->findPhoto($list[1]['id_photo']);
        $this->viewData['photo2'] = $photo2;

        $photo3 = $photo3->findPhoto($list[2]['id_photo']);
        $this->viewData['photo3']= $photo3;

        $photo4 = $photo4->findPhoto($list[3]['id_photo']);
        $this->viewData['photo4'] = $photo4;

        $photo5 = $photo5->findPhoto($list[4]['id_photo']);
        $this->viewData['photo5']= $photo5;

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
            $produit->setDescription($descrip);
            $produit->AddModelError("description", " * Erreur description");
            if(isset($_POST['en_new']))
            $produit->setEnNew($_POST['en_new']);
            else  $produit->setEnNew(0);
            $produit->AddModelError("en_new", " * Erreur en_new");
            if(isset($_POST['en_top']))
            $produit->setEnTop($_POST['en_top']);
            else  $produit->setEnTop(0);
            $produit->AddModelError("en_top", " * Erreur en_top");
            if(isset($_POST['en_vedette']))
            $produit->setEnVedette($_POST['en_vedette']);
            else  $produit->setEnVedette(0);
            $produit->AddModelError("en_vedette", " * Erreur en_vedette");
            $produit->setPromotion($_POST['promotion']);
            $produit->AddModelError("promotion", " * Erreur promotion");
            $produit->setCategorieId($_POST['categorie']);
            //Validation des données.
            if($produit->IsValid()){
                $produit->update($id);
                $photo1->setPhoto($_POST['photo1']);
                $photo2->setPhoto($_POST['photo2']);
                $photo3->setPhoto($_POST['photo3']);
                $photo4->setPhoto($_POST['photo4']);
                $photo5->setPhoto($_POST['photo5']);
                if($photo1->IsValid() && $photo2->IsValid()  && $photo3->IsValid()  && $photo4->IsValid()  && $photo5->IsValid() ){
                    if(isset($_POST['photo1']) && $_POST['photo1']!="")
                    $photo1->update($photo1->getIdPhoto());
                    if(isset($_POST['photo2']) && $_POST['photo2']!="")
                    $photo2->update($photo2->getIdPhoto());
                    if(isset($_POST['photo3']) && $_POST['photo3']!="")
                    $photo3->update($photo3->getIdPhoto());
                    if(isset($_POST['photo4']) && $_POST['photo4']!="")
                    $photo4->update($photo4->getIdPhoto());
                    if(isset($_POST['photo5']) && $_POST['photo5']!="")
                    $photo5->update($photo5->getIdPhoto());
                }else
                    $this->View(__FUNCTION__);
                //rederiction vers index.phtml
                die("<script>location.href = '?controler=Produit&page=1'</script>");
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
            die("<script>location.href = '?controler=Produit&page=1'</script>");
        }
        $this->View(__FUNCTION__);
    }



}