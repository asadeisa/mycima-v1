<?php

namespace App\Models;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stars extends Model
{
    use HasFactory;
    protected $fillable = [
        "movie_id",
        "user_id",
        "number_stars"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class,"movie_id");
    }
}
