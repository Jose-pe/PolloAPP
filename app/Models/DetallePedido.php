<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable =[
        'idpedido',
        'idplatillo',
        'idbebida',
        'idcomplemento',
        'cantidad',
        'subtotal',
    ];
    public function pedidos(){
        return $this->belogsTo(Pedido::class, 'idpedido', 'id' );
    }

    public function platillos(){
        return $this->belongsTo(Platillo::class, 'idplatillo', 'id');
    }
    public function bebidas(){
        return $this->belongsTo(Bebida::class, 'idbebida', 'id');
    }
    public function complementos(){
        return $this->belongsTo(Complemento::class, 'idcomplemento', 'id');
    }
    
}
