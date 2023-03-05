<?php

namespace App\Models;

use App\models\Etiquette;
use App\models\Categorie;
use App\models\PhotoPlat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
   

    protected $table ='plat';
    protected $primarykey ='id';

     //--------------------------------//
    // Cette methode permet de récuperer la categorie
    // @return Categorie
    public function categorie()
    {
    // belongsto plutot que hasOne
    // Le cote possedant: une categorie possede des plats
    
    // le 17 Fev ligne d'origine
   // return $this->belongsTo(Categorie::class);

     // ajout categorie_id  effectué le 17 fev
    return $this->belongsTo(Categorie::class, 'categorie_id','id');
    }

     //--------------------------------//
    // Cette methode permet de récuperer la photo du plat
    // @return PhotoPlat
    public function photo()
    {
    return $this->belongsTo(PhotoPlat::class, 'photo_plat_id','id');
    }
    // Cette fonction permet recup de la collection d'etiquettes
    // pour signaler relation entre plat et etiquette
    //   @return collection 

     //--------------------------------//
    public function etiquettes()
    {
    
    //return $this->belongsToMany(Etiquette::class,'etiquette_plat','plat_id','etiquette_id'); 
    // meme resultat en suivant convention laravel
    return $this->belongsToMany(Etiquette::class);

    }
} 

