<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KantongDarah;
use Faker\Factory as Faker;

class KantongDarahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            KantongDarah::create([
                'id_golongan_darah' => $faker->numberBetween(1, 3),
                'id_lembaga' => $faker->numberBetween(1, 5),
                'tanggal_donor' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'tanggal_kadaluarsa' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'jumlah' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
