<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complemento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombrecomplemento',
        'tamanio',
        'precio',
    ];
}
