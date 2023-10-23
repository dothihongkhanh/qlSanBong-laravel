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
        $this->call([
            DistrictSeeder::class,
            CommentImageSeeder::class,
            CommentSeeder::class,
            FieldChildSeeder::class,
            FieldImageSeeder::class,
            FieldSeeder::class,
            ImageSeeder::class,
            OrderDetailSeeder::class,
            OrderSeeder::class,
            PermissionSeeder::class,
            SubDistrictSeeder::class,
            UserPermissionSeeder::class,
            UserSeeder::class,

        ]);
    }
}
