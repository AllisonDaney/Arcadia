<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VeterinariansReport extends Model
{


    protected $fillable = ['user_id', 'animal_id', 'animal_condition', 'food', 'food_quantity', 'details', 'visit_at'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function animal(): BelongsTo
    {
        return $this->BelongsTo(Animal::class);
    }
}
