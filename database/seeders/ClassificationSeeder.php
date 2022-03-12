<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Classification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'hussein sim',
            'email'=>'adda5mad@outlook.com',
            'password' => Hash::make('22444488'),
            'avatar' => '#',
         ]);

        $quotes01['name'] = [
            'en' => 'Sport',
            'ar' => 'الرياضة',
            'fr' => 'sport fr',
        ];
        $quotes01['user_id']= $user->id;


        Classification::create($quotes01);

    }
}
