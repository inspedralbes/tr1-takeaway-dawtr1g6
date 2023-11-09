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
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <div class="box">
                <table class="table is-fullwidth">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $pedidos->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre Cliente</th>
                            <td>{{ $pedidos->namecli }}</td>
                        </tr>
                        <tr>
                            <th>ID Usuario</th>
                            <td>{{ $pedidos->user_id }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>{{ $pedidos->status }}</td>
                        </tr>
                        <tr>
                            <th>Suma Total</th>
                            <td>${{ $pedidos->sumatori }}</td>
                        </tr>
                        <tr>
                            <th>Código Postal</th>
                            <td>{{ $pedidos->codi_postal }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $pedidos->direccio }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $pedidos->ciutat }}</td>
                        </tr>
                        <tr>
                            <th>País</th>
                            <td>{{ $pedidos->pais }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
            <label class="label" for="codi_postal">Código Postal:</label>
            <div class="control">
                <input class="input" type="text" id="codi_postal" name="codi_postal" value="{{ $pedidos->codi_postal }}">
            </div>
        </div>
    
        <div class="field">
            <label class="label" for="direccio">Dirección:</label>
            <div class="control">
                <input class="input" type="text" id="direccio" name="direccio" value="{{ $pedidos->direccio }}">
            </div>
        </div>
    
        <div class="field">
            <label class="label" for="ciutat">Ciudad:</label>
            <div class="control">
                <input class="input" type="text" id="ciutat" name="ciutat" value="{{ $pedidos->ciutat }}">
            </div>
        </div>
    
        <div class="field">
            <label class="label" for="pais">País:</label>
            <div class="control">
                <input class="input" type="text" id="pais" name="pais" value="{{ $pedidos->pais }}">
            </div>
        </div>
    
        <div class="field is-grouped">
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
