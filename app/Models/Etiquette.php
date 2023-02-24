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
        return $this->hasMany(Plat::class);
    }

   // Cette fonction permet de récupérer les plats dans l'ordre Alpha des Noms
// @return Plat
  public function platsSortedByNom()
  {
     return $this->hasMany(Plat::class)
     ->orderBy('nom', 'asc')
     // possible d'ajouter aussi ordre de prix
     ;
  }
  
// Cette fonction permet de récupérer les plats dans l'ordre de Prix
// @return Plat

public function platsSortedByPrix()
   {
      return $this->hasMany(Plat::class)
      ->orderBy('prix', 'asc')
      // possible d'ajouter aussi un ordre de prix
      ;
   }
}
