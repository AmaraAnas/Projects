<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: seif
 * Date: 11/07/2016
 * Time: 12:59
 */
class CfpController extends  Controller
{
    public function index()
    {
        $cpf = new cpf();
        $client = new Client();
        //met dans viewData une liste des produits
        $this->viewData['listClient'] = $client->listClient();
        $this->viewData['listCommande'] = $cpf->listCommande();
        $this->View(__FUNCTION__);
    }

    public function list_client()
    {
        $cpf = new cpf();
        $client = new Client();
        //met dans viewData une liste des produits
        $this->viewData['listClient'] = $client->listClient();
        $this->viewData['listCommande'] = $cpf->listCommande();
        $this->viewData['listFacture'] = $cpf->listFacture();
        $this->View(__FUNCTION__);
    }


    public function modifier($id)
    {
        $cpf = new cpf();
        $this->viewData['commande'] = $cpf->findCommande($id);
        $cpf = new cpf();
        $list = $cpf->listFacture();
        $this->viewData['erreur'] = "";
        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */

        //$list = explode($sep, $name);

        if (!isset($_POST['num_fact'])) {
            $this->View(__FUNCTION__);
        } else {
            $cpf->setCfpId($_POST['cfp_id']);
            $cpf->AddModelError("cfp_id", " * Erreur cfp_id");
            $cpf->setNumFact($_POST['num_fact']);
            $cpf->AddModelError("num_fact", " * Erreur num_fact");
            $cpf->setDateFact($_POST['date_fact']);
            $cpf->AddModelError("date_fact", " * Erreur date_fact");
            $cpf->setType(2);
            //Validation des données.
            if ($cpf->IsValid()) {
                if ($_POST['num_fact'] == "") {
                    $this->viewData['erreur'] = "Champ Invalid";
                    $this->View(__FUNCTION__);
                    die;
                }
                foreach ($list as $item) :
                    if ($_POST['num_fact'] == $item['num_fact']) {
                        $this->viewData['erreur'] = "Ce N° de facture existe déja";
                        $this->View(__FUNCTION__);
                        die;
                    }

                endforeach;

                $cpf->update($id);
                die("<script>location.href = '?controler=Cfp&page=1'</script>");

            } else
                $this->View(__FUNCTION__);
        }
    }



    public function details($id)
    {
        $cpf = new cpf();
        $this->viewData['commande'] = $cpf->findCommande($id);
        $client = new Client();
        $produit = new Produit();
        $this->viewData['listProduit'] = $produit->listProduit();
        //met dans viewData une liste des produits
        $this->viewData['listClient'] = $client->listClient();
        $this->viewData['listCommande'] = $cpf->listCommande();
        $ligne_comm = new Ligne_commande();
        $this->viewData['detailsComm'] = $ligne_comm->Produits_commandes($id);


        $this->View(__FUNCTION__);
    }



}

