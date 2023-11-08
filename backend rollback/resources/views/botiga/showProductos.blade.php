<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>



    <div class="container mt-5">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{ $producto->image_url }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->name }}</h5>
                            <p class="card-text">Stock: {{ $producto->stock }}</p>
                            <p class="card-text">Precio: ${{ $producto->price }}</p>
                            <!--
                            <p class="card-text">Precio: ${{ $producto->desc }}</p>
                             -->
                            <a class="btn btn-primary" href ="{{ url('showProducto-itemNA/' . $producto->id) }} ">Ver
                                detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
