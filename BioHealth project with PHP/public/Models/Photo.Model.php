<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 09/08/2016
 * Time: 12:45
 */
class Photo extends Model
{
    private $id_photo;
    private $photo;
    private $id_prod;

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    /**
     * @param mixed $id_photo
     */
    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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



    public function add(){
        $rqt = 'INSERT INTO photo (photo,id_prod)
       VALUES ("'.$this->photo.'","'.$this->id_prod .'")';
        mysql_query($rqt);
    }
    public function update($id){
        $rqt = 'UPDATE photo SET photo="'.$this->photo.'" WHERE id_photo="'.$id.'"';
        mysql_query($rqt);
    }
    public function delete($id){
        $rqt = 'DELETE FROM photo  WHERE id_photo='.$id;
        mysql_query($rqt);
    }
    public function findDetails($id){
        $rqt = mysql_query("SELECT * FROM photo  WHERE id_photo=".$id);
        $data = mysql_fetch_assoc($rqt);
        if(count($data)>0){
            $this->id_photo = $data["id_photo"];
            $this->id_prod = $data["id_prod"];
            $this->photo = $data["photo"];
        }
        return $this;
    }
    public function list_Photo_Produit($id){
        $tab = array();
        $request ='SELECT * FROM photo WHERE id_prod='.$id ;
        $rqt = mysql_query($request);
        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }

    public function listPhoto()
    {
        $tab = array();
        $request ='SELECT * FROM photo' ;
        $rqt = mysql_query($request);
        while($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }

}