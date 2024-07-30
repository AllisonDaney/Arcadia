<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{


    protected $fillable = [
        'day',
        'opening_time', 
        'closing_time'
    ];
}
