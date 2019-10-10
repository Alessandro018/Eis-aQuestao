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
            professores_disciplinasSeeder::class,
            disciplinas_estudantesSeeder::class
        ]);
    }
}
