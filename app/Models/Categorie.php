<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = ['libcat', 
                           'descat'
                        ];

}
