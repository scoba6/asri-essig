<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\FonctionnaireFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
                           'categorie', 
                           'banque', 
                           'rib', 
                           'cnss', 
                           'cnamgs'
                        ];


    /**
     * Get all of the ministere for the Fonctionnaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ministere(): HasMany
    {
        return $this->hasMany(Ministere::class);
    }

    /**
     * Get all of the projet for the Fonctionnaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projet(): HasMany
    {
        return $this->hasMany(Projet::class);
    }


}
