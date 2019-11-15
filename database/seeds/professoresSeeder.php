<?php

use Illuminate\Database\Seeder;

class professoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = 
        [
           0 => [
            'siape' => 'ABC123',
            'campus' => 'Igarassu',
            'nome' => 'Ranieri',
            'senha' => '$2y$10$Y86a1BgsLH1bN77rTw8eyuW3gOm3EdjeGTd8hjiXZojgRbjjVs7ES',
           ],
           1 => [
            'siape' => 'bcde12345',
            'campus' => 'Igarassu',
            'nome' => 'Liliane',
            'senha' => '$2y$10$Y86a1BgsLH1bN77rTw8eyuW3gOm3EdjeGTd8hjiXZojgRbjjVs7ES',
           ],
        ];
        DB::table('professores')->insert($professor);
        factory(App\Professor::class, 20)->create();
    }
}
