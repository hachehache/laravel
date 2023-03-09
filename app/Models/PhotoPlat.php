<?php

namespace App\Models;

// ----------A VERIFIER SI NECESSAIRE----------- ???//
use App\models\Plat;
use App\models\Categorie;
use App\models\Etiquette;
use App\models\PhotoPlat;
// ------------------------------------------------//

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPlat extends Model
{
    use HasFactory;
    protected $table ='photo_plat';
    protected $primarykey ='id';
    // POUR ASSOCIER LA PHOTO A LA CATEGORIE//
    // Cette methode permet de récuperer la categorie
    // @return Categorie
    // public function categorie()
//     {

//         // ajout
//      //$categories = Categorie::all();//

//     // belongsto plutot que hasOne
//     // Le cote possedant: une categorie possede des plats
//    // return $this->belongsTo(Categorie::class);//
//    // Modif
//         return $this->belongsTo(Categorie::class, 'categorie_id','id');
//     }

        // Cette methode permet de récuperer le plat
        // @return Plat
    public function plat()
    {  
        // belongsto (= appartient à) veut dire que pour avoir la photo avec le numero xx,
        // il faut aller voir la table plat
        // a noter que Plat avec P majuscule est une classe

        // on choisi la relation de la photo avec la categorie
       return $this->hasOne(Plat::class, 'photo_plat_id','id');
    }

}
