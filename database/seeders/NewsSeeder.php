<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $quotes01['title'] = [
            'en' => 'It’s not about ideas. It’s about making ideas happen.',
            'ar' => 'الأمر لا يتعلق بالافكار إنه حول جعل الأفكار تحدث.',
            'fr' => 'No se trata de ideas. Se trata de hacer realidad las ideas.',
        ];
        $quotes01['summary'] = [
            'en' => 'It’s not about ideas. It’s about making ideas happen.',
            'ar' => 'الأمر لا يتعلق بالافكار إنه حول جعل الأفكار تحدث.',
            'fr' => 'No se trata de ideas. Se trata de hacer realidad las ideas.',
        ];
        $quotes01['details'] = [
            'en' => 'It’s not about ideas. It’s about making ideas happen.',
            'ar' => 'الأمر لا يتعلق بالافكار إنه حول جعل الأفكار تحدث.',
            'fr' => 'No se trata de ideas. Se trata de hacer realidad las ideas.',
        ];
        $quotes01['classification_id'] =1;
        $quotes01['user_id'] = 1;

        News::create($quotes01);


    }
}
