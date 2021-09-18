<?php

namespace Database\Seeders;

use App\Models\UserInformation;
use Illuminate\Database\Seeder;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserInformation::truncate();
        UserInformation::create([
            'user_id' => '1',
            'dob' => '2000-12-01',
            'is_male' => true,
            'address' => "Hanoi"
        ]);
        UserInformation::factory(3)->create();
    }
}
