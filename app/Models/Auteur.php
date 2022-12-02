<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auteur
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $observations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Oeuvre[] $oeuvres
 * @property-read int|null $oeuvres_count
 * @method static \Database\Factories\AuteurFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur whereObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auteur wherePrenom($value)
 * @mixin \Eloquent
 */
class Auteur extends Model {
    use HasFactory;

    public $timestamps = false;

    public function oeuvres() {
        return $this->hasMany(Oeuvre::class);
    }
}
