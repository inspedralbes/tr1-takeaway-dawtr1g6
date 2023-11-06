<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\LiniaPedido;



class PedidoController extends Controller
{
    //

    public function getPedidos(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['pedidos'] as $item) {

            $pedidos = new Pedido();
            $pedidos->status = $item['status'];
            $pedidos->sumatori = $item['sumatori'];
            $pedidos->codi_postal = $item['codi_postal'];
            $pedidos->direccio = $item['direccio'];
            $pedidos->ciutat = $item['ciutat'];
            $pedidos->pais = $item['pais'];
            $pedidos->namecli = $item['namecli'];
            $pedidos->save();
        }

        foreach ($jsonData['productos'] as $item) {
            $lp = new LiniaPedido();
            $producto = Producto::find($item['producto_id']);
            $lp->unit_price= $item['unit_price'];
            $lp->quantitat=$item['quantitat'];
            if($item['quantitat']<0){
                $item['quantitat'] = abs($item['quantitat']);
            }
            $lp->pedido_id= $pedidos->id;
            $lp->name_producto=$producto->name;
            $lp->producto_id=$item['producto_id'];
            $lp->save();
        }


        $response = [
            'success' => true,
            'message' => 'Ticket y pedidos guardados correctamente.'
        ];


        return ($response);
    }
    public function showPedidos()
    {
        $pedidos = Pedido::all();
        return view('botiga.showPedidos', compact('pedidos'));
    }


    public function giveJsonPedidosData()
    {
        $pedidos['pedidos'] = Pedido::all();
        return json_encode($pedidos, JSON_PRETTY_PRINT);

    }



    public function showPedido_item(Request $request)
    {

        // $request deberia de ser la id del usuario ...
        $pedidos = Pedido::find($request->id);

        return view('botiga.showPedido-item', compact('pedidos'));

    }

    public function showPedido_itemNA(Request $request)
    {

        // $request deberia de ser la id del usuario ...
        $pedidos = Pedido::find($request->id);

        return view('botiga.showPedido-itemNA', compact('pedidos'));

    }


    public function show_create_pedido()
    {
        return view('botiga.create-pedido');
    }

    public function save_pedido(Request $request)
    {

        $request->validate([
            'sumatori' => 'required',
            'status' => 'required',
        ]);

        Pedido::create($request->all());

        return view('botiga.create-pedido');

    }
    public function update_pedido(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $request->validate([
            'status' => 'required',
            'sumatori' => 'required',
        ]);

        $pedido->update($request->all());

        return redirect('showPedidosAdmin');

    }

    public function destroy_pedido($id)
    {
        Pedido::find($id)->delete();
        return redirect('showPedidosAdmin');
    }




    public function showPedidosAdmin()
    {
        $pedidos = Pedido::all();
        return view('botiga.showPedidosAdmin', compact('pedidos'));
    }

}
