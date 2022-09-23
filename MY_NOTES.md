# Comandos Laravel mas usados:
    php artisan serve				//levanta el servidor
    php artisan make:controller NOMBRE_DEL_CONTROLADOR
    php artisan make:controller NOMBRE_DEL_CONTROLADOR --resource //mas optimo para generar los metodos automaticamente

# Comandos SQL en laravel:
### crear nueva tabla
    php artisan make:migration create_NOMBRETABLA_table --create=heroes	

### crear las tablas en la base de datos (si ya hay tablas con el mismo nombre no las reemplaza, para eso se usa refresh)
    php artisan migrate 

### actualizar las tablas, cuando hubo cambias, (las borra y las vuelve a crear)
    php artisan migrate:refresh 

### crear una clave foranea entre dos tablas
    php artisan make:migration add_foreign_key_to_NOMBRETABLA --table=NOMBRETABLA

### deshacer cambios en la base de datos, en caso de errores o tablas incompletas.
    php artisan migrate:rollback
    php artisan migrate:rollback --step=NUMERO_DE_PASOS_HACIA_ATRAS


# Modelo: representa un registro en la tabla, es el punto de llegada a la base de datos
## ORM(Modelo Relación de Objetos): nos ayuda a ejecutar una serie de metodos, sin tener que crear las consultas/sentencias sql como tal, 
## recordemos que como es un campo, debe ser en singular el nombre del modelo, y se hubicaran en la raiz de la carpeta app.
    php artisan make:model NOMBRE_SINGULAR

# SEEDERS (DATABASE)
## automatizacion de insercion de datos a la BD, (semillas) el archivo se encontrara en >database>seeds
## pero el que invocara este seeder es el archivo DatabaseSeeder.php(en la misma carpeta), con el método run()
    php artisan make:seeder NOMBRETableSeeder

## despues de crear el seeder haremos los comandos:
    composer dump-autoload
    php artisan db:seed

## lectura de datos de la base de datos y mostrarlos
### se hace en el Controller con un all y se envia a la vista
    public function index(){
        $heroes = Hero::all();
        //le mandamos los datos de la BD a la vista
        return view('admin.heroes.index', ['heroes' => $heroes]);
    }

## Creacion de vistas para mostrar datos, en la plantilla de blade como ya mandamos $heroes
    @foreach ($heroes as $hero)
        <tr>
            <th scope="row">{{ $hero->id }}</th>
            <td>{{ $hero->name }}</td>
        </tr>
    @endforeach

## navegacion a otras vistas (recordar dar de alta el nombre y la ruta en la carpeta >routes>web.php)

    <a class="btn btn-primary my-2" href="{{ route('admin.heroes.create')}}">

## creacion de la vista form para guardar datos en la base de datos.
    views>admin>heroes>create.blade.php

## Guardar datos de un laravel(form) a la base de datos.
### crear funcion store en el controller. y hacer el modelo
    
    $hero = new Hero();
    ###datos obtenidos del form
        $hero->name = $request->input('name');
    ###datos iniciales 
        $hero->coins = 1;
    ###guardar en la BD
        $hero->save();
    ###redireccionar a la pagina deseada.
        return redirect()->route('admin.heroes.index');v

### agregar la ruta 
    Route::post('store', 'HeroController@store')->name('admin.heroes.store');

# ERROR 419 PAGE EXPIRED
## seguridad proporcionada por laravel para no tener forms vulnerables. (investigar mas a fondo en  laravel CSRF)

### agregar esto al form
    @csrf
### buscar el archivo :VerifyCsrfToken y agregar las excepcion de la ruta, para dejar pasar todas se pone un '*'.
    protected $except = [
        'http://127.0.0.1:8000/admin/heroes/store'
        'http://127.0.0.1:8000/*'
    ];

# ERROR: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'name' cannot be null
## pasa porq no relacionamos bien el form con el atributo 'name=CAMPO_BD'


# Modificar un registro de la base de datos, y mostrar una vista con los datos
## se crea la vista
    Route::get('edit/{id}', 'HeroController@edit')->name('admin.heroes.edit');

## se agrega el método al controller,debemos enviar el id del registro a moficiar:
    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('admin.heroes.edit', ['hero' => $hero]);
    }    

