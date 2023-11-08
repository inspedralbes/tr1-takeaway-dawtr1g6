<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // PILLA DE UN JSON SU DATA Y CORRECTAMENTE LA INTRODUCE A LA BD
    public function getProductos(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['productos'] as $item) {
            $producto = new Producto();
            $producto->name = $item['name'];
            $producto->price = $item['price'];
            // $producto->desc = $item['desc'];
            $producto->image_url = $item['image_url'];
            $producto->stock = $item['stock'];
            $producto->save();
        }

        $response = [
            'success' => true,
            'message' => 'Productos guardados correctamente.'
        ];

        return ($response);


    }


    // MUESTRA CORRECTAMENTE LOS PRODUCTOS DE LA BD 
    public function showProductos()
    {
        $productos = Producto::all();

        return view('botiga.showProductos', compact('productos'));
    }


    public function showProducto_item(Request $request)
    {

        $productos = Producto::find($request->id);

        return view('botiga.showProducto-item', compact('productos'));
    }
    public function showProducto_itemNA(Request $request)
    {

        $productos = Producto::find($request->id);

        return view('botiga.showProducto-itemNA', compact('productos'));
    }


    public function showProductosAdmin()
    {
        $productos = Producto::all();

        return view('botiga.showProductosAdmin', compact('productos'));
    }


    public function giveJsonProductosData()
    {
        $productos['productos'] = Producto::all();
        return json_encode($productos, JSON_PRETTY_PRINT);

    }

    public function show_create_producto()
    {
        return view('botiga.create-producto');
    }

    public function save_producto(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image_url' => 'required',
            //'desc' => 'required',
        ]);

        Producto::create($request->all());

        return view('botiga.create-producto');

    }

    public function store_producto(Request $request)
    {
        Producto::create($request->all());
        return redirect('botiga.showProductosAdmin');
    }

    public function update_producto(Request $request, $id)
    {
        $producto = Producto::find($id);

       
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image_url' => 'required',
                //'desc' => 'required',
            ]);
          

            $producto->update($request->all());

            return redirect('showProductosAdmin');
        
    }


    public function destroy_producto($id)
    {
        Producto::find($id)->delete();
        return redirect('showProductosAdmin');
    }
}
