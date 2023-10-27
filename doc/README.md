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

    Per a crear productes (json dins d'array "productos"):
    Route::post("/getProductos" , [ProductoController::class,"getProductos"]);

    Per a crear comandes (json dins d'array "pedidos"):
    Route::post("/getPedidos" , [PedidoController::class,"getPedidos"]);


    Per a crear usuaris: (json dins d'array "users"):
    Route::post("/getUsers", [UserController::class, "getUsers"]);

    Per a crear linias de comandes: (json dins d'array "liniaPedido"):
    Route::post("/getLiniaPedidos", [LiniaPedidoController::class,"getLiniaPedidos"])
    

### 3.2 Vue Fetchs's


    Per agafar tots els productes de la BD:
        hhtp://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonProductos

    Per agafar totes les comandes de la BD
        hhtp://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonPedidos
      
    Per agafar tots els usuaris de la BD
        hhtp://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonUsers
      



## 4. Instruccions per seguir codificant el projecte
FALTA POR HACER

eines necessaries i com es crea l'entorn per que algú us ajudi en el vostre projecte.

## 5. API / Endpoints / punts de comunicació
FALTA POR HACER

Heu d'indicar quins són els punts d'entrada de la API i quins són els JSON que s'envien i es reben a cada endpoint
