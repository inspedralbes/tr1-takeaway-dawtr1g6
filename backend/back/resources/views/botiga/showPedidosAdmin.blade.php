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
<div class="container mt-5">
    <table class="table is-fullwidth is-hoverable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado del Pedido</th>
                <th>Total</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>${{ $pedido->sumatori }}</td>
                    <td><a class="button is-primary" href="{{ url('showPedido-item/' . $pedido->id) }}">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</body>

</html>
