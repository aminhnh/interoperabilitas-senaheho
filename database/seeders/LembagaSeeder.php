<?php
namespace Database\Seeders;

use App\Models\Lembaga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Lembaga::create([
                'id_role' => 1,
                'id_kelurahan' => '1101012001',
                'jenis' => $faker->randomElement(['jenis1', 'jenis2', 'jenis3']),
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'kode_pos' => '11111',
                'no_telepon' => $faker->phoneNumber,
            ]);
        }
    }
}
