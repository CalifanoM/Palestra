<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_monitoraggio';

    protected $fillable = [
        'girovita',
        'petto',
        'bicipite',
        'girocoscia',
        'id_user',
    ];
}
