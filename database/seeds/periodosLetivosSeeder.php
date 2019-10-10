<?php

use Illuminate\Database\Seeder;

class periodosLetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodoLetivo = [
            0 => [
                'ano' => '2016',
                'semestre' => 1
            ],
            1 => [
                'ano' => '2016',
                'semestre' => 2
            ],
            2 => [
                'ano' => '2017',
                'semestre' => 1
            ],
            3 => [
                'ano' => '2017',
                'semestre' => 2
            ],
            4 => [
                'ano' => '2018',
                'semestre' => 1
            ],
            5 => [
                'ano' => '2018',
                'semestre' => 2
            ],
            6 => [
                'ano' => '2019',
                'semestre' => 1
            ],
            7 => [
                'ano' => '2019',
                'semestre' => 2
            ],
            8 => [
                'ano' => '2020',
                'semestre' => 1
            ],
            9 => [
                'ano' => '2020',
                'semestre' => 2
            ],
        ];
        DB::table('periodos_letivos')->insert($periodoLetivo);
    }
}
