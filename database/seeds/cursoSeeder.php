<?php

use Illuminate\Database\Seeder;

class cursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = [
            0 => [
                'nome' => 'Informática para internet'
            ],
            1 => [
                'nome' => 'Logística'
            ],
            2 => [
                'nome' => 'Gestão da qualidade'
            ]
        ];
        DB::table('curso')->insert($curso);
    }
}
