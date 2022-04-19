<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nro',    
        'fecha',
        'total',          
        'iduser',   
        'idpedido',
    ];
    public function users(){
        return $this->belogsTo(User::class, 'iduser', 'id');
    }
    public function pedidos(){
        return $this->belongsTo(Pedido::class, 'idpedido', 'id');
    }
}
