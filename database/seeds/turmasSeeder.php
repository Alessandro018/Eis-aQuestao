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
                'disciplina_id' => 1,
                'periodo_letivo_id' => 2,
                'turno' => 'manhã'
            ],
            1 => [
                'disciplina_id' => 2,
                'periodo_letivo_id' => 3,
                'turno' => 'manhã'
            ],
            2 => [
                'disciplina_id' => 4,
                'periodo_letivo_id' => 4,
                'turno' => 'tarde'
            ],
            3 => [
                'disciplina_id' => 1,
                'periodo_letivo_id' => 6,
                'turno' => 'noite'
            ]
        ];
        DB::table('turmas')->insert($turmas);
    }
}
