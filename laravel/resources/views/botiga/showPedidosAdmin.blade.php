<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Pedidos Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <style>
        .container {

            max-width: 1200px;
            margin: 0 auto;
            margin-top: 10% padding: 0 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 300px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-bottom: 10px;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            @foreach ($pedidos as $pedido)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Estado del Pedido: {{ $pedido->status }}</p>
                            <p class="card-text">Total: ${{ $pedido->sumatori }}</p>
                        </div>
                        <a class="btn btn-primary" href ="{{ url('showPedido-item/' . $pedido->id) }} ">Ver detalles</a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>


</body>

</html>
