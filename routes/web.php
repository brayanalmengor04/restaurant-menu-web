<?php
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\MainController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\Api\LocationController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\DishRatingController;  
use App\Http\Controllers\Api\Province\ProvinceViewController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\District\DistrictViewController;
use App\Http\Controllers\Api\CorregimientoController;
use App\Http\Controllers\Api\Corregimiento\CorregimientoViewController;
use App\Http\Controllers\Api\Documentation\DocumentationController;

// Documentacion
Route::get('/api/docs/panama', [DocumentationController::class, 'index'])->name('api.documentation');

// Corregimientos API
Route::prefix('api/corregimientos')->group(function () {
    Route::get('/', [CorregimientoController::class, 'index'])->name('corregimientos.index');
    Route::post('/', [CorregimientoController::class, 'store'])->name('corregimientos.store');
    Route::get('/{id}', [CorregimientoController::class, 'getById'])->name('corregimientos.getById');
    Route::put('/{corregimiento}', [CorregimientoController::class, 'update'])->name('corregimientos.update');
    Route::delete('/{corregimiento}', [CorregimientoController::class, 'destroy'])->name('corregimientos.delete');
});
// Corregimientos Views
Route::prefix('corregimientos')->group(function () {
    Route::get('/view', [CorregimientoViewController::class, 'view'])->name('corregimientos.view');
    Route::get('/create', [CorregimientoController::class, 'create'])->name('corregimientos.create');
    Route::get('/edit/{corregimiento}', [CorregimientoViewController::class, 'edit'])->name('corregimientos.edit');
});


// API de Distritos --------------------------------------------------------------------------
Route::prefix('api/districts')->group(function () {
    Route::get('/', [DistrictController::class, 'index'])->name('districts.index');        
    Route::post('/', [DistrictController::class, 'store'])->name('districts.store');       
    Route::get('/create', [DistrictController::class, 'create'])->name('districts.create');
    Route::get('/{id}', [DistrictController::class, 'getDistrictById'])->name('districts.get'); 
    Route::put('/{district}', [DistrictController::class, 'update'])->name('districts.update');
    Route::delete('/{district}', [DistrictController::class, 'destroy'])->name('districts.destroy'); 
});
// Vistas de Distritos -----------------------------------------------------------------------
Route::prefix('districts')->group(function () {
    Route::get('/view', [DistrictViewController::class, 'view'])->name('districts.view');  
    Route::get('/edit/{district}', [DistrictViewController::class, 'edit'])->name('districts.edit'); 
});

// API de Provincias -------------------------------------------------------------------------
Route::prefix('api/provinces')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('provinces.index');      
    Route::post('/', [LocationController::class, 'store'])->name('provinces.store');      
    Route::get('/create', [LocationController::class, 'create'])->name('provinces.create');// Vista para crear una provincia
    Route::get('/{id}', [LocationController::class, 'getProvinceById'])->name('provinces.getById'); // Obtener una provincia por ID
    Route::put('/{province}', [LocationController::class, 'update'])->name('provinces.update'); // PUT
    Route::delete('/{province}', [LocationController::class, 'destroy'])->name('provinces.delete'); // Eliminar una provincia
});
// Vistas de Provincias ----------------------------------------------------------------------
Route::prefix('provinces')->group(function () {
    Route::get('/view', [ProvinceViewController::class, 'view'])->name('provinces.view');  // Vista de todas las provincias
    Route::get('/edit/{province}', [ProvinceViewController::class, 'edit'])->name('provinces.edit'); // Editar una provincia
});



// Rating  
Route::post('/rate-dish', [DishRatingController::class, 'rate'])->name('dish.rate');
// Rutas para el carrito 
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Rutas para el qr
Route::get('/user/dishes', [DishesController::class, 'viewDishes'])->name('user.dishes');
Route::get('/menu/qr', [DishesController::class, 'generateQrCode'])->name('menu.qr');

// Rutas del Crud  Gestion completa
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show'); // No lo utilizare
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// Subscription 
// Rutas para gestionar suscripciones
Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('subscriptions.index');
Route::delete('/subscriptions/{subscription}', [SubscriptionsController::class, 'destroy'])->name('subscriptions.destroy');
Route::get('/subscriptions/create', [SubscriptionsController::class, 'create'])->name('subscriptions.create');
Route::post('/subscriptions', [SubscriptionsController::class, 'store'])->name('subscriptions.store');// por ver
Route::get('/subscriptions/{subscription}/edit', [SubscriptionsController::class, 'edit'])->name('subscriptions.edit');

Route::put('/subscriptions/{subscription}', [SubscriptionsController::class, 'update'])->name('subscriptions.update');

// Rutas de autenticacion---->>
Route::get('login/', [UserController::class, 'loginview'])->name('login');
Route::post('login/',[UserController::class,'login'])->name('loginpost'); 
Route::get('logout/',[UserController::class,'logout'])->name('logout');  

Route::get('user/activate/{token}', [UserController::class, 'activate'])->name('user.activate');

Route::middleware('auth')->group(function () { 
    // Middleware es para decirle que solo admin vera esa ruta 
    Route::resource('category', CategoryController::class )->middleware("admin");
    Route::resource('subcription', SubscriptionsController::class );
    Route::resource('dish', DishesController::class ); 
  
});
Route::resource('user', UserController::class);

Route::get('/', [MainController::class, 'index'])->name('welcome');


