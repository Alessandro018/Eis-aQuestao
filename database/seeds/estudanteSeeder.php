<?php

use Illuminate\Database\Seeder;

class estudanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estudante::class, 20)->create();
    }
}
