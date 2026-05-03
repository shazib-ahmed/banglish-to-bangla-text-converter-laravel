<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'banglish_text',
        'bangla_text',
        'arabic_text',
    ];
}
