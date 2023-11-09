<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Catálogo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">


	
</head>

<body>

<div class="container mt-5">
    <table class="table is-fullwidth is-hoverable">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td><img src="{{ $producto->image_url }}" alt="Product Image" style="max-width: 100px;"></td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>${{ $producto->price }}</td>
                    <td><a href="{{ url('showProducto-itemNA/' . $producto->id) }}" class="button is-primary">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




</body>

</html>
