<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">


</head>
<body>
  

    <form action="/update_user/{{$users->id}}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Agrega el token CSRF para proteger el formulario -->
    
        <input type="hidden" name="id" value="{{ $users->id }}">

    
        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{$users->name}}">
            </div>
        </div>
    
        <div class="field">
            <label class="label">Correo Electrónico</label>
            <div class="control">
                <input class="input" type="email" name="email" value="{{$users->email}}">
            </div>
        </div>
    
        <div class="field">
            <label class="label">Rol</label>
            <div class="control">
                <input class="input" type="text" name="rol" value="{{$users->rol}}">
            </div>
        </div>
    
        <!-- Puedes agregar más campos según tus necesidades, como archivos, etc. -->
    
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" type="submit">Actualizar</button>
            </div>
        </div>
    </form>

    <form action="/destroy_user/{{ $users->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $users->id }}">
        <div class="field">
            <div class="control">
                <input class="button is-danger" type="submit" value="Eliminar Usuario">
            </div>
        </div>
    </form>

    
</body>
</html>