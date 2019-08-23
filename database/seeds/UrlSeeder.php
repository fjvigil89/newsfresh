<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
            \DB::table('urls')->insert(array(
                'urlAcotada' =>$faker->url,
                'urlOriginal' =>$faker->url,
                'visitas' => $faker->randomDigitNotNull,
                'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),                               
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
