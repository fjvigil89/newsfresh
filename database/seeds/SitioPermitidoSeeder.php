<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SitioPermitidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50;) {
            \DB::table('sitios_permitidos')->insert(array(
                'nombre' => $faker->firstName,
                'url' =>$faker->url,
                'activo'  => $faker->boolean,
                'categoria_id' => ++$i,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
