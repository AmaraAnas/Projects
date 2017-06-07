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
        $this->viewData['admin'] = $admin;

        if(!isset($_POST["login"]))
            $this->View(__FUNCTION__);
        else{
            $admin->setLogin($_POST["login"]);
            $admin->AddModelError("login", " * Erreur login");
            $admin->setPassword(md5($_POST['password']));
            $admin->AddModelError("password", " * Erreur password");
            //Validation des données.
            if($admin->IsValid()){
                $admin->add();
                //rederiction vers index.phtml
                $this->RederictAction("Admin");
            }else
                $this->View(__FUNCTION__);
        }
    }

    //Action : Modifier
    public function modifier($id){
        $admin = new Admin();
        $this->viewData['admin'] = $admin->findAdmin($id);

    if(!isset($_POST["password_old"]))
        $this->View(__FUNCTION__);
    else{
        if ($admin->getPassword() == md5($_POST["password_old"])){

            $admin->setPassword(md5($_POST['password']));
            $admin->AddModelError("password", " * Erreur password");
            //Validation des données.
            if($admin->IsValid()){
                $admin->update($id);
                //rederiction vers index.phtml
                $this->RederictAction("Admin");
            }else
                $this->View( __FUNCTION__);
        }
        else

        {
            $this->View( __FUNCTION__);
            echo "ancien mot de passe est incorrect";
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





