<?php
require_once('Controller.Controller.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 08/08/2016
 * Time: 09:44
 */
class AdminController extends Controller
{
    public function index(){
        $admin = new Admin();
        //met dans viewData une liste des produits
        $this->viewData['listAdmin'] = $admin->listAdmin();
        $this->View(__FUNCTION__);
    }
    //Action :ajouter
    public function ajouter(){
        $admin = new Admin();
        $admin1 = new Admin();
        $this->viewData['listAdmin'] = $admin1->listAdmin();
        $this->viewData['admin'] = $admin;
        $this->viewData['erreur'] = "";

        if(!isset($_POST["login"]))
            $this->View(__FUNCTION__);
        else{
            $admin->setLogin($_POST["login"]);
            $admin->AddModelError("login", " * Erreur login");
            $admin->setPassword(md5($_POST['password']));
            $admin->AddModelError("password", " * Erreur password");
            //Validation des données.
            if($admin->IsValid()){

                if ($_POST["login"]==""){
                    $this->viewData['erreur'] = "Champ Invalid";
                    $this->View(__FUNCTION__);
                    die;}

                foreach ( $this->viewData['listAdmin'] as $item) :
                    if ($_POST["login"] == $item["login"]) {
                        $this->viewData['erreur'] = "Ce Login existe déja";
                        $this->View(__FUNCTION__);
                        die;

                    }
                endforeach;
                $admin->add();
                //rederiction vers index.phtml
                die("<script>location.href = '?controler=Admin&page=1'</script>");
            }else
                $this->View(__FUNCTION__);
        }
    }

    //Action : Modifier
    public function modifier($id){
        $admin = new Admin();
        $this->viewData['admin'] = $admin->findAdmin($id);
        $this->viewData['erreur'] = "";

    if(!isset($_POST["password_old"]))
        $this->View(__FUNCTION__);
    else{
        if (($_POST["password_old"]=="") ||($_POST["password"]=="")) {
            $this->viewData['erreur'] = "Champ Invalid";
            $this->View(__FUNCTION__);

            die;}



        else if ($admin->getPassword() == md5($_POST["password_old"])){

            $admin->setPassword(md5($_POST['password']));
            $admin->AddModelError("password", " * Erreur password");
            //Validation des données.
            if($admin->IsValid()){

                $admin->update($id);
                //rederiction vers index.phtml
                die("<script>location.href = '?controler=Admin&page=1'</script>");}
            else
                $this->View( __FUNCTION__);}
        else

        {
            $this->viewData['erreur'] = "ancien mot de passe est incorrect";
            $this->View( __FUNCTION__);

        }


    }}
    //Action : Supprimer

/**
 * @param $id
 */
    public function supprimer($id){
    $admin = new Admin();
    $this->viewData['admin'] = $admin->findAdmin($id);

        if(isset($_POST['admin_id'])){
            $admin->delete($id);
            //rederiction vers index.phtml
            die("<script>location.href = 'deconnexion.php'</script>");

        }

        $this->View(__FUNCTION__);
    }
}





