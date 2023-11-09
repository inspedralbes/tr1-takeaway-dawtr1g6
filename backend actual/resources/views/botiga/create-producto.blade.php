<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>
</head>

<body>

    <div class="container">
        <form action="/save-producto" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="field">
                <label class="label" for="name">Nom del producte</label>
                <div class="control">
                    <input class="input" type="text" id="name" name="name" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="categoria">Categoria (berlina deportivo suv compacto)</label>
                <div class="control">
                    <input class="input" type="text" id="categoria" name="categoria" required>
                </div>
            </div>

            
    
            <div class="field">
                <label class="label" for="price">Preu del producte:</label>
                <div class="control">
                    <input class="input" type="number" id="price" step="any" name="price" min="1" max="10000" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="stock">Stock del producte:</label>
                <div class="control">
                    <input class="input" type="number" id="stock" step="any" name="stock" min="1" max="999" required>
                </div>
            </div>
    
            <div class="field">
                <label class="label" for="image_url">Url del producte:</label>
                <div class="control">
                    <input class="input" type="text" id="image_url" name="image_url" required>
                </div>
            </div>
    
            <!-- Si deseas incluir la descripción -->
            <!-- <div class="field">
                <label class="label" for="desc">Descripció del producte:</label>
                <div class="control">
                    <textarea class="textarea" id="desc" name="desc" rows="6" cols="100"></textarea>
                </div>
            </div> -->
    
            <div class="field is-grouped">
                <div class="control">
                    <input class="button is-primary" type="submit" value="Crear Producto">
                </div>
            </div>
        </form>
    
        <a href="{{ url('showProductosAdmin') }}" class="button is-info">Mostrar Productos</a>
    </div>
    

</body>

</html>
