<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 01/08/2016
 * Time: 10:18
 */
class Prod_details  extends Model
{
    private $id_details;
    private $id_prod;
    private $poids;
    private $quantite;
    private $prix;

    /**
     * @return mixed
     */
    public function getIdDetails()
    {
        return $this->id_details;
    }

    /**
     * @param mixed $id_details
     */
    public function setIdDetails($id_details)
    {
        $this->id_details = $id_details;
    }

    /**
     * @return mixed
     */
    public function getIdProd()
    {
        return $this->id_prod;
    }

    /**
     * @param mixed $id_prod
     */
    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }

    /**
     * @return mixed
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function add(){
        $rqt = 'INSERT INTO prod_details (id_prod,poids,quantite,prix)
       VALUES ("'.$this->id_prod.'","'.$this->poids .'","'.$this->quantite .'","'.$this->prix .'")';
        mysql_query($rqt);
    }
    public function update($id){
        $rqt = 'UPDATE prod_details SET poids="'.$this->poids.'" , quantite="'.$this->quantite.'", prix="'.$this->prix.'" WHERE id_details="'.$id.'"';
        mysql_query($rqt);
    }
    public function delete($id){
        $rqt = 'DELETE FROM prod_details  WHERE id_details='.$id;
        mysql_query($rqt);
    }
    public function findDetails($id){
        $rqt = mysql_query("SELECT * FROM prod_details  WHERE id_details=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->id_details = $data["id_details"];
            $this->id_prod = $data["id_prod"];
            $this->poids = $data["poids"];
            $this->quantite = $data["quantite"];
            $this->prix = $data["prix"];
        }
        return $this;
    }
    public function list_DetailsProduit($id){
        $tab = array();
        $request ='SELECT * FROM prod_details WHERE id_prod='.$id ;
        $rqt = mysql_query($request);
        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }






}