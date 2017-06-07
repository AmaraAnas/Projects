<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 10:48
 */
class Commande extends Model
{

    private $commande_id;
    private $date_commande;
    private $client_id;
    private $total;

    /**
     * @return mixed
     */
    public function getCommandeId()
    {
        return $this->commande_id;
    }

    /**
     * @param mixed $commande_id
     */
    public function setCommandeId($commande_id)
    {
        $this->commande_id = $commande_id;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->date_commande;
    }

    /**
     * @param mixed $date_commande
     */
    public function setDateCommande($date_commande)
    {
        $this->date_commande = $date_commande;
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }



    public function add(){
        $rqt = 'INSERT INTO commande (date_commande,client_id,total)
 VALUES ("'.$this->date_commande.'","'.$this->client_id .'","'.$this->total.'")';
        mysql_query($rqt);
    }

    public function listCommande(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM commande");
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }
    public function findCommande($id){
        $rqt = mysql_query("SELECT * FROM commande  WHERE commande_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->commande_id = $data["commande_id"];
            $this->date_commande = $data["date_commande"];
            $this->client_id = $data["client_id"];
            $this->total = $data["total"];
        }
        return $this;
    }
    public function UserCommande($id){
        $rqt = mysql_query("SELECT * FROM commande  WHERE client_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->commande_id = $data["commande_id"];
            $this->date_commande = $data["date_commande"];
            $this->total = $data["total"];
        }
        return $this;
    }





}