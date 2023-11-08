<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD users</title>
</head>
<body>
    {{$users->id}}
    {{$users->name}}
    {{$users->email}}
    {{$users->rol}}

    <form action="/update_producto/{{$users->id}}" method="POST" enctype="multipart/form-data">
    
    
    
    </form>
</body>
</html>