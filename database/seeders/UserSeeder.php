<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'role_id' => 1,
            'first_name' => 'Nguyễn',
            'last_name' => 'Thắng',
            'email' => 'nguyenmanhthang2000.fb@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('thang2000'), // thang2000
            'remember_token' => md5('NguyễnThắngnguyenmanhthang2000.fb@gmail.com' . date('Y-m-d H:i:s')),
            'token' => md5('NguyễnThắngnguyenmanhthang2000.fb@gmail.com' . date('Y-m-d H:i:s')),
        ]);
    }
}
