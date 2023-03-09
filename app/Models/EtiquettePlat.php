<?php

namespace App\Models;

use App\models\Plat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquettePlat extends Model
{
    use HasFactory;

    protected $table ='etiquette_plat';
    protected $primarykey ='id';


    // Cette fonction permet recup de la collection de plats
    // pour signaler relation entre plat et etiquette
    //   @return collection
    
// Cette fonction permet de récupérer les plats dans l'ordre de Prix
// @return Plat

}
