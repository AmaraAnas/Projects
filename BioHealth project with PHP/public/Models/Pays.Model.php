<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 12:20
 */
class Pays extends Model
{

    private $pays_id;
    private $pays;

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
    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    public function listPays(){
        $tab = array();
        $rqt = mysql_query("SELECT * FROM pays");

            while($data = mysql_fetch_assoc($rqt))
                $tab[] = $data;

        return $tab;
    }


}