<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 10:48
 */
class Ligne_commande extends Model
{
    private $ligne_commande_id;
    private $quantite;
    private $commande_id;
    private $produit_id;

    /**
     * @return mixed
     */
    public function getLigneCommandeId()
    {
        return $this->ligne_commande_id;
    }

    /**
     * @param mixed $ligne_commande_id
     */
    public function setLigneCommandeId($ligne_commande_id)
    {
        $this->ligne_commande_id = $ligne_commande_id;
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
    public function getProduitId()
    {
        return $this->produit_id;
    }

    /**
     * @param mixed $produit_id
     */
    public function setProduitId($produit_id)
    {
        $this->produit_id = $produit_id;
    }


    public function add(){
        $rqt = 'INSERT INTO ligne_commande (quantite,commande_id,produit_id)
 VALUES ("'.$this->quantite.'","'.$this->commande_id .'","'.$this->produit_id.'")';
        mysql_query($rqt);
    }
    public function listCommande(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM ligne_commande");
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }
    public function findLigne_Commande($id){
        $rqt = mysql_query("SELECT * FROM ligne_commande  WHERE ligne_commande_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->ligne_commande_id = $data["ligne_commande_id"];
            $this->quantite = $data["quantite"];
            $this->commande_id = $data["commande_id"];
            $this->produit_id = $data["produit_id"];
        }
        return $this;
    }
    public function Produits_commandes($id){
        $rqt = mysql_query("SELECT produit_id FROM ligne_commande  WHERE commande_id=".$id);
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }


}