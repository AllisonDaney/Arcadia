<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalsReport extends Model
{


    protected $fillable = ['user_id', 'animal_id', 'food', 'food_quantity', 'food_at'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function animal(): BelongsTo
    {
        return $this->BelongsTo(Animal::class);
    }
}
