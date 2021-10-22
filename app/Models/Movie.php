<?php

namespace App\Models;

use App\Models\Buy;
use App\Models\Actor;
use App\Models\Stars;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        "movie_name",
        "language",
        "classification",
        "is_series",
        "type",
        "evaluate",
        "released",
        "time_period",
        "description"
    ];
    public function actor()
    {
        return $this->hasMany(Actor::class ,"movie_id");
    }
    public function buy()
    {
        return $this->hasMany(Buy::class ,"movie_id");
    }
    public function stars()
    {
        return $this->hasMany(Stars::class ,"movie_id");
    }
}
