<?php

namespace Database\Seeders;

use Faker;
use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Seeder appelé par seeders/DatabaseSeeder.php
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
            [
                'nom' => 'poulet',
                'description' => 'etiquette poulet',
            ],
            [
                'nom' => 'agneau',
                'description' => 'etiquette agneau',
            ],
        ];
       foreach ($etiquetteDatas as $etiquetteData) {
            // création d'un nouveau plat
            $etiquette = new Etiquette();
            // affectation d'un nom
            $etiquette->nom = $etiquetteData['nom'];
            // affectation d'une description
            $etiquette->description = $etiquetteData['description'];
           // sauvegarde dans la BDD
            $etiquette->save();
        }
        // $i étant un index
           for ($i =0; $i <4; $i++){
          // création d'un nouvelle etiquette
           $etiquette = new etiquette();
            // affectation d'un nom
            //true =je veux une chaine caracteres
           $etiquette->nom = $faker->words(2, true);
          // affectation d'une description
         $etiquette->description = $faker->words(2, true);
            
          $etiquette->save();
      }

    }

}