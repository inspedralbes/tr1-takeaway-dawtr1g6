<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Pedidos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>

<body>


<div class="container mt-5">
    <table class="table is-fullwidth is-hoverable">
        <thead>
            <tr>
                <th>Estado del Pedido</th>
                <th>Total</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->status }}</td>
                    <td>${{ $pedido->sumatori }}</td>
                    <td><a class="button is-primary" href="{{ url('showPedido-itemNA/' . $pedido->id) }}">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



</body>

</html>
