<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Move;

class MoveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moves = [
            [
                'name' => 'Razor Leaf',
                'description' => 'Sharp-edged leaves are launched to slash at opposing Pokémon. Critical hits land more easily.'
            ],
            [
                'name' => 'Ember',
                'description'=>'The target is attacked with small flames. This may also leave the target with a burn.'
            ],
            [
                'name' => 'Water Gun',
                'description' => 'The target is blasted with a forceful shot of water.'
            ],
            [
                'name' => 'Tackle',
                'description' => 'A physical attack in which the user charges and slams into the target with its whole body.'
            ]
        ];

        Move::insert($moves);

    }
}
