<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Monster;

class MonsterSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        $monsters = [
            [                
                'monstername' => 'Bulbasaur',
                'category' => 'Seed',
                'description' =>'It carries the seed of a plant on its back since it is born, the seed grows slowly. Researchers are not sure whether to classify Bulbasaur as a plant or an animal. Bulbasaurs are extraordinarily strong and very difficult to capture in the wild.',
                'type_id' => '1',
                
            ],
            [                
                'monstername' => 'Charmander',
                'category' => 'Lizard',
                'description' =>'A flame has been burning at the end of his tail since he was born. A Charmander is said to die if its flame stops burning.',
                'type_id' => '2',
                
                
            ],
            [              
                'monstername' => 'Squirtle',
                'category' => 'Little turtle',
                'description' =>'This Pokemon turtle hides its long neck in its shell to launch an incredible amount of water with surprising range and precision. The jets can be very powerful..',
                'type_id' => '3',
                
            ],
            [                  
                'monstername' => 'Chikorita',
                'category' => 'Leaf',
                'description' =>'Leaf pokemon. The leaf that Chikorita has on its head gives off a sweet and relaxing fragrance.',
                'type_id' => '1',
            ],
            [              
                'monstername' => 'Cyndaquil',
                'category' => 'Fire mouse',
                'description' =>'Normally calm and good-natured. Cyndaquil fires a searing flame when angered..',
                'type_id' => '2',
            ],
            [              
                'monstername' => 'Totodile',
                'category' => 'Jaws',
                'description' =>'Its highly developed jaw is so powerful that it can crush almost anything. Trainers beware: this Pok??mon loves to use its teeth.',
                'type_id' => '3',
            ],
            [              
                'monstername' => 'Treecko',
                'category' => 'Forest gecko',
                'description' =>'Treecko can scale smooth, vertical walls and use his thick tail to attack his opponents. Since Treecko builds its nest in large trees, it is said that those trees will live for many years..',
                'type_id' => '1',
            ],
            [              
                'monstername' => 'Torchic',
                'category' => 'Chick',
                'description' =>'the fire pokemon',
                'type_id' => '2',
            ],
            [              
                'monstername' => 'Mudkip',
                'category' => 'Mud fish',
                'description' =>'Mudkip uses his sensitive head fin as a radar to pick up data on his surroundings.',
                'type_id' => '3',
            ],
            [              
                'monstername' => 'Turtwig',
                'category' => 'Little leaf',
                'description' =>'Its shell is made of earth and when it absorbs water, it becomes harder..',
                'type_id' => '1',
            ],
            [              
                'monstername' => 'Chimchar',
                'category' => 'Chimpanzee',
                'description' =>'Chimchar easily scales the smoothest walls and lives on top of mountains. His flames go out while he sleeps.',
                'type_id' => '2',
            ],
            [              
                'monstername' => 'Piplup',
                'category' => 'Penguin',
                'description' =>'He is very proud and his thick down protects him from the cold.',
                'type_id' => '3',
            ],
            [              
                'monstername' => 'Snivy',
                'category' => 'Grass snake',
                'description' =>'grass snake pokemon Cold, calm and collected. Snivy uses photosynthesis to collect energy with its tail blade.',
                'type_id' => '1',
            ],
            [              
                'monstername' => 'Tepig',
                'category' => 'Fire pig',
                'description' =>'Fire normally comes out of his muzzle, but when he is sick what he emits is smoke.',
                'type_id' => '2',
            ],
            [              
                'monstername' => 'Oshawott',
                'category' => 'Otter',
                'description' =>'Oshawott attacks and defends himself using the scallop that detaches from his gut.',
                'type_id_id' => '3',
            ],
            
        ];
        
        Monster::insert($monsters);
        
    }
}

