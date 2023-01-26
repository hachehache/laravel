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

    // Cette methode permet de récuperer la categorie
    // @return Categorie
    public function categorie()
    {
    // belongsto plutot que hasOne
    // Le cote possedant: une categorie possede des plats
    return $this->belongsTo(Categorie::class);
    }
    // Cette methode permet de récuperer la photo du plat
    // @return PhotoPlat
    public function photo()
    {
    return $this->belongsToMany(PhotoPlat::class);
    }
    // Cette fonction permet recup de la collection d'etiquettes
    // pour signaler relation entre plat et etiquette
    //   @return collection 
    public function etiquettes()
    {
    return $this->belongsToMany(Etiquette::class); 
    }
} 

