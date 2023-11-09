<?php

namespace App\Http\Controllers;

use App\Models\LiniaPedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class LiniaPedidoController extends Controller
{
    //


    public function getLiniaPedidos(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['liniaPedido'] as $item) {
            $liniaPedido = new LiniaPedido();
            $producto = Producto::find($item['producto_id']);

            $liniaPedido->unit_price = $producto->price;
            $liniaPedido->quantitat = $item['quantitat'];
            if($item['quantitat']<0){
                $item['quantitat'] = abs($item['quantitat']);
            }
            $liniaPedido->pedido_id = $item['pedido_id'];
            $liniaPedido->producto_id= $item['producto_id'];
            $liniaPedido->user_id = $item['user_id'];
            $liniaPedido->name_producto = $producto->name;
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
