<?php


namespace Database\Seeders; // <--- TRÈS IMPORTANT

use Illuminate\Database\Seeder;
use App\Models\Produit;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ClientSeeder::class,
        ]);
        Produit::factory(30)->create();

    }
}
