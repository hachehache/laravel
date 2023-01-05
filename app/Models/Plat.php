<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table ='plat';
    protected $primarykey ='id';

/**
 * Cette methode permet de récuperer la photo du plat
 * @return PhotoPlat
 */
public function photo()
{
    return $this->hasOne(PhotoPlat::class);
}
}
