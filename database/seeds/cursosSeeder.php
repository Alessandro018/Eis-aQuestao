<?php

use Illuminate\Database\Seeder;

class cursosSeeder extends Seeder
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
            ]
        ];
        DB::table('cursos')->insert($curso);
    }
}
