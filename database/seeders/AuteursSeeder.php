<?php

namespace Database\Seeders;

use App\Models\Auteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuteursSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Auteur::factory(10)->create();
    }
}
