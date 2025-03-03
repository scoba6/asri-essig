<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    /** @use HasFactory<\Database\Factories\ProjetFactory> */
    use HasFactory, Userstamps, SoftDeletes;


    /**
     * Get the fonctionnaire that owns the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fonctionnaire(): BelongsTo
    {
        return $this->belongsTo(Fonctionnaire::class);
    }
}
