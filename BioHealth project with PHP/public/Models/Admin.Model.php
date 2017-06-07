<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 10:48
 */
class Admin extends Model
{

    private $admin_id;
    private $login;
    private $password;

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->admin_id;
    }

    /**
     * @param mixed $admin_id
     */
    public function setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function add(){
        $rqt = 'INSERT INTO admin (login,password) VALUES ("'.$this->login.'","'.$this->password .'")';
        mysql_query($rqt);
    }
    public function update($id){
        $rqt = 'UPDATE admin SET password="'.$this->password.'" WHERE admin_id="'.$id.'"';
        mysql_query($rqt);
    }
    public function delete($id){
        $rqt = 'DELETE FROM admin  WHERE admin_id='.$id;
        mysql_query($rqt);
    }
    public function listAdmin(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM admin");

        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;

        return $tab;
    }
    public function findAdmin($id){
        $rqt = mysql_query("SELECT * FROM admin  WHERE admin_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->admin_id = $data["admin_id"];
            $this->login = $data["login"];
            $this->password = $data["password"];
        }
        return $this;
    }







}