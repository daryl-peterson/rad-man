<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UsersSeeder::class,
                ServiceTypeSeeder::class,
                ServiceSeeder::class,
                CustomerSeeder::class,
                RadAcctSeeder::class,
                NASSeeder::class,
            ]
        );

        $path = dirname(dirname(__FILE__)).'/sql/dictionary.sql';
        DB::unprepared(file_get_contents($path));
    }
}
