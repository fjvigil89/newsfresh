<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RecursoSeeder extends Seeder
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
            \DB::table('recursos')->insert(array(
                'nombre' => $faker->firstName,
                'url' =>$faker->url,
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
