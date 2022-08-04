<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contains extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_scheda',
        'id_exercise',
        'ripetizioni',
    ];
}
