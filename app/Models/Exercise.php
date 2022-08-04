<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_exercise';

    protected $fillable = [
        'nome',
        'categoria',
        'difficolta',
        'calorie_perse',
    ];
}
