<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Catálogo Admin</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>

<body>
    
<div class="container mt-5">
    <table class="table is-fullwidth is-hoverable">
        <div class="buttons">
            <a href="{{ url('create-producto') }}" class="button is-primary">Crear Producto</a>
        </div>
        
        <thead>
            <tr>
		<th>Id</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
  	            <td>{{$producto->id}}</td>
                    <td><img src="{{ $producto->image_url }}" alt="Product Image" style="max-width: 100px;"></td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>${{ $producto->price }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td><a href="{{ url('showProducto-item/' . $producto->id) }}" class="button is-primary">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

</html>
