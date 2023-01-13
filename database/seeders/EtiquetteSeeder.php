<?php

namespace Database\Seeders;

use Faker;
use App\Models\Etiquette;
use App\Models\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('fr_FR');

        $etiquetteDatas = [
            [
                'nom' => 'poisson',
                'description' => 'etiquette poisson',
            ],
            [
                'nom' => 'vegetarien',
                'description' => 'etiquette vegetarien',
            ],
            [
                'nom' => 'boeuf',
                'description' => 'etiquette boeuf',
            ],
        ];
       foreach ($etiquetteDatas as $etiquetteData) {
            // création d'un nouveau plat
            $etiquette = new Etiquette();
            // affectation d'un nom
            $etiquette->nom = $etiquetteData['nom'];
            // affectation d'une description
            $etiquette->description = $etiquetteData['description'];
           
            $etiquette->save();
        }
        // $i étant un index
    //    for ($i =0; $i <4; $i++){
    //        // création d'un nouvelle etiquette
    //       $etiquette = new etiquette();
    //        // affectation d'un nom
    //       $etiquette->nom = $faker->words();
    //       // affectation d'une description
    //       $etiquette->description = $faker->words();
            
      //     $etiquette->save();
     //   }


    }
}
