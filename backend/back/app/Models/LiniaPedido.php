<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiniaPedido extends Model
{
    use HasFactory;

    protected $table = 'linia_de_pedidos';
    protected $fillable = [
        "unit_price",
        "quantitat",
        "pedido_id",
        "name_producto",
        "producto_id"
    ];
}
