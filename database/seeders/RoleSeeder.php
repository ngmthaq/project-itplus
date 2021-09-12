<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name_vi' => 'Quản trị',
            'name_en' => 'Admin',
            'description' => 'roles'
        ]);

        Role::create([
            'name_vi' => 'Độc giả',
            'name_en' => 'Readers',
            'description' => 'roles'
        ]);
    }
}
