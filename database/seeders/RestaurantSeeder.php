<?php

namespace Database\Seeders;

use Faker;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $restaurantDatas = [
            [
                'cle' => 'adresse',
                'valeur' => $faker->address(),
            ],
            [
                'cle' => 'tel',
                'valeur' => $faker->phoneNumber(),
            ],
            [
                'cle' => 'map',
                'valeur' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2530.915690231355!2d3.0704043!3d50.628682999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d58d87da5f2d%3A0x739db98176c2b59d!2s5%20Bd%20Louis%20XIV%2C%2059800%20Lille!5e0!3m2!1sfr!2sfr!4v1673619826738!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
            [
                'cle' => 'horaire',
                'valeur' => '12h-14h/20h-00h',
            ],
        ];

        foreach ($restaurantDatas as $restaurantData) {
            // création d'une nouvelle catégorie
            $restaurant = new Restaurant();
            // affectation d'un nom
            $restaurant->cle = $restaurantData['cle'];
            // affectation d'une description
            $restaurant->valeur = $restaurantData['valeur'];
            // sauvegarde dans la BDD
            $restaurant->save();
        }

    }
}