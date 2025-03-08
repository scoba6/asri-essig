<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carriere extends Model
{
    /** @use HasFactory<\Database\Factories\CarriereFactory> */
    use HasFactory, Userstamps, SoftDeletes;

    protected $table = 'carrieres';
    protected $fillable = ['fonctionnaire_id',
                           'ministere_id', 
                           'date_debut', 
                           'date_fin',
                           'description' ];

    /**
     * Get the ministere that owns the Carriere
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ministere(): BelongsTo
    {
        return $this->belongsTo(Ministere::class);
    }


}
