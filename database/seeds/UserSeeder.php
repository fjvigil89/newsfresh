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
            'token' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU2NjcwNzY1MSwiZXhwIjoxNTY2NzExMjUxLCJuYmYiOjE1NjY3MDc2NTEsImp0aSI6IlA3QUtValJ1Zk4wb0RkREwiLCJzdWIiOjE2LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.uWfJwCL6oe--BIxVLyRiOangKlrO0oKuO_AzfXOuQS4",
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
                'token' => Str::random(400),                             
                'activo'  => $faker->boolean,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
