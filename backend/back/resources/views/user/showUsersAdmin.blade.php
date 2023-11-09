<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <div class="container">
        <h1 class="title"></h1>
        <div class="buttons">
            <a href="{{ url('create-user') }}" class="button is-primary">Crear Usuario</a>
        </div>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>CRUD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->rol}}</td>
                    <td><a href="{{ url('showUser-item/' . $user->id) }}" class="button is-primary">Ver detalles</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
