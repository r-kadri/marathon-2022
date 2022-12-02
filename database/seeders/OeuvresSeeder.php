<?php

namespace Database\Seeders;

use App\Models\Auteur;
use App\Models\Oeuvre;
use App\Models\Salle;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OeuvresSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create('fr_FR');
        $auteur_ids = Auteur::all()->pluck('id');
        $salle_ids = Salle::all()->pluck('id');

        foreach ($salle_ids as $id) {
            $nbOeuvres = $faker->numberBetween(2, 5);
            $oeuvres = Oeuvre::factory($nbOeuvres)->make();
            foreach ($oeuvres as $oeuvre) {
                $oeuvre->salle_id = $id;
                $oeuvre->auteur_id = $faker->randomElement($auteur_ids);
                $oeuvre->save();
            }
        }
    }
}
