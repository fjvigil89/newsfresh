<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(FacturaSeeder::class);
        $this->call(NoticiaSeeder::class);
        $this->call(RecursoSeeder::class);
        $this->call(UrlSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(ReferidoSeeder::class);
    }
}
