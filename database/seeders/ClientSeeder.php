<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Client::create([
            'name'=> 'Administrateur',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('password'), //je hash le mot de passe pour plus de protection.
            'role'=> 'admin',
        ]);
    }
}
