<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Mis Pedidos</title>

</head>

<body>


    <div class="pedido">
        <div class="detalle-pedido">
            <p>Id del Pedido: {{ $pedidos->id }}</p>
            <p><strong>Estado del Pedido:</strong> {{ $pedidos->status }}</p>
            <p><strong>Total:</strong> ${{ $pedidos->sumatori }}</p>
        </div>
    </div>

    <form action="/update_pedido/{{ $pedidos->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $pedidos->id }}">
        <label for="status">Estado del Pedido:</label>
        <input type="text" id="status" name="status"><br><br>
        <label for="sumatori">Sumatori del Pedido:</label>
        <input type="number" id="sumatori" step="any" name="sumatori" min="1" max="10000"><br><br>
      
        <input type="submit" value="Updatear pedido">
    
    </form>

    <form action="/destroy_pedido/{{ $pedidos->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $pedidos->id }}">
      
        <input type="submit" value="Destroy Pedido">
    
    </form>


    

    <style>
        body {
            background-color: whitesmoke;
        }

        .btn {
            background-color: rgb(255, 197, 5);
            text-decoration: none;
            color: black;
            padding: 2%;
            border-radius: 50px;
            margin-top: 10px;

        }

        .pedido {
            background-color: #F27405;
            flex-wrap: wrap;
            border: 2px solid black;
            border-radius: 8px;
            padding: 16px;
            font-size: 20px;
            margin: 10px;
            width: 300px;
            text-align: center;
            color: white;

        }

        .detalle-pedido p {

            font-size: 1em;

        }

        .producto strong {
            font-weight: bold;

        }


        /* Otros estilos según tus preferencias */
    </style>


</html>
