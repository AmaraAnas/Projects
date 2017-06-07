<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 01/07/2016
 * Time: 09:30
 */
class Ville extends Model
{
    private $ville_id;
    private $libelle;
    private $pays_id;

    /**
     * @return array
     */
    public function getErrorAttribut()
    {
        return $this->ErrorAttribut;
    }

    /**
     * @param array $ErrorAttribut
     */
    public function setErrorAttribut($ErrorAttribut)
    {
        $this->ErrorAttribut = $ErrorAttribut;
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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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

    public function listVille(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM Ville");
        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }

    public  function  Ville_par_pays($id){

        $tab = array();
        $rqt = 'SELECT 	libelle FROM Ville WHERE ville_id='.$id;
        mysql_query($rqt);
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }
}