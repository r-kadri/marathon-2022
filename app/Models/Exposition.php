<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exposition
 *
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property string $date_debut
 * @property string $date_fin
 * @property int|null $salle_depart_id
 * @property-read \App\Models\Salle|null $salleDepart
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Salle[] $salles
 * @property-read int|null $salles_count
 * @method static \Database\Factories\ExpositionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exposition whereSalleDepartId($value)
 * @mixin \Eloquent
 */
class Exposition extends Model {
    use HasFactory;

    public $timestamps = false;

    public function salleDepart() {
        return $this->belongsTo(Salle::class);
    }
    public function salles() {
        return $this->hasMany(Salle::class);
    }
}
