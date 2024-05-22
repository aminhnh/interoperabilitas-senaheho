<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'nama' => 'Role Name 1',
        ]);

        Role::create([
            'nama' => 'Role Name 2',
        ]);

        // Add more dummy data as needed
    }
}