## establecemos el valor obtenido delcontroller en la vista ya que lo estamos enviando por parametro:
    <input type="text" class="form-control" required name="name"
    value="{{ $hero->name }}" placeholder="Ingrese el nombre del héroe">

## no olvidemos unir las vistas conlas rutas
    <a class="btn btn-warning me-1" href="{{ route('admin.heroes.edit', ['id' => $hero->id ])}}"> Modificar </a>

## ERROR: Too few arguments to function App\Http\Controllers\HeroController::update(), 1 passed in C:\Users\Ab\Desktop\php\hero\vendor\laravel\framework\src\Illuminate\Routing\Controller.php on line 54 and exactly 2 expected
### olvidamos pasar los parametros en la vista
### routes
    Route::post('update/{id}', 'HeroController@update')->name('admin.heroes.update');
### view
    <form action="{{ route('admin.heroes.update', ['id'=> $hero->id]) }}" method="POST">

# Borrar de la base de datos:
AS en una vista se agrega un form para que dispara la accion,este sera post con un metodo interno DELETE

    <form action="{{ route('admin.heroes.destroy',['id'=>$hero->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            Eliminar
        </button>
    </form>

### en las rutas:
Route::delete('destroy/{id}', 'HeroController@destroy')->name('admin.heroes.destroy');

### en el controlador:
    public function destroy($id)
    {
        $hero = Hero::find($id);
        $hero->delete();
        return view('admin.heroes.edit', ['hero' => $hero]);
    }

# OPTIMIZACION DE ROUTE
AS laravel reconoce que es un resource y que tiene los metodos basicos (create, store, edit etc.)
### nos evitamos los prefix y una linea por cada ruta.    
    Route::resource('heroes', 'HeroController');

### ahora cada llamada a ruta: route('path') debe modificarse y eliminar la raiz, en este caso 'admin'
### hay q seguir corrigiendo rutas, para esto es recomendable ver la tabla:

    php artisan route:list

### OJO: parece que en versiones laravel+7 el paso de parametros cambia, ya no necesita el array asociativo( por lo menos en 1 parametro)
### de :
    {{ route('heroes.edit', ['id' => $hero->id]) }}
### a:
    {{ route('heroes.edit', $hero->id) }}

# creación de controllers de una manera mas óptima. **vid78**

    php artisan make:controller NAMEController --resource

## no olvidemos agregarlo en web.php

    Route::resource('items', 'ItemController');

## y cambiar
    route('admin.items') a route('items.index')

## modificar los métodos del Controller, las rutas y basarnos en los métodos que ya teniamos implementados, ya que es un CRUD basico.

# array asocitativo

$report = [
    [
        'name' => "Heroe",
        'counter' => $heroCounter,
        'route' => 'heroes.index',
    ],
    [
        'name' => "Items",
        'counter' => $heroCounter,
        'route' => 'item.index',
    ],
    [
        'name' => "Enemies",
        'counter' => $enemyCounter,
        'route' => 'enemy.index',
    ],
];

# forma de acceder a los datos:
    @foreach ($report as $item)
        $name = $item["name"];

# incluir vistas dentro de vistas en blade
    @include('admin.heroes.form') //ruta real de los directorios.

## condicionales en php dentro de blade.
### en codigo php
    <?php
        if(isset($var)){
            //si existe la $var, hara...
        }
    ?>

### en blade seria:
    @isset($var) si existe hara esto @endisset

# Impresión, revisión de variables

## en php
    var_dump();

## en base de datos
    dd();

# ELOQUENT:Relations
## relacion de tablas, en neustro caso tenemos un heroe que solo puede tener un level (one to one), pero a su vez la tabla levels, puede tener
## X relaciones a distintos heroes (one to many)

### las modificaciones se hacen en el MODELO, ( APP\model.php)
#### App\Hero    
    public function level()
    {
        //referencia a la tabla
        return $this->hasOne("App\Level");
    }
#### App\Level    
#### Modelo al cual tenemos que relacionar(donde esta la llave foraneo) || clave local de ese modelo || llave foranea del modelo donde estamos
    return $this->hasOne("App\Level", "id", "level_id");

##### para validar si funciona podemos imprimir un objeto con dichas llaves
    
    dd($hero->level());
    dd($hero->level);
    dd($hero->level->xp);
