<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 10:48
 */
class Cpf extends Model
{

    private $cfp_id;
    private $date_commande;
    private $date_fact;
    private $client_id;
    private $total;
    private $num_com;
    private $num_fact;
    private $type;

    /**
     * @return mixed
     */
    public function getCfpId()
    {
        return $this->cfp_id;
    }

    /**
     * @param mixed $cfp_id
     */
    public function setCfpId($cfp_id)
    {
        $this->cfp_id = $cfp_id;
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
    public function getDateFact()
    {
        return $this->date_fact;
    }

    /**
     * @param mixed $date_fact
     */
    public function setDateFact($date_fact)
    {
        $this->date_fact = $date_fact;
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

    /**
     * @return mixed
     */
    public function getNumCom()
    {
        return $this->num_com;
    }

    /**
     * @param mixed $num_com
     */
    public function setNumCom($num_com)
    {
        $this->num_com = $num_com;
    }

    /**
     * @return mixed
     */
    public function getNumFact()
    {
        return $this->num_fact;
    }

    /**
     * @param mixed $num_fact
     */
    public function setNumFact($num_fact)
    {
        $this->num_fact = $num_fact;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    public function add(){
        $rqt = 'INSERT INTO cpf (date_commande,client_id,total,num_com,num_fact,type,date_fact)
 VALUES ("'.$this->date_commande.'","'.$this->client_id .'","'.$this->total.'","'.$this->num_com.'","'.$this->num_fact.'","'.$this->type.'","'.$this->date_fact.'")';
        mysql_query($rqt);
    }

    public function listCommande(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM cfp WHERE type = 1 ");

            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;

        return $tab;
    }
    public function listFacture(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM cfp WHERE type = 2 ");

        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;

        return $tab;
    }
    public function findCommande($id){
        $rqt = mysql_query("SELECT * FROM cfp  WHERE cfp_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->cfp_id = $data["cfp_id"];
            $this->date_commande = $data["date_commande"];
            $this->client_id = $data["client_id"];
            $this->total = $data["total"];
            $this->num_com = $data["num_com"];
            $this->num_fact = $data["num_fact"];
            $this->type = $data["type"];
            $this->date_fact = $data["date_fact"];
        }
        return $this;
    }
    public function UserCommande($id){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM cfp  WHERE cfp_id=".$id);
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }
    public function update($id){
        $rqt = 'UPDATE cfp SET num_fact="'.$this->num_fact.'",date_fact="'.$this->date_fact.'",type="'.$this->type.'" WHERE cfp_id="'.$id.'"';
        mysql_query($rqt);
    }





}