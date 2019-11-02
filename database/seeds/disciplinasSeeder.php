<?php

use Illuminate\Database\Seeder;

class disciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplina = [
            0 => [
                'nome' => 'Português instrumental',
                'curso_id' => 1
            ],
            1 => [
                'nome' => 'Fundamentos da informática',
                'curso_id' => 1
            ],
            2 => [
                'nome' => 'Inglês instrumental',
                'curso_id' =>1
            ],
            3 => [
                'nome' => 'Matemática aplicada',
                'curso_id' => 1
            ],
            4 => [
                'nome' => 'Rede de computadores',
                'curso_id' => 1
            ],
            5 => [
                'nome' => 'Lógica de programção e estrutura de dados',
                'curso_id' => 1
            ],
            6 => [
                'nome' => 'Segurança do trabalho',
                'curso_id' => 1
            ],
            7 => [
                'nome' => 'Sistemas Operacionais',
                'curso_id' => 1
            ],
            8 => [
                'nome' => 'Segurança de sistemas para internet',
                'curso_id' => 1
            ],
            9 => [
                'nome' => 'Banco de dados',
                'curso_id' => 1
            ],
            10 => [
                'nome' => 'Desenvolvimento para web 1',
                'curso_id' => 1
            ],
            11 => [
                'nome' => 'Ética profissional e cidadania',
                'curso_id' => 1
            ],
            12 => [
                'nome' => 'Programação orientada a objeto',
                'curso_id' => 1
            ],
            13 => [
                'nome' => 'Projeto e prática 1',
                'curso_id' => 1
            ],
            14 => [
                'nome' => 'Interação humano-computador',
                'curso_id' => 1
            ],
            15 => [
                'nome' => 'Engenharia de software',
                'curso_id' => 1
            ],
            16 => [
                'nome' => 'Implantação e administração de serviços web',
                'curso_id' => 1
            ],
            17 => [
                'nome' => 'Desenvolvimento para web 2',
                'curso_id' => 1
            ],
            18 => [
                'nome' => 'Empreendedorismo',
                'curso_id' => 1
            ],
            19 => [
                'nome' => 'Projeto e prática 2',
                'curso_id' => 1
            ],
            20 => [
                'nome' => 'Logística reversa e meio ambiente',
                'curso_id' => 2
            ],
            21 => [
                'nome' => 'Matemática básica',
                'curso_id' => 2
            ],
            22 => [
                'nome' => 'Introdução à administração',
                'curso_id' => 2
            ],
            23 => [
                'nome' => 'Informática básica',
                'curso_id' => 2
            ],
            24 => [
                'nome' => 'Português aplicado',
                'curso_id' => 2
            ],
            25 => [
                'nome' => 'Metodologia cientifica',
                'curso_id' => 2
            ],
            26 => [
                'nome' => 'Introdução à logística',
                'curso_id' => 2
            ],
            27 => [
                'nome' => 'Ética profissional',
                'curso_id' => 2
            ],
            28 => [
                'nome' => 'Gerenciamento e economia de sistemas logísticos',
                'curso_id' => 2
            ],
            29 => [
                'nome' => 'Gestão de pessoas',
                'curso_id' => 2
            ],
            30 => [
                'nome' => 'Estatística básica',
                'curso_id' => 2
            ],
            31 => [
                'nome' => 'Logística de transporte e distribuição',
                'curso_id' => 2
            ],
            32 => [
                'nome' => 'Logística de armazenagem',
                'curso_id' => 2
            ],
            33 => [
                'nome' => 'Comércio e relações internacionais',
                'curso_id' => 2
            ],
            34 => [
                'nome' => 'Legislação e tributação em logística',
                'curso_id' => 2
            ],
            35 => [
                'nome' => 'Inglês instrumental 1',
                'curso_id' => 2
            ],
            36 => [
                'nome' => 'Gestão de cadeia de suprimento',
                'curso_id' => 2
            ],
            37 => [
                'nome' => 'Gestão da qualidade',
                'curso_id' => 2
            ],
            38 => [
                'nome' => 'Higiene e segurança do trabalho',
                'curso_id' => 2
            ],
            39 => [
                'nome' => 'Gestão da produção',
                'curso_id' => 2
            ],
            40 => [
                'nome' => 'Gestão de materiais, estoque e compras',
                'curso_id' => 2
            ],
            41 => [
                'nome' => 'Custos logísticos',
                'curso_id' => 2
            ],
            42 => [
                'nome' => 'Inglês instrumental 2',
                'curso_id' => 2
            ],
            43 => [
                'nome' => 'Tópicos especiais em logística',
                'curso_id' => 2
            ],
            44 => [
                'nome' => 'Tecnologia e sistemas de informação logística',
                'curso_id' => 2
            ],
        ];
        DB::table('disciplinas')->insert($disciplina);
    }
}
