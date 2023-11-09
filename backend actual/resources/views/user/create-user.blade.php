<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Form with Bulma</title>
</head>

<body>
    <div class="container">
        <form action="/store-user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Enter your name" name="name">
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" placeholder="Enter your email" name="email">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" placeholder="Enter your password" name="password">
                </div>
            </div>

            <div class="field">
                <label class="label">Role</label>
                <div class="control">
                    <div class="select">
                        <select name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <a href="{{ url('showUsersAdmin') }}" class="button is-info">Mostrar Usuarios</a>

    </div>
</body>

</html>
