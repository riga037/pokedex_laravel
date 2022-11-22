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
            ],
            [
                'name' => 'Growl',
                'description' => 'The user growls in an endearing way, making opposing Pokémon less wary. This lowers their Attack stats.'
            ],
            [
                'name' => 'Scratch',
                'descrption' => 'Hard, pointed, sharp claws rake the target to inflict damage.'
            ],
            [
                'name' => 'Tail Whip',
                'descrption' => 'The user wags its tail cutely, making opposing Pokémon less wary and lowering their Defense stats.'
            ],
            [
                'name' => 'Leer',
                'descrption' => ' The user gives opposing Pokémon an intimidating leer that lowers the Defense stat.'
            ],
            [
                'name' => 'Pound',
                'descrption' => 'The user pounds the opponent with their tail, legs, body, etc.'
            ],
            
        ];

        Move::insert($moves);

    }
}
