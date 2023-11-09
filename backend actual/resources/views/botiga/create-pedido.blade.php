<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

</head>
<body>


    <br><br>
    <div class="container">
        <form action="/save-pedido" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->
            
            <div class="field">
                <label class="label" for="namecli">Name:</label>
                <div class="control">
                    <input class="input" type="text" id="namecli" name="namecli" required>
                </div>
            </div>
    
    
            <div class="field">
                <label class="label" for="status">Status:</label>
                <div class="control">
                    <input class="input" type="text" id="status" name="status" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="sumatori">Sumatori:</label>
                <div class="control">
                    <input class="input" type="text" id="sumatori" name="sumatori" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="codi_postal">Postal Code:</label>
                <div class="control">
                    <input class="input" type="text" id="codi_postal" name="codi_postal" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="direccio">Address:</label>
                <div class="control">
                    <input class="input" type="text" id="direccio" name="direccio" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="ciutat">City:</label>
                <div class="control">
                    <input class="input" type="text" id="ciutat" name="ciutat" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="pais">Country:</label>
                <div class="control">
                    <input class="input" type="text" id="pais" name="pais" required>
                </div>
            </div>
    
            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <a href="{{ url('showPedidosAdmin') }}" class="button is-info">Mostrar Pedidos</a>

    </div>

    

</body>
</html>