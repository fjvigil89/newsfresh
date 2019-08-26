<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class ReferidoSeeder extends Seeder
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
            \DB::table('referidos')->insert(array(                                
                'user_id'       => 1,
                'id_asociado'   =>++$i,
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
