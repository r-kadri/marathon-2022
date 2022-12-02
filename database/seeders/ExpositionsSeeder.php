<?php

namespace Database\Seeders;

use App\Models\Exposition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpositionsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Exposition::factory([
            'nom' => "Galerie numérique de l'IUT de Lens",
        ])->create();
    }
}
