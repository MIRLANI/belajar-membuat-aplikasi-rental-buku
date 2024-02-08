<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if ($this->command->confirm("Apakah kamu ingin fresh migration seeder yang akan menghapus data di database?")) {
            $this->command->call("migrate:fresh");
            $this->command->info("berhasil melakukan fresh");
            if ($this->command->confirm("apakah kamu ingin membuat seeder")) {
                $this->call(RoleSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(CatagoriesSeeder::class);
            }
        }
    }
}
