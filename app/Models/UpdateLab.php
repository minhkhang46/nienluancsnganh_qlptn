<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateLab extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUser',
        'idPTN',
        'quantity',
        'update_time',
        'date',
    ];
}
