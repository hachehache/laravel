<?php

namespace Database\Seeders;


use App\Models\Actu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $actuDatas = [
            [
                'jour_publication' => '2023-03-05',
                'heure_publication' => '23:00:15',
                'texte' => 'Dolor sit amet consectetur, adipisicing elit lorem ipsum.',
                
                ],
            
            [
                'jour_publication' => '2023-07-30',
                'heure_publication' => '16:10:00',
                'texte' => 'REDolor sit amet consectetur, adipisicing elit lorem ipsum.',
                ],
            
            [
                'jour_publication' => '2022-02-28',
                'heure_publication' => '15:15:15',
                'texte' => 'RERE Dolor sit amet consectetur, adipisicing elit lorem ipsum.',
                ],
            
            ];   

    }
}