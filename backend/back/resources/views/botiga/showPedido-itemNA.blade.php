<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Mis Pedidos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

</head>

<body>

<div class="container mt-5">
    <div class="box">
        <div class="pedido">
            <div class="detalle-pedido">
                <p><strong>Id del Pedido:</strong> {{ $pedidos->id }}</p>
                <p><strong>Estado del Pedido:</strong> {{ $pedidos->status }}</p>
                <p><strong>Total:</strong> ${{ $pedidos->sumatori }}</p>
            </div>
        </div>
    </div>
</div>


</html>
