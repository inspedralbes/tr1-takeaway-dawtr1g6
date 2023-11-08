<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected $table = 'pedidos';
    protected $fillable = [
        "status",
        "sumatori",
        "codi_postal",
        "direccio",
        "ciutat",
        "pais",
        "namecli",
        "user_id",
    ];
}
