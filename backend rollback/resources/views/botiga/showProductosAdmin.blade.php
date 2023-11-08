<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Catálogo Admin</title>
</head>

<body>


    @foreach ($productos as $producto)
        <div class="producto">
            <img src="{{ $producto->image_url }}" alt="Product Image">
            <h3>Nom: {{ $producto->name }}</h3>
            <h3>Stock: {{ $producto->stock }}</h3>
            <h3>Precio: ${{ $producto->price }}</h3>
            <a href ="{{ url('showProducto-item/' . $producto->id) }} ">Ver detalles</a>
        </div>
    @endforeach


    

    <style>
        body {
            background-color: whitesmoke;
        }

        .producto {
            background-color: #F27405;
            ;
            border: 2px solid black;
            border-radius: 8px;
            padding: 16px;
            font-size: 20px;
            margin: 16px;
            width: 300px;
            text-align: center;
            color: white;
        }

        .producto img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .producto h3 {
            font-size: 1.2em;
            margin-bottom: 8px;
        }

        .producto p {
            font-size: 1em;
            margin-bottom: 6px;
        }
        a{
            text-decoration: none;
        }

        .producto strong {
            font-weight: bold;
            margin-right: 4px;
        }

        /* Estilos adicionales según tus preferencias */
    </style>

</body>

</html>
