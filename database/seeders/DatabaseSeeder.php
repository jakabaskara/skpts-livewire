<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jaka Adi Baskara',
            'email' => 'jaka.baskara30@gmail.com',
            'nik_sap' => '19002851',
            'password' => Hash::make('123'),
        ]);
    }
}
