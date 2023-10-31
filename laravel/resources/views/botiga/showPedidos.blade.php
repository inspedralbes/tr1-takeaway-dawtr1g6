<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Pedidos</title>

</head>

<body>


    @foreach ($pedidos as $pedido)
        <div class="pedido">

            <div class="detalle-pedido">
                <p><strong>Estado del Pedido:</strong> {{ $pedido->status }}</p>
                <p><strong>Total:</strong> ${{ $pedido->sumatori }}</p>
                <a class="btn" href ="{{ url('showPedido-item/' . $pedido->id) }} ">Ver detalles</a>
            </div>

        </div>
    @endforeach
    <style>
        body {
            background-color: whitesmoke;
        }
        .btn{
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
