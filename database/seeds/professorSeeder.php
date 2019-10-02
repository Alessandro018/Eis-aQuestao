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
                'siape' => 'ABC001',
                'campus' => 'Igarassu',
                'nome' => 'Ranieri Valença',
                'senha' => 'ifpe'
            ],
            1 => [
                'siape' => 'DEF002',
                'campus' => 'Igarassu',
                'nome' => 'Liliane Alves',
                'senha' => 'ifpe'
            ],
            2 => [
                'siape' => 'GHI003',
                'campus' => 'Igarassu',
                'nome' => 'Lara Régia',
                'senha' => 'ifpe'
            ],
            3 => [
                'siape' => 'JLM004',
                'campus' => 'Igarassu',
                'nome' => 'Milton Junior',
                'senha' => 'ifpe'
            ]
        ];
        DB::table('professor')->insert($professor);
    }
}
