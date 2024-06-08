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
        $sqlFilePath = __DIR__ . '/wilayah_indonesia.sql';
        $sqlFilePathVillages = __DIR__ . '/wilayah_indonesia_insert_kelurahan.sql';

        if (file_exists($sqlFilePath)) {
            DB::unprepared(
                file_get_contents($sqlFilePath)
            );
            DB::unprepared(
                file_get_contents($sqlFilePathVillages)
            );
        } else {
            $this->command->error("SQL file not found at path: " . $sqlFilePath);
        }

        $this->call (
            [
                UserSeeder::class,
                RoleSeeder::class,
                LembagaSeeder::class,
                GolonganDarahSeeder::class,
                KantongDarahSeeder::class,
            ]
            );
    }
}
