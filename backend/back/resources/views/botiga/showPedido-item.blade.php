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

        <form action="/update_pedido/{{ $pedidos->id }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <input type="hidden" name="id" value="{{ $pedidos->id }}">
            <div class="field">
                <label class="label" for="status">Estado del Pedido:</label>
                <div class="control">
                    <input class="input" type="text" id="status" name="status" value="{{ $pedidos->status }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="sumatori">Sumatori del Pedido:</label>
                <div class="control">
                    <input class="input" type="number" id="sumatori" step="any" name="sumatori" min="1" max="10000" value="{{ $pedidos->sumatori }}">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="button is-primary" type="submit" value="Actualizar pedido">
                </div>
            </div>
        </form>

        <form action="/destroy_pedido/{{ $pedidos->id }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <input type="hidden" name="id" value="{{ $pedidos->id }}">
            <div class="field">
                <div class="control">
                    <input class="button is-danger" type="submit" value="Eliminar Pedido">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
