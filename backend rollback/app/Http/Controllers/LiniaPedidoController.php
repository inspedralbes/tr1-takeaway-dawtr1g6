<?php

namespace App\Http\Controllers;

use App\Models\LiniaPedido;
use Illuminate\Http\Request;

class LiniaPedidoController extends Controller
{
    //


    public function getLiniaPedidos(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['liniaPedido'] as $item) {
            $liniaPedido = new LiniaPedido();
            $liniaPedido->unit_price = $item['unit_price'];
            $liniaPedido->quantitat = $item['quantitat'];
            $liniaPedido->pedido_id = $item['pedido_id'];
            $liniaPedido->producto_id= $item['producto_id'];
            $liniaPedido->user_id = $item['user_id'];
            $liniaPedido->name_producto = $item['name_producto'];
            $liniaPedido->save();
        }

        $response = [
            'success' => true,
            'message' => 'Linea de Pedidos guardado Correctamente.'
        ];

        return ($response);
    }

  
    public function giveJsonLiniaPedidoData()
    {
        $liniapedidos = LiniaPedido::all();
        return json_encode($liniapedidos, JSON_PRETTY_PRINT);
    }



}
