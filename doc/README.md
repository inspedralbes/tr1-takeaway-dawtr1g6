# Documentació bàsica del projecte

## 1. Instruccions per crear un entorn de desenvolupament

### (FALTA POR HACER)

## 2. Misc

### 2.1 Eines

    Visual Studio Code
    Laravel
    Xammp
    Phpmyadmin

### 2.2 Plugins (VSC)

    Miscrosoft Preview
    Postman

## 3. Instruccions per desplegar el projecte a producció

### 3.1 Laravel, conexions

    .env (Conexió amb el labs)

    DB_HOST=daw.inspedralbes.cat
    DB_PORT=3306
    DB_DATABASE=a20artreymor_autoplanet
    DB_USERNAME=a20artreymor_autoplanet
    DB_PASSWORD=Autoplanet1

    .env (Conexió a localhost)

    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=dawtr1g6_db
    DB_USERNAME=root
    DB_PASSWORD=

### 3.1.2 Laravel, enviar informació a la DB

    A través de PostMan + un json, les funcions agafen el json y els seus atributs, i, per cada item, genera una nova instància adequada.

    PRODUCTES (json dins d'array "productos"):
    Route::post("/getProductos" , [ProductoController::class,"getProductos"]);

    COMANDES (json dins d'array "pedidos"):
    Route::post("/getPedidos" , [PedidoController::class,"getPedidos"]);
    
    USUARIS (json dins d'array "users"):
    Route::post("/getUsers", [UserController::class, "getUsers"]);

    LINIA DE COMANDES: (json dins d'array "liniaPedido"):
    Route::post("/getLiniaPedidos", [LiniaPedidoController::class,"getLiniaPedidos"])
    

### 3.2 Vue, fetchs

    Per agafar tots els productes de la BD:
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getJsonProductos
        Exemple a doc/getPedidos.json

    Per agafar totes les comandes de la BD
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getJsonPedidos
        Exemple a doc/getProductos.json

    Per agafar les comandes d'un usuari determinat
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/listaPedidosUser
        -> a partir d'un token
        

    

## 4. Instruccions per seguir codificant el projecte
    ### A partir d'ISSUES al nostre repository de github: https://github.com/inspedralbes/tr1-takeaway-dawtr1g6
       






