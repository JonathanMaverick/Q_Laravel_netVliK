<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'film_id', 'user_id')->withTimestamps();
    }
}
