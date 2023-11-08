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

### 3.1.3 Laravel, rebre informació de la BD

    // retorna un json de todos los productos de la bd en phpmyadmin
    Route::get('/getJsonProductos', [ProductoController::class, 'giveJsonProductosData']);
    // retorna un json de todos los pedidos de la bd en phpmyadmin
    Route::get('/getJsonPedidos', [PedidoController::class, 'giveJsonPedidosData']);
    // retorna u njson de todos los usuaris de la bd en phpmyadmin
    Route::get("/getJsonUsers", [UserController::class, "giveJsonUsersData"]);
    // retorna un json de todos los linia de pedidos de la bd en phpmyadmin
    Route::get("/getJsonLiniaPedidos", [LiniaPedidoController::class, "giveJsonLiniaPedidoData"]);

### 3.1.4 Laravel, per a la creació de tokens (exemple de clau secret)
    PLAIN_TEXT_TOKEN_SECRET=abcdaabbccddddccbbaa
### 3.1.5 Laravel, capacitat CRUD per Admins
#### 3.1.5.1 Rutes
    // CRUD PRODUCTO (ADMIN)
    Route::post("/update_producto/{id}", [ProductoController::class, "update_producto"]);
    Route::post("/destroy_producto/{id}", [ProductoController::class, "destroy_producto"]);
    Route::get("/create-producto", [ProductoController::class, "show_create_producto"]);
    Route::post("/save-producto", [ProductoController::class, "save_producto"]);
    // CRUD PEDIDO (ADMIN)
    Route::post("/update_pedido/{id}", [PedidoController::class, "update_pedido"]);
    Route::post("/destroy_pedido/{id}", [PedidoController::class, "destroy_pedido"]);
    Route::get("/create-pedido", [PedidoController::class, "show_create_pedido"]);
    Route::post("/save-pedido", [PedidoController::class, "save_pedido"]);
    
#### 3.1.5.1 Funcions CRUD (de productes)  

    public function show_create_producto()
    {
        return view('botiga.create-producto');
    }
    
    public function save_producto(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image_url' => 'required',
            //'desc' => 'required',
        ]);
        Producto::create($request->all());
        return view('botiga.create-producto');
    }

    public function store_producto(Request $request)
    {
        Producto::create($request->all());
        return redirect('botiga.showProductosAdmin');
    }

    public function update_producto(Request $request, $id)   
    {
        $producto = Producto::find($id);
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image_url' => 'required',
                //'desc' => 'required',
            ]);
            $producto->update($request->all());
            return redirect('showProductosAdmin');
    }

    public function destroy_producto($id)
    {
        Producto::find($id)->delete();
        return redirect('showProductosAdmin');
    }


### 3.2 API / ENDPOINTS

    Per agafar tots els productes de la BD:
        http://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonProductos

    Per agafar totes les comandes de la BD
        http://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonPedidos
      
    Per agafar tots els usuaris de la BD
        http://autoplanet.daw.inspedralbes.cat/1-dawtr1g6/public/api/getJsonUsers

### 3.3 Model de EXEMPLE de BBDD (phpmyadmin)

    CREATE TABLE productos (
        id INT PRIMARY KEY AUTO_INCREMENT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        name VARCHAR(255) NOT NULL,
        stock INT (100) NOT NULL,
        price INT NOT NULL,
        imatge_url VARCHAR(255) NOT NULL
    );
    
    CREATE TABLE users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        remember_token VARCHAR(100)
    );
    
    CREATE TABLE pedidos (
        id INT PRIMARY KEY AUTO_INCREMENT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        status VARCHAR(255) NOT NULL,
        sumatori INT NOT NULL,
    );
    
    CREATE TABLE linia_de_pedidos (
        id INT PRIMARY KEY AUTO_INCREMENT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        unit_price DECIMAL(10,2) NOT NULL,
        quantitat INT(11) NOT NULL,
        sumatori DECIMAL(10,2) NOT NULL,
        pedido_id INT,
        user_id INT,
        FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

### 3.4 Laravel, extensions
    Per a la generació de Qr's:
        composer require simplesoftwareio/simple-qrcode
        composer require barryvdh/laravel-dompdf

## 4. Instruccions per seguir codificant el projecte
FALTA POR HACER






