<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombrebebida',
        'tamanio',
        'precio',
    ];
    public function detallepedidos(){
        return $this->hasMany(DetallePedido::class, 'idbebida', 'id');
    }
    
}
