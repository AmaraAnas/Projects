<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 14/07/2016
 * Time: 10:19
 */
class CategorieController extends Controller
{
    public function index(){
        $categorie = new Categorie();
        //met dans viewData une liste des produits
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        $langue = new Langue();
        $this->viewData['listLangues'] = $langue->lisLangues();
        $this->View(__FUNCTION__);
    }
    //Action :ajouter
    public function ajouter(){
        $categorie = new Categorie();
        $this->viewData['categorie'] = $categorie;
        $langue = new Langue();
        $this->viewData['listLangues'] = $langue->lisLangues();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */
        $tab = array();
        $name = "";
        $sep = "#bis#";
        $i = 0 ;
        foreach ( $this->viewData['listLangues'] as $lang) : {
            $tab[$i] = "cat".$lang["code"];
            $i++;
        }
        endforeach;
        foreach ($tab as $cat ) : {
            if (isset($_POST[$cat]))
            {
                $name =   $name.$sep.$_POST[$cat];
            }
        }
        endforeach;

        //$list = explode($sep, $name);

        if(!isset($_POST[$tab[1]]))
            $this->View(__FUNCTION__);
        else{
            $categorie->setLibelle($name);
            $categorie->AddModelError("libelle", " * Erreur libelle");
            $categorie->setIdParent($_POST['id_parent']);
            //Validation des données.
            if($categorie->IsValid()){
                $categorie->add();
                //rederiction vers index.phtml
                $this->RederictAction("Categorie");
            }else
                $this->View(__FUNCTION__);
        }
    }

    //Action : Modifier
    public function modifier($id){
        $categorie = new Categorie();
        $current = $categorie->findCategorie($id);
        $this->viewData['categorie'] = $current;
        $langue = new Langue();
        $this->viewData['listLangues'] = $langue->lisLangues();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */
        $tab = array();
        $name = "";
        $sep = "#bis#";
        $listname = explode($sep,$current->getLibelle());
        $this->viewData['listName'] = $listname;
        $i = 0 ;
        foreach ( $this->viewData['listLangues'] as $lang) : {
            $tab[$i] = "cat".$lang["code"];
            $i++;
        }
        endforeach;
        foreach ($tab as $cat ) : {
            if (isset($_POST[$cat]))
            {
                $name =   $name.$sep.$_POST[$cat];
            }
        }
        endforeach;

        //$list = explode($sep, $name);

        if(!isset($_POST[$tab[1]]))
            $this->View(__FUNCTION__);
        else{
            $categorie->setLibelle($name);
            $categorie->AddModelError("libelle", " * Erreur libelle");
            $categorie->setIdParent($_POST['id_parent']);
            //Validation des données.
            if($categorie->IsValid()){
            $categorie->update($id);
                //rederiction vers index.phtml
              $this->RederictAction("Categorie");
            }else
                $this->View( __FUNCTION__);
        }
    }
    //Action : Supprimer
    public function supprimer($id){
        $categorie = new Categorie();
        $this->viewData['categorie'] = $categorie->findCategorie($id);
        $current = $categorie->findCategorie($id);
        $this->viewData['categorie'] = $current;
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        if(isset($_POST['categorie_id'])){
            $categorie->delete($id);
            //rederiction vers index.phtml
            $this->RederictAction("Categorie");
        }

        $this->View(__FUNCTION__);
    }


}