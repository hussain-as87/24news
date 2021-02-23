<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $quotes01['name'] = [
            'en' => 'Sport',
            'ar' => 'الرياضة',
            'fr' => 'sport fr',
        ];


        Classification::create($quotes01);

    }
}
