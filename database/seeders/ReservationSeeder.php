<?php

namespace Database\Seeders;

use Faker;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
    
        //2 reservations avec données statiques
        $reservationDatas = [
            [
                'nom' => 'Foo',
                'prenom' => 'foo',
                'jour' => '2023-01-06',
                'heure' => '12:00',
                'nombre_de_personnes' => 8,
                'tel' => '06-07-08-09-10',
                'email' => 'foo.foo@example.com',
            ],
            [
                'nom' => 'Fou',
                'prenom' => 'fou',
                'jour' => '2023-01-15',
                'heure' => '13:00',
                'nombre_de_personnes' => 5,
                'tel' => '01-02-03-04-05',
                'email' => 'fou.fou@example.com',    
            ],
        ];
            
        // Foreach reservations avec données dynamique
        foreach ($reservationDatas as $reservationData) {
            // création d'une nouvelle reservation
            $reservation = new Reservation();
            // affectation d'un nom
            $reservation->nom = $reservationData['nom'];
            // affectation d'un prenom
            $reservation->prenom = $reservationData['prenom'];
            // affectation d'un jour
            $reservation->jour = $reservationData['jour'];
            // affectation d'une heure
            $reservation->heure = $reservationData['heure'];
            // affectation du nbre de personnes
            $reservation->nombre_de_personnes = $reservationData['nombre_de_personnes'];
            // affectation d'un n° de telephone
            $reservation->tel = $reservationData['tel'];
            // affectation d'un email
            $reservation->email = $reservationData['email'];
            //$reservation->reservation_id = $reservationData['reservation_id'];
            // sauvegarde dans la BDD
            $reservation->save();
        }
        
        for ($i =0; $i <48; $i++){
            // création d'un nouvelle reservation
           $reservation = new reservation();
            // affectation d'un nom
           $reservation->nom = $faker->lastName();
           // affectation d'un prenom
           $reservation->prenom = $faker->firstName();
           // affectation d'un jour $faker->date('Y-m-d')
           $reservation->jour = $faker->date('Y-m-d');
           // affectation d'une heure
           $reservation->heure = $faker->time('H:i');
           // affectation du nombre de personnes de 1 minimum a n
           // n doit etre credible, reservation pour 20 pers 
           $reservation->nombre_de_personnes = random_int(1,20);
           // affectation d'un N° telephone
           $reservation->tel = $faker->phoneNumber();
           // affectation d'un email
           $reservation->email = $faker->safeEmail();
           //$reservation->reservation_id = $reservation->id;
           // sauvegarde dans la BDD
           $reservation->save();
       }
    }
}
