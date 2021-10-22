<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = [
        "actor_name",
        "actor_R_name",
        "actor_R_name",
        "movie_id",
    ];
    public function movie()
    {
        return $this->belongsTo(Movie::class,"movie_id");
    }

}
