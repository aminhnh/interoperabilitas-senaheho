<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GolonganDarah;

class GolonganDarahSeeder extends Seeder
{
    public function run()
    {
        GolonganDarah::create([
            'golongan_darah' => 'A',
            'rhesus' => '+',
        ]);

        GolonganDarah::create([
            'golongan_darah' => 'B',
            'rhesus' => '-',
        ]);

        GolonganDarah::create([
            'golongan_darah' => 'B',
            'rhesus' => '+',
        ]);
    }
}
