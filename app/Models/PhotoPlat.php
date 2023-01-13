<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPlat extends Model
{
    use HasFactory;

    protected $table ='photo_plat';
    protected $primarykey ='id';

        // Cette methode permet de récuperer le plat
        // @return Plat
    public function plat()
    {  
        // belongsto (= appartient à) veut dire que pour avoir la photo avec le numero xx,
        // il faut aller voir la table plat
        // a noter que Plat avec P majuscule est une classe
        return $this->belongsTo(Plat::class);
    }

}
