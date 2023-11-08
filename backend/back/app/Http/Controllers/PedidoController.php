<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\LiniaPedido;
use Illuminate\Support\Facades\DB;



class PedidoController extends Controller
{
    //


public function ddgetpedidos(Request $request)
{
    $data = $request->all(); // Obtener datos de la solicitud

	return (dd($data));
}



public function getPedidos(Request $request)
    {

        $jsonData = $request->json()->all();
        
        
        DB::beginTransaction();

        try {
            $comanda = $jsonData['comanda'];
            $pedidos = new Pedido();
            $pedidos->status = "En preparacion";
            $pedidos->codi_postal = $comanda['codi_postal'];
            $pedidos->direccio = $comanda['direccio'];
            $pedidos->ciutat = $comanda['ciutat'];
            $pedidos->pais = $comanda['pais'];
            $pedidos->namecli = $comanda['namecli'];
            
            $pedidos->save();
        
            $pedidoId = $pedidos->id;
        
            foreach ($jsonData['carret'] as $item) {
                $lp = new LiniaPedido();
                $producto = Producto::find($item['id']);
                $lp->unit_price = $producto->price;
                $lp->quantitat = abs($item['carro']); 
                $lp->pedido_id = $pedidoId; 
                $lp->name_producto = $producto->name;
                $lp->producto_id = $item['id'];
	
                $lp->save();
            }
        
            DB::commit();
        
            $response = [
                'success' => "true",
                'message' => 'Ticket y pedidos guardados correctamente.'
            ];
        
        } catch (\Exception $e) {
            DB::rollback();
            $response = [
                'success' => "false",
                'message' => 'Error al procesar el pedido. Por favor, intentelo de nuevo.'
            ];
        }
        
        return response()->json($response);
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
