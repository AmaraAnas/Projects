<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 10:48
 */
class Client extends Model
{

    private $client_id;
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $street;
    private $zip;
    private $phone;
    private $pays_id;
    private $ville_id;
    private $pseudo;
    private $avatar;
    private $active;

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getVilleId()
    {
        return $this->ville_id;
    }

    /**
     * @param mixed $ville_id
     */
    public function setVilleId($ville_id)
    {
        $this->ville_id = $ville_id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getPaysId()
    {
        return $this->pays_id;
    }

    /**
     * @param mixed $pays_id
     */
    public function setPaysId($pays_id)
    {
        $this->pays_id = $pays_id;
    }



    public function add(){
        $rqt = 'INSERT INTO client (email,password,first_name,last_name,street,zip,phone,ville_id,pseudo,avatar,active,pays_id)
 VALUES ("'.$this->email.'","'.$this->password .'","'.$this->first_name .'","'.$this->last_name .'","'.$this->street .'","'.$this->zip .'","'.$this->phone .'","'.$this->ville_id .'","'.$this->pseudo .'","'.$this->avatar .'","'.$this->active .'","'.$this->pays_id .'")';
        mysql_query($rqt);
    }
    public function update($id){
        $rqt = 'UPDATE client SET email="'.$this->email.'" password="'.$this->password.'"  first_name="'.$this->first_name.'" last_name="'.$this->last_name.'"  street="'.$this->street.'"  zip="'.$this->zip.'" phone="'.$this->phone.'" ville_id="'.$this->ville_id.'"  pseudo="'.$this->pseudo.'"  avatar="'.$this->avatar.'"  active="'.$this->active.'" pays_id="'.$this->pays_id.'" WHERE client_id="'.$id.'"';
        mysql_query($rqt);
    }
    public function delete($id){
        $rqt = 'DELETE FROM client  WHERE client_id='.$id;
        mysql_query($rqt);
    }
    public function listClient(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM client");

            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
                return $tab;
    }
    public function findClient($id){
        $rqt = mysql_query("SELECT * FROM client  WHERE client_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->client_id = $data["client_id"];
            $this->email = $data["email"];
            $this->password = $data["password"];
            $this->first_name = $data["first_name"];
            $this->last_name = $data["last_name"];
            $this->street = $data["street"];
            $this->zip = $data["zip"];
            $this->phone = $data["phone"];
            $this->ville_id = $data["ville_id"];
            $this->pseudo = $data["pseudo"];
            $this->avatar = $data["avatar"];
            $this->active = $data["active"];
            $this->pays_id = $data["pays_id"];

        }
        return $this;
    }





}