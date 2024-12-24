<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'duration',
        'id_age_restriction',
        'description',
        'team',
        'image',
        'show_date',
    ];
}
