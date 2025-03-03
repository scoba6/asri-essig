<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class Ministere extends Model
{
    /** @use HasFactory<\Database\Factories\MinistereFactory> */
    use HasFactory,Userstamps, SoftDeletes;

    protected $fillable = ['libmin', 'desmin', 'sihmin'];
}
