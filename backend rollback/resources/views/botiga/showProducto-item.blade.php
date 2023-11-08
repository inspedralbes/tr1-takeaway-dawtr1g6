<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>showProducto-item</title>
</head>

<body>

    <div class="producto">
        <img src="{{ $productos->image_url }}" alt="{{ $productos->name }}">
        <h2>{{ $productos->name }}</h2>
        <p><strong>Stock:</strong> {{ $productos->stock }}</p>
        <p><strong>Precio:</strong> ${{ $productos->price }}</p>
        <!--
        <p><strong>Precio:</strong> ${{ $productos->desc }}</p>
        -->
    </div>


    <form action="/update_producto/{{ $productos->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $productos->id }}">
        <label for="name">Nom del producte</label>
        <input type="text" id="name" name="name"><br><br>
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

        <input type="submit" value="Updatear Producto">
    
    </form>

    <form action="/destroy_producto/{{ $productos->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $productos->id }}">
      
        <input type="submit" value="Destroy Producto">
    
    </form>



    <style>
        body {
            background-color: whitesmoke;
        }

        .producto {
            background-color: #F27405;
            ;
            border: 2px solid black;
            border-radius: 8px;
            padding: 16px;
            font-size: 20px;
            margin: 16px;
            width: 300px;
            text-align: center;
            color: white;
        }

        .producto img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .producto h2 {
            font-size: 1.2em;
            margin-bottom: 8px;
        }

        .producto p {
            font-size: 1em;
            margin-bottom: 6px;
        }

        .producto strong {
            font-weight: bold;
            margin-right: 4px;
        }

        /* Estilos adicionales según tus preferencias */
    </style>




</body>

</html>
