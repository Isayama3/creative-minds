<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'hamada',
            'email' => 'hack@zipe.com',
            'password' => bcrypt('123@Ahmed'),
            'phone' => '01067214731',
            'latitude' => '01.067214731',
            'longitude' => '01.067214731',
            'device_key' => 'asxcascqe21e12eascx',
        ]);
    }
}
