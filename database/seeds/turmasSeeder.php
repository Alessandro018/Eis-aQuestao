<?php

use Illuminate\Database\Seeder;

class turmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = [
            0 => [
                'disciplina_id' => 0,
                'periodo_letivo_id' => 2
            ],
            1 => [
                'disciplina_id' => 2,
                'periodo_letivo_id' => 3
            ],
            2 => [
                'disciplina_id' => 4,
                'periodo_letivo_id' => 4
            ],
            3 => [
                'disciplina_id' => 1,
                'periodo_letivo_id' => 6
            ]
        ];
        DB::table('turmas')->insert($turmas);
    }
}
