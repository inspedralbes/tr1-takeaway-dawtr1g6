<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>showProducto-itemNA</title>
</head>

<body>
<div class="container mt-5">
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-128x128">
                                <img src="{{ $productos->image_url }}" alt="{{ $productos->name }}">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">{{ $productos->name }}</p>
                            <p><strong>Stock:</strong> {{ $productos->stock }}</p>
                            <p><strong>Precio:</strong> ${{ $productos->price }}</p>
                            <!--
                            <p><strong>Precio:</strong> ${{ $productos->desc }}</p>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
