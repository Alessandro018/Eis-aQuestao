<?php

use Illuminate\Database\Seeder;

class professorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Professor::class, 20)->create();
    }
}
