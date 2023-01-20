<?php

namespace App\Models;

use App\models\Plat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
    use HasFactory;

    protected $table ='etiquette';
    protected $primarykey ='id';


    // Cette fonction permet recup de la collection de plats
    // pour signaler relation entre plat et etiquette
    //   @return collection
    public function plats()
    {
    return $this->belongsToMany(Plat::class); 
    }
}
