<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Home extends Model
{


    protected $fillable = ['label', 'content'];

    public function homePictures(): HasMany
    {
        return $this->hasMany(HomesPicture::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
