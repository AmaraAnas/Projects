<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = "livre";
    protected $primaryKey = "livre_id";
    protected $fillable = ["nom","prix","quantite_stock","langue_id","type_id","image"];
    public $timestamps = false ;
}
