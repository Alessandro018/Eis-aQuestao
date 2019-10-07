<?php

use Illuminate\Database\Seeder;

class disciplina_estudanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplina_estudante = 
        [
           0 => [
               'disciplina_id' => 1,
               'estudante_id' => 1,
               'periodo_letivo_id' => 5
           ],
           1 => [
            'disciplina_id' => 5,
            'estudante_id' => 1,
            'periodo_letivo_id' => 3
            ],
           2 => [
            'disciplina_id' => 9,
            'estudante_id' => 1,
            'periodo_letivo_id' => 9
            ],
           3 => [
            'disciplina_id' => 4,
            'estudante_id' => 1,
            'periodo_letivo_id' => 4
            ],
           4 => [
            'disciplina_id' => 2,
            'estudante_id' => 2,
            'periodo_letivo_id' => 7
            ],
            5 => [
            'disciplina_id' => 5,
            'estudante_id' => 2,
            'periodo_letivo_id' => 8
            ],
            6 => [
            'disciplina_id' => 7,
            'estudante_id' => 2,
            'periodo_letivo_id' => 7
            ],
            3 => [
            'disciplina_id' => 4,
            'estudante_id' => 1,
            'periodo_letivo_id' => 4
            ]
        ];
        DB::table('disciplina_estudante')->insert($disciplina_estudante);//
    }
}
