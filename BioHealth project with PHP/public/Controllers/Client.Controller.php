<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 01/07/2016
 * Time: 08:59
 */
class ClientController extends Controller
{
    public function index(){
        $client = new Client();
        //met dans viewData une liste des produits
        $this->viewData['listClient'] = $client->listClient();
        $pays = new Pays();
        $this->viewData['listPays'] = $pays->listPays();
        $ville = new Ville();
        $this->viewData['listVille'] =$ville->listVille();
        $this->View(__FUNCTION__);
    }
    //Action :ajouter
    public function inscription(){
        $client = new Client();
        $this->viewData['client'] = $client;
       
        $pays = new Pays();
        $this->viewData['listPays'] = $pays->listPays();
        $ville = new Ville();
        $this->viewData['listVille'] =$ville->listVille();
        /*Pour éviter que les message d'erreurs ne soient afficher au premier
        appel de la vue, on vérifier */
        if(!isset($_POST['email']))
        {
            $this->View(__FUNCTION__);
        }
        else{

            $client->setEmail($_POST['email']);
            $client->AddModelError("email", " * Erreur email");
            $client->setPassword($_POST['password']);
            $client->AddModelError("password", " * Erreur password");
            $client->setFirstName($_POST['first_name']);
            $client->AddModelError("first_name", " * Erreur first name");
            $client->setLastName($_POST['last_name']);
            $client->AddModelError("last_name", " * Erreur last name");
            $client->setStreet($_POST['street']);
            $client->AddModelError("street", " * Erreur street");
            $client->setZip($_POST['zip']);
            $client->AddModelError("zip", " * Erreur zip");
            $client->setPhone($_POST['phone']);
            $client->AddModelError("phone", " * Erreur phone");
            $client->setActive(1);
            $client->AddModelError("active", " * Erreur active");
            $client->setPseudo($_POST['pseudo']);
            $client->AddModelError("pseudo", " * Erreur pseudo");
            $client->setPaysId($_POST['pays']);
            $client->setVilleId($_POST['ville_id']);
            //Validation des données.
            if($client->IsValid()){
                $client->add();
                //rederiction vers index.phtml
                $this->RederictAction("Client");

            }else
                $this->View(__FUNCTION__);
        }
    }
    //Action : Modifier
    public function modifier($id){
        $client = new Client();
        $this->viewData['client'] = $client;
        $pays = new Pays();
        $this->viewData['listPays'] = $pays->listPays();
        $ville = new Ville();
        $this->viewData['listVille'] =$ville->Ville_par_pays($_POST['pays']);
        if(!isset($_POST['email']))
            $this->View(__FUNCTION__);
        else{
            $client->setEmail($_POST['email']);
            $client->AddModelError("email", " * Erreur email");
            $client->setPassword($_POST['password']);
            $client->AddModelError("password", " * Erreur password");
            $client->setFirstName($_POST['first_name']);
            $client->AddModelError("first_name", " * Erreur first name");
            $client->setLastName($_POST['last_name']);
            $client->AddModelError("last_name", " * Erreur last name");
            $client->setStreet($_POST['street']);
            $client->AddModelError("street", " * Erreur street");
            $client->setZip($_POST['zip']);
            $client->AddModelError("zip", " * Erreur zip");
            $client->setPhone($_POST['phone']);
            $client->AddModelError("phone", " * Erreur phone");
            $client->setActive($_POST['active']);
            $client->AddModelError("active", " * Erreur active");
            $client->setAvatar($_POST['avatar']);
            $client->AddModelError("avatar", " * Erreur phone");
            $client->setPseudo($_POST['pseudo']);
            $client->AddModelError("pseudo", " * Erreur pseudo");
            $client->setPaysId($_POST['pays']);
            $client->setVilleId($_POST['ville']);
            //Validation des données.
            if($client->IsValid()){
                $client->add();
                //rederiction vers index.phtml
                $this->RederictAction("Client");
            }else
                $this->View(__FUNCTION__);
        }
    }
    //Action : Supprimer
    public function supprimer($id){
        $client = new Client();
        $this->viewData['client'] = $client->findClient($id);
        $pays = new Pays();
        $this->viewData['listPays'] = $pays->listPays();
        $ville = new Ville();
        $this->viewData['listVille'] =$ville->listVille();
        if(isset($_POST['client_id'])){
            $client->delete($id);
            //rederiction vers index.phtml
            $this->RederictAction("Client");
        }
        $this->View(__FUNCTION__);
    }
}