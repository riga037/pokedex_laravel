<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types = [
            [
                'name' => 'Grass',
                'description' => 'Many Grass types are based on plants and fungi, not necessarily grass.'
            ],
            [
                'name' => 'Fire',
                'description'=>'Some Fire-type species are based on land animals known for their predatory instincts, such as Pyroar, Arcanine and Heatmor.'
            ],
            [
                'name' => 'Water',
                'description' => 'There are more Pokémon of this type than any other type due to the large number of marine creatures to base species from.'
            ],
            [
                'name' => 'Normal',
                'description' => 'Among species, Normal-type Pokémon tend to be based on a variety of different real-world animals. Normal typically did not pair with other types except Flying, in order to portray standard species of birds.'
            ],
        ];

        Type::insert($types);

    }
}
