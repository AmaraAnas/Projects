<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 02/08/2016
 * Time: 09:27
 */
class Prod_detailsController  extends Controller
{
    public function index($id){
        $prod_details = new Prod_details();
        //met dans viewData une liste des produits
        $this->viewData['id_prod'] = $id;
        $produit = new Produit();
        $categorie= new Categorie();
        $this->viewData['listCategorie'] = $categorie->listCategorie();
        $photo = new Photo();
        $this->viewData['produit'] = $produit->findProduit($id);
        $this->viewData['photo'] = $photo->list_Photo_Produit($id);

        $this->viewData['prod_details'] = $prod_details->list_DetailsProduit($id);
        $this->viewData['id_prod'] = $id;
        $this->View(__FUNCTION__);
    }
    //Action :ajouter
    public function ajouter($id){
        $prod_details = new Prod_details();
        $this->viewData['prod_details'] = $prod_details;
        $this->viewData['id_prod'] = $id;



        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */

        //$list = explode($sep, $name);

        if(!isset($_POST['poids']))
            $this->View(__FUNCTION__);
        else{
            $prod_details->setIdProd($id);
            $prod_details->AddModelError("id_prod", " * Erreur poids");
            $prod_details->setPoids($_POST['poids']);
            $prod_details->AddModelError("poids", " * Erreur poids");
            $prod_details->setPrix($_POST['prix']);
            $prod_details->AddModelError("prix", " * Erreur prix");
            $prod_details->setQuantite($_POST['quantite']);
            $prod_details->AddModelError("quantite", " * Erreur quantite");

            //Validation des données.
            if($prod_details->IsValid()){
                $prod_details->add();
                //rederiction vers index.phtml
                $this->View(__FUNCTION__);
            }else
                $this->View(__FUNCTION__);
        }
    }
    //Action : Modifier
    public function modifier($id){
        $prod_details = new Prod_details();
        $this->viewData['prod_details'] = $prod_details->findDetails($id);

        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */

        //$list = explode($sep, $name);

        if(!isset($_POST['poids']))
            $this->View(__FUNCTION__);
        else{

            $prod_details->setPoids($_POST['poids']);
            $prod_details->AddModelError("poids", " * Erreur poids");
            $prod_details->setPrix($_POST['prix']);
            $prod_details->AddModelError("prix", " * Erreur prix");
            $prod_details->setQuantite($_POST['quantite']);
            $prod_details->AddModelError("quantite", " * Erreur quantite");

            //Validation des données.
            if($prod_details->IsValid()){
                var_dump($prod_details);
                $prod_details->update($id);
                $var=$this->viewData['prod_details']->getIdProd();
                die("<script>location.href = ' ?controler=Prod_details&action=index&id=$var'</script>");
            }else
                $this->View( __FUNCTION__);
        }
    }
    //Action : Supprimer
    public function supprimer($id){
        $prod_details = new Prod_details();
        $this->viewData['prod_details'] = $prod_details->findDetails($id);

        if(isset($_POST['id_details'])){
            $prod_details->delete($id);
            $var=$this->viewData['prod_details']->getIdProd();
            die("<script>location.href = ' ?controler=Prod_details&action=index&id=$var'</script>");



        }
        $this->View(__FUNCTION__);
    }






}