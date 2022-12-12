<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        $users = [
            [                
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' =>'$2y$10$SaAa69it3A3hzTaHDTAYRu.bzKnxLDtrcSPmRW0UMY9eQKBSHczu.',
                'role' => 'admin',
            ],     
        ];
        
        User::insert($users);
        
    }
}

