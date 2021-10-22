<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelperInfo extends Model
{
    use HasFactory;
    protected $fillabel = [
            "user_id",
            "sex",
            "f_type",
            "have_family",
            "avg_movie_time",
            "f_lang",
            'age',
            "old",
    ];
}
