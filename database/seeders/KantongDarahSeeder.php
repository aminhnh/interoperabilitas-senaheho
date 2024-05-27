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
                'id_golongan_darah' => 1,
                'id_lembaga' => 2,
                'tanggal_donor' => $faker->date(),
                'tanggal_kadaluarsa' => $faker->date(),
                'jumlah' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
