<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear pedido</title>
</head>
<body>

    <form action="/save-pedido" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="sumatori">Sumatori del pedido</label>
        <input type="number" id="email" step="any" name="sumatori"  min="1" max="10000"><br><br>
        <label for="status">Estado del pedido</label>
        <input type="text" id="status" name="status"><br><br>
       

        <input type="submit" value="crear_pedido">
    
    </form>
    <a href="{{ url('showPedidosAdmin') }}"><button>Mostrar Pedidos</button></a>

</body>
</html>