<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>showProducto-itemNA</title>
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
