<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userDatas = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'laravellaravel',
            ],
        ];   

        foreach ($userDatas as $userData) {
            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = Hash::make($user ->newPassword);
            $user->save();
    }
}
}