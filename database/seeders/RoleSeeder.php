<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'nama' => 'user',
        ]);

        Role::create([
            'nama' => 'admin',
        ]);
    }
}
