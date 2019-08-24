<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Faker::create();

        $password = Hash::make('12345678');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => $faker->dateTime,
            'password' => $password,
            'api_token' => Str::random(250),
            'activo'  => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
            
        for ($i=0; $i < 50; $i++) {
            \DB::table('users')->insert(array(
                'name' =>$faker->name,
                'email' =>$faker->email,
                'email_verified_at' => $faker->dateTime,
                'password' => $faker->password,  
                'api_token' => Str::random(250),                             
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
