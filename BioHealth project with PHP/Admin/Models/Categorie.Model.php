<?php
	require_once('Model.Model.php');
class Categorie extends Model
{
    private $categorie_id;
    private $libelle;
    private $id_parent;

    /**
     * @return mixed
     */
    public function getIdParent()
    {
        return $this->id_parent;
    }

    /**
     * @param mixed $id_parent
     */
    public function setIdParent($id_parent)
    {
        $this->id_parent = $id_parent;
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

    public function add(){
        $rqt = 'INSERT INTO categorie (libelle,id_parent) VALUES ("'.$this->libelle.'","'.$this->id_parent .'")';
        mysql_query($rqt);
    }
    public function update($id){
        $rqt = 'UPDATE categorie SET libelle="'.$this->libelle.'",id_parent="'.$this->id_parent.'" WHERE categorie_id="'.$id.'"';
        mysql_query($rqt);
    }
    public function delete($id){
        $rqt = 'DELETE FROM categorie  WHERE categorie_id='.$id;
        mysql_query($rqt);
    }
    public function listCategorie(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM categorie");

            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;

        return $tab;
    }

    public function count(){

        $retour_total=mysql_query('SELECT COUNT(*) AS total FROM categorie'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
        return $donnees_total['total'];

    }
    public function findCategorie($id){
        $rqt = mysql_query("SELECT * FROM categorie  WHERE categorie_id=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->categorie_id = $data["categorie_id"];
            $this->libelle = $data["libelle"];
            $this->id_parent = $data["id_parent"];
        }
        return $this;
    }

}