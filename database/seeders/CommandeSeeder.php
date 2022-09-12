<?php

namespace Database\Seeders;

use App\Models\Commande;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commande::factory()->count(20)->create();
    }
}
