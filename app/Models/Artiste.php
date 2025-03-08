<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artiste extends Model
{
    /** @use HasFactory<\Database\Factories\ArtisteFactory> */
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = ['nom', 'prenom', 'datenaiss', 'lieunaiss', 'sexe', 'nomart'];


    /**
     * Get all of the oeuvres for the Artiste
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oeuvres(): HasMany
    {
        return $this->hasMany(Oeuvre::class);
    }
    
}
