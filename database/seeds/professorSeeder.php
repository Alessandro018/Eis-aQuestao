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
        $professor = [
            0 => [
                'siap' => 'ABC001',
                'campus' => 'Igarassu',
                'nome' => 'Ranieri Valença',
                'senha' => 'ifpe'
            ],
            1 => [
                'siap' => 'DEF002',
                'campus' => 'Igarassu',
                'nome' => 'Liliane Alves',
                'senha' => 'ifpe'
            ],
            2 => [
                'siap' => 'GHI003',
                'campus' => 'Igarassu',
                'nome' => 'Lara Régia',
                'senha' => 'ifpe'
            ],
            3 => [
                'siap' => 'JLM004',
                'campus' => 'Igarassu',
                'nome' => 'Milton Junior',
                'senha' => 'ifpe'
            ]
        ];
        DB::table('professor')->insert($professor);
    }
}
