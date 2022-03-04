<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'totalapagar',       
        'estado',
        'idmesa',
        'iduser'
        
    ];

    public function detallepedidos(){
        return $this->hasMany(DetallePedido::class, 'idpedido', 'id');
    }
    public function mesas(){
        return $this->belogsTo(Mesa::class, 'idmesa', 'id');
    }
    public function iduser(){
        return $this->belogsTo(User::class, 'iduser', 'id');
    }
}
