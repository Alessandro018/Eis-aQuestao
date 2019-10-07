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
            cursoSeeder::class,
            periodoLetivoSeeder::class,
            disciplinaSeeder::class,
            professorSeeder::class,
            estudanteSeeder::class,
            professor_disciplinaSeeder::class
        ]);
    }
}
