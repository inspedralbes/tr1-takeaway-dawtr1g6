<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>
</head>

<body>

    <form action="/save-producto" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Nom del producte</label>
        <input type="text" id="email" name="name"><br><br>
        <label for="price">Preu del producte:</label>
        <input type="number" id="price" step="any" name="price" min="1" max="10000"><br><br>
        <label for="stock">Stock del producte:</label>
        <input type="number" id="stock" step="any" name="stock" min="1" max="999"><br><br>
        <label for="image_url">Url del producte:</label>
        <input type="text" id="image_url" name="image_url"><br><br>
        <!--
        <label for="desc">Descripció del producte:</label>
        <textarea id="desc" name="desc" rows="6" cols="100">
        --->
        <input type="submit" value="crear_producto">

    </form>
    <a href="{{ url('showProductosAdmin') }}"><button>Mostrar Productos</button></a>

</body>

</html>
