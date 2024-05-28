<?php
namespace Database\Seeders;

use App\Models\Kelurahan;
use App\Models\Lembaga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\Address;

class LembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Lembaga::create([
                'id_role' => $faker->numberBetween(1, 2),
                'id_kelurahan' => Kelurahan::inRandomOrder()->value('id'),
                'jenis' => $faker->randomElement(['rumah_sakit', 'admin', 'puskesmas']),
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'kode_pos' => Address::postcode(),
                'no_telepon' => $faker->phoneNumber,
            ]);
        }
    }
}
