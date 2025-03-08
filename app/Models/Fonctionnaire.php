<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\FonctionnaireFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fonctionnaire extends Model
{
    /** @use HasFactory<FonctionnaireFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = ['matricule', 
                           'nom', 
                           'prenom', 
                           'sexe', 
                           'datenaiss', 
                           'lieunaiss', 
                           'adresse', 
                           'tel', 
                           'email', 
                           'situation', 
                           'dateentree', 
                           'datefin', 
                           'photo', 
                           'cv', 
                           'categorie_id', 
                           'banque', 
                           'rib', 
                           'cnss', 
                           'cnamgs'];


    /**
     * Get all of the ministere for the Fonctionnaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carrieres(): HasMany
    {
        return $this->hasMany(Carriere::class);
    }

    /**
     * Get all of the projet for the Fonctionnaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projets(): HasMany
    {
        return $this->hasMany(Projet::class);
    }

    /**
     * Get the categorie that owns the Fonctionnaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }


}
