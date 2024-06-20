<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['nom' => 'admin']);
        $CitoyenRole = Role::create(['nom' => 'citoyen']);
        $adminUser = User::find(1); // Assuming the first user
        $adminUser->roles()->attach($adminRole);
        $cUser = User::find(2); // Assuming the first user
        $cUser->roles()->attach($CitoyenRole);


    }
}
