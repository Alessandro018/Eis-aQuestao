<?php

use Illuminate\Database\Seeder;

class turmas_professoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas_professores = 
        [
           0 => [
               'turma_id' => 0,
               'professor_id' => 1
            ],
           1 => [
                'turma_id' => 1,
                'professor_id' => 2
            ],
           2 => [
                'turma_id' => 2,
                'professor_id' => 3
            ],
           3 => [
                'turma_id' => 3,
                'professor_id' => 4
            ],
        ];
        DB::table('turmas_has_professores')->insert($turmas_professores);
    }
}
