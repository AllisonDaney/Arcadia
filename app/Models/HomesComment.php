<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomesComment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function home(): BelongsTo
    {
        return $this->BelongsTo(Home::class);
    }
}
