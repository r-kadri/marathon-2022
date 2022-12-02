<?php

namespace Database\Seeders;

use App\Models\Exposition;
use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SallesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $exposition = Exposition::first();
        Salle::factory(4)->create([
                'exposition_id' => $exposition->id,
            ]
        );
    }
}
