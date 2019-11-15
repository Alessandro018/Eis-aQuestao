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
        $this->call([
            cursosSeeder::class,
            periodosLetivosSeeder::class,
            disciplinasSeeder::class,
            professoresSeeder::class,
            estudantesSeeder::class,
            turmasSeeder::class,
            turmas_estudantesSeeder::class,
            turmas_professoresSeeder::class,
        ]);
    }
}
