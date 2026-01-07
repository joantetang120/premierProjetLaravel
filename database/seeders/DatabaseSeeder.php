<?php


namespace Database\Seeders; // <--- TRÈS IMPORTANT

use Illuminate\Database\Seeder;
use App\Models\Produit;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Produit::factory(30)->create();

    }
}
