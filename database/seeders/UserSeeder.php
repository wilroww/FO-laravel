<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() :void
    {
        user::create([
            'firstName' => 'Wilrow',
            'lastName' => "Bayona",
            'userEmail' => "wilrowbayona@gmail.com",
            'userPassword' => "wilrow12345",
        ]);
    }
}
