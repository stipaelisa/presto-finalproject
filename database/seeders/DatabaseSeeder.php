<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('public/articles');

       \App\Models\User::factory()->create([
           'name' => 'User',
           'email' => 'test@presto.it',
           'password' => Hash::make("ciaociao"),
       ]);

       $categories = 
       [
            'Motori',
            'Elettronica',
            'Animali',
            'Arredo',
            'Abbigliamento',
            'Telefonia',
            'Audio/Video',
            'Immobili',
            'Sport',
            'Letteratura'
       ];

       foreach($categories as $category){
            Category::create([
                'name'=>$category
            ]);
       }
    }
}
