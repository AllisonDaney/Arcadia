<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VeterinariansReport extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function animal(): BelongsTo
    {
        return $this->BelongsTo(Animal::class);
    }
}
