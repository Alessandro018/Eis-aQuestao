<?php

use Illuminate\Database\Seeder;

class estudanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estudante = [
            0 => [
                'nome' => 'Gabriel Pessoa',
                'email' => 'gabriel@gabriel.com',
                'matricula' => 'IFPE123'
            ],
            1 => [
                'nome' => 'Alessandro Silva ',
                'email' => 'alessandro@alessandro.com',
                'matricula' => 'IFPE321'
            ],
            2 => [
                'nome' => 'Robson Gomes',
                'email' => 'robson@robson.com',
                'matricula' => 'IFPE231'
            ],
            3 => [
                'nome' => 'Tamires Silva',
                'email' => 'tamires@tamires.com',
                'matricula' => 'IFPE312'
            ],
            4 => [
                'nome' => 'Alex Guedes',
                'email' => 'alex@alex.com',
                'matricula' => 'IFPE456'
            ],
            5 => [
                'nome' => 'Geovane Jose',
                'email' => 'geovane@geovane.com',
                'matricula' => 'IFPE654'
            ]

        ];
        DB::table('estudante')->insert($estudante);
    }
}
