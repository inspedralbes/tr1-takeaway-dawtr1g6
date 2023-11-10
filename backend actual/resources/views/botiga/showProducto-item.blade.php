<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>showProducto-item</title>
</head>

<body>

   <div class="container mt-5">
    <div class="columns is-multiline">
        <div class="column is-half">
            <div class="producto">
                <h2 class="title is-4">{{ $productos->name }}</h2>
                <p><strong>Stock:</strong> {{ $productos->stock }}</p>
                <p><strong>Precio:</strong> ${{ $productos->price }}</p>
                <!--
                <p><strong>Precio:</strong> ${{ $productos->desc }}</p>
                -->
            </div>
        </div>
        <div class="column is-half">
            <form action="/update_producto/{{ $productos->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $productos->id }}">
                <div class="field">
                    <label class="label" for="name">Nombre del producto</label>
                    <div class="control">
                        <input class="input" type="text" id="name" name="name" value="{{ $productos->name }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="price">Precio del producto:</label>
                    <div class="control">
                        <input class="input" type="number" id="price" step="any" name="price" min="1" max="10000" value="{{ $productos->price }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="stock">Stock del producto:</label>
                    <div class="control">
                        <input class="input" type="number" id="stock" step="any" name="stock" min="1" max="999" value="{{ $productos->stock }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="image_url">URL del producto:</label>
                    <div class="control">
                        <input class="input" type="text" id="image_url" name="image_url" value="{{ $productos->image_url }}">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="button is-primary" type="submit" value="Actualizar Producto">
                    </div>
                </div>
            </form>

            <form action="/destroy_producto/{{ $productos->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $productos->id }}">
                <div class="field">
                    <div class="control">
                        <input class="button is-danger" type="submit" value="Eliminar Producto">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</body>

</html>
