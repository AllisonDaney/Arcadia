<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Animal extends Model
{
    protected $fillable = ['name', 'description', 'breed', 'home_id'];

    public function animalsPictures(): HasMany
    {
        return $this->hasMany(AnimalsPicture::class);
    }

    public function veterinariansReports(): HasMany
    {
        return $this->hasMany(VeterinariansReport::class);
    }

    public function home(): belongsTo
    {
        return $this->belongsTo(Home::class);
    }

    public function animalsReports(): HasMany
    {
        return $this->HasMany(AnimalsReport::class);
    }
}
