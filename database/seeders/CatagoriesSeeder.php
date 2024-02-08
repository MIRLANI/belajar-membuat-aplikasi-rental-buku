<?php

namespace Database\Seeders;

use App\Models\Catagori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CatagoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::disableForeignKeyConstraints();
        Catagori::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            "Horor", "novel", "fantasy", "fiction", "mystery", "romace"
        ];

       foreach ($data as   $value) {
        Catagori::insert([
            "name" => $value,
            "slug" => $value
        ]);
       }      
           
    }
}
