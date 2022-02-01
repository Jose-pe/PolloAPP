<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreplatillo',
        'tamanio',
        'descripcion',
        'precio',

    ];
    public function detallepedidos(){
        return $this->hasMany(DetallePedido::class, 'idplatillo', 'id');
    }
}
