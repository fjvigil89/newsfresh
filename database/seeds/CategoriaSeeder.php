<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoriaSeeder extends Seeder
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
            \DB::table('categorias')->insert(array(
                'nombre' => $faker->firstName,
                'activo'  => $faker->boolean,                                
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
