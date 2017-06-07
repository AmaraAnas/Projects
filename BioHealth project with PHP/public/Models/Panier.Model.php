<?php
require_once('Model.Model.php');
/**
 * Created by PhpStorm.
 * User: Anas Amara
 * Date: 20/06/2016
 * Time: 12:19
 */
class panier extends Model
{
    private $panier_id;
    private $user_id;
    private $product_id;
    private $Quantite;

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
    public function getPanierId()
    {
        return $this->panier_id;
    }

    /**
     * @param mixed $panier_id
     */
    public function setPanierId($panier_id)
    {
        $this->panier_id = $panier_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->Quantite;
    }

    /**
     * @param mixed $Quantite
     */
    public function setQuantite($Quantite)
    {
        $this->Quantite = $Quantite;
    }




}