<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;

    public function animalsPictures(): HasMany
    {
        return $this->hasMany(AnimalsPicture::class);
    }

    public function veterinariansReports() : HasMany 
    {
        return $this->hasMany(VeterinariansReport::class);
    }
}
