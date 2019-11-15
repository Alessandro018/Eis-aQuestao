<?php

use Illuminate\Database\Seeder;

class turmas_estudantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turma_estudante = 
        [
           0 => [
                'turma_id' => 1,
                'estudante_id' => 0,
           ],
           1 => [
                'turma_id' => 1,
                'estudante_id' => 1
            ],
           2 => [
                'turma_id' => 1,
                'estudante_id' => 2
            ],
           3 => [
                'turma_id' => 1,
                'estudante_id' => 3
            ],
           4 => [
                'turma_id' => 1,
                'estudante_id' => 4
            ],
            5 => [
                'turma_id' => 1,
                'estudante_id' => 5
            ],
            6 => [
                'turma_id' => 1,
                'estudante_id' => 6
            ],
            3 => [
                'turma_id' => 1,
                'estudante_id' => 7
            ]
        ];
        DB::table('turmas_has_estudantes')->insert($turma_estudante);
    }
}
