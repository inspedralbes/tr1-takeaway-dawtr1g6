# Documentació bàsica del projecte

## 1. Instruccions per crear un entorn de desenvolupament

### PHP: Assegureu-vos de tenir PHP instal·lat al vostre sistema. Podeu descarregar PHP des del seu lloc web oficial..

### Composer: Composer és una eina de gestió de dependències per a PHP. Podeu instal·lar-lo seguint les instruccions del seu lloc web oficial: Composer Installation.

### Servidor de bases de dades: Podeu utilitzar un servidor de bases de dades com MySQL o PostgreSQL. Assegureu-vos que el servidor de bases de dades estigui instal·lat i en funcionament al vostre sistema.

### Instal·lar Laravel:
    Utilitzeu Composer per crear un nou projecte de Laravel. Executeu aquesta comanda al vostre terminal o línia de comandes:
    composer create-project --prefer-dist laravel/laravel nom_del_projecte
    
    Això crearà un nou projecte Laravel amb el nom especificat a la carpeta nom_del_projecte.
    
### Configurar el fitxer .env:
    Dupliqueu l'arxiu .env.example i canvieu el nom a .env. Configureu la vostra connexió a la base de dades, entre d'altres configuracions, dins d'aquest fitxer. Podeu executar la comanda php artisan key:generate per       generar una clau d'aplicació aleatòria.

    DB_CONNECTION=mysql
    DB_HOST=nom_del_host
    DB_PORT=el_teu_port
    DB_DATABASE=nom_de_la_teva_BBDD
    DB_USERNAME=usuari_de_la_teva_BBDD
    DB_PASSWORD=psswd_de_la_teva_BBDD

### Realitzar la creació de taules a la BBDD vinculada al fitxer .env amb l'ús de migracions del laravel:
        EXEMPLE: 
        a cmd o altres terminals: php artisan make:migration create_users_productos
        Anar a nom_projecte_laravel/database/migrations:
        Dins de function up
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('image_url');
            $table->timestamps();
        });
        Dins de function down (en fer php artisan migrate:rollback, allò posat aquí es desfarà)
        Schema::dropIfExists('productos');
        Altres exemples:
        php artisan make:migration create_users_users
        php artisan make:migration create_users_pedidos
        php artisan make:migration create_users_altres
           
        (DESPRÉS DE realitzar les modificacions de TOTS els nous fitxers de (nom_projecte_laravel/database/migrations)

        a cmd o altres terminals : php artisan migrate
        
### Realitzar la creació de Models 
        En Laravel, els models són classes que representen las taules de la teva BBDD. S'utilitzen per a interactuar amb la BBDD i realitzar operacions com insertar, actualitzar i per a la eliminació de dades
        
### 1.1 Eines

    Visual Studio Code
    Laravel
    Xammp
    Phpmyadmin

### 1.2 Plugins (VSC)

    Miscrosoft Preview
    Postman

## 2. Instruccions per desplegar el projecte a producció

### 2.1 Laravel, conexions

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

### 2.1.2 Laravel, enviar informació a la DB

    A través de PostMan + un json, les funcions agafen el json y els seus atributs, i, per cada item, genera una nova instància adequada.

    PRODUCTES (json dins d'array "productos"):
    Route::post("/getProductos" , [ProductoController::class,"getProductos"]);

    COMANDES (json dins d'array "pedidos"):
    Route::post("/getPedidos" , [PedidoController::class,"getPedidos"]);
    
    USUARIS (json dins d'array "users"):
    Route::post("/getUsers", [UserController::class, "getUsers"]);

    LINIA DE COMANDES: (json dins d'array "liniaPedido"):
    Route::post("/getLiniaPedidos", [LiniaPedidoController::class,"getLiniaPedidos"])

### 2.1.3 Laravel, rebre informació de la BD

    // retorna un json de todos los productos de la bd en phpmyadmin
    Route::get('/getJsonProductos', [ProductoController::class, 'giveJsonProductosData']);
    // retorna un json de todos los pedidos de la bd en phpmyadmin
    Route::get('/getJsonPedidos', [PedidoController::class, 'giveJsonPedidosData']);
    // retorna u njson de todos los usuaris de la bd en phpmyadmin
    Route::get("/getJsonUsers", [UserController::class, "giveJsonUsersData"]);
    // retorna un json de todos los linia de pedidos de la bd en phpmyadmin
    Route::get("/getJsonLiniaPedidos", [LiniaPedidoController::class, "giveJsonLiniaPedidoData"]);

### 2.1.4 Laravel, per a la creació de tokens (exemple de clau secret)
    PLAIN_TEXT_TOKEN_SECRET=abcdaabbccddddccbbaa
### 2.1.5 Laravel, capacitat CRUD per Admins
#### 2.1.5.1 Rutes
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
    
#### 2.1.5.1 Funcions CRUD (de productes)  

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


### 3 API / ENDPOINTS

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

## 5. Vue, fetchs
    
    Per agafar tots els productes de la BD:
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getJsonProductos
        Exemple a doc/getPedidos.json

    Per agafar totes les comandes de la BD
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/getJsonPedidos
        Exemple a doc/getProductos.json

    Per agafar les comandes d'un usuari determinat
        http://dawtr1g6.daw.inspedralbes.cat/back/public/api/listaPedidosUser
        -> a partir d'un token







