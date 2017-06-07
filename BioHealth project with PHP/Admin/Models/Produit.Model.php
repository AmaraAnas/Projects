<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 12:20
 */
class Produit extends Model
{
    private $produit_id;
    private $nom;
    private $quantite_stock;
    private $categorie_id;
    private $description;
    private $en_new;
    private $en_top;
    private $en_vedette;
    private $promotion;

    /**
     * @return mixed
     */
    public function getEnNew()
    {
        return $this->en_new;
    }

    /**
     * @param mixed $en_new
     */
    public function setEnNew($en_new)
    {
        $this->en_new = $en_new;
    }

    /**
     * @return mixed
     */
    public function getEnTop()
    {
        return $this->en_top;
    }

    /**
     * @param mixed $en_top
     */
    public function setEnTop($en_top)
    {
        $this->en_top = $en_top;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getEnVedette()
    {
        return $this->en_vedette;
    }

    /**
     * @param mixed $en_vedette
     */
    public function setEnVedette($en_vedette)
    {
        $this->en_vedette = $en_vedette;
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

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getQuantiteStock()
    {
        return $this->quantite_stock;
    }

    /**
     * @param mixed $quantite_stock
     */
    public function setQuantiteStock($quantite_stock)
    {
        $this->quantite_stock = $quantite_stock;
    }

    /**
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function add(){
        $rqt = 'INSERT INTO produit (nom,categorie_id,description,en_new,en_top,en_vedette,promotion)
 VALUES
  ("'.$this->nom.'","'.$this->categorie_id .'","'.$this->description .'","'.$this->en_new .'","'.$this->en_top .'","'.$this->en_vedette .'","'.$this->promotion .'")';
        mysql_query($rqt);
        $UID=mysql_insert_id();
        return  $UID;
    }
    public function update($id){
        $rqt = 'UPDATE produit SET nom="'.$this->nom.'", categorie_id="'.$this->categorie_id.'", description="'.$this->description.'",  en_new="'.$this->en_new.'", en_top="'.$this->en_top.'", en_vedette="'.$this->en_vedette.'",  promotion="'.$this->promotion.'" WHERE produit_id="'.$id.'"';
        mysql_query($rqt);

    }
    public function delete($id){
        $rqt = 'DELETE FROM produit  WHERE produit_id='.$id;
        mysql_query($rqt);
    }
    public function listProduit(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM produit");
        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }
    public function findProduit($id){
        $rqt = mysql_query("SELECT * FROM produit  WHERE produit_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->produit_id = $data["produit_id"];
            $this->nom = $data["nom"];
            $this->quantite_stock = $data["quantite_stock"];
            $this->categorie_id = $data["categorie_id"];
            $this->description = $data["description"];
            $this->en_new = $data["en_new"];
            $this->en_top = $data["en_top"];
            $this->en_vedette = $data["en_vedette"];
            $this->promotion = $data["promotion"];


        }
        return $this;
    }
   /* public function setPhotos($id){
        $rqt = 'INSERT INTO photo (photo,id_prod) VALUES ("'.$this->photo.'","'.$id .'")';
        mysql_query($rqt);
    }
    public function getPhotos($id){

            $tab = array();
            $rqt = 'SELECT 	photo FROM 	photo WHERE produit_id='.$id;
            mysql_query($rqt);
        if(mysql_fetch_assoc($rqt)){
            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;
        }
        return $tab;
    }*/





}