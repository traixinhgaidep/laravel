<?php

use Illuminate\Database\Seeder;

class ArticalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Artical::truncate();
        $faker = \Faker\Factory::create();
        
        for($i = 0; $i <50; $i++){
            App\Artical::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
