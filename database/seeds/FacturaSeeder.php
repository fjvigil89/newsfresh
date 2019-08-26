<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; ) {
            \DB::table('facturas')->insert(array(
                'ingresos'  => $faker->randomDigitNotNull,
                'estado'    => $faker->randomElement($array = array ('pendiente','entregado')),
                'anno'      =>$faker->year,
                'mes'       =>$faker->monthName,
                'user_id'   => ++$i,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
