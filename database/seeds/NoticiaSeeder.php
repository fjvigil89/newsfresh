<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class NoticiaSeeder extends Seeder
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
            \DB::table('noticias')->insert(array(
                'asunto' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'descripcion' =>$faker->text($maxNbChars = 200),
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
