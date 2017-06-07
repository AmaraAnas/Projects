<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: heni
 * Date: 20/07/2016
 * Time: 10:59
 */
class Langue extends Model
{

    private $id_lang;
    private $libelle;
    private $code;

    /**
     * @return mixed
     */
    public function getIdLang()
    {
        return $this->id_lang;
    }

    /**
     * @param mixed $id_lang
     */
    public function setIdLang($id_lang)
    {
        $this->id_lang = $id_lang;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


    public function lisLangues()
    {
        $tab = array();
        $rqt = mysql_query("SELECT * FROM langues");

        while ($data = mysql_fetch_assoc($rqt))
            $tab[] = $data;
        return $tab;
    }




}