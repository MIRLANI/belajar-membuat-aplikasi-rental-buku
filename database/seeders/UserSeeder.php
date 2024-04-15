<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        {
            $user = new User();
            $user->username = "lani";
            $user->password = "rahasia";
            $user->status = "active";
            $user->address = "sombu";
            $user->role_id = "1";
            $user->save();
        }

        {
            $user = new User();
            $user->username = "arman";
            $user->password = "rahasia";
            $user->address = "sombu";
            $user->status = "inactive";
            $user->role_id = "2";
            $user->save();
        }
        {
            $user = new User();
            $user->username = "mirna";
            $user->password = "rahasia";
            $user->address = "sombu";
            $user->status = "active";
            $user->role_id = "2";
            $user->save();
        }
    }
}
