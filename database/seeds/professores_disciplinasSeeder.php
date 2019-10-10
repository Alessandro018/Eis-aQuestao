<?php

use Illuminate\Database\Seeder;

class professores_disciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor_disciplina = 
        [
           0 => [
               'disciplina_id' => 1,
               'professor_id' => 1,
               'periodo_letivo_id' => 5
           ],
           1 => [
            'disciplina_id' => 5,
            'professor_id' => 1,
            'periodo_letivo_id' => 3
            ],
           2 => [
            'disciplina_id' => 9,
            'professor_id' => 1,
            'periodo_letivo_id' => 9
            ],
           3 => [
            'disciplina_id' => 4,
            'professor_id' => 1,
            'periodo_letivo_id' => 4
            ],
           4 => [
            'disciplina_id' => 2,
            'professor_id' => 2,
            'periodo_letivo_id' => 7
            ],
            5 => [
            'disciplina_id' => 5,
            'professor_id' => 2,
            'periodo_letivo_id' => 8
            ],
            6 => [
            'disciplina_id' => 7,
            'professor_id' => 2,
            'periodo_letivo_id' => 7
            ],
            3 => [
            'disciplina_id' => 4,
            'professor_id' => 1,
            'periodo_letivo_id' => 4
            ]
        ];
        DB::table('professores_disciplinas')->insert($professor_disciplina);
    }
}
