<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/model', function () {

    //Queries
    //Pegar Loja de um usuário
    /*$user = \App\User::find(4);
    return $user->store; //Quando Relação 1:1 - Objeto Unico (Store) | Agora quando é 0:0 return Collection de dados
    //return $user->store()->count() //chama o metodo da classe
    */

    /*
    //Pegar produtos de uma loja
    $loja = \App\Store::find(1);
    //return $loja->products->count(); //é possivel usar conter no atributo pq o returno é uma coleção de dados
    return $loja->products()->where('id',1)->get(); //traz apenas produto com id 1
    */

    /*
    //pegar as lojas de uma categoria de uma loja
    $categoria = \App\Category::find(1);
    return $categoria->products;
    */

    /*
    //Criar uma Loja para um usuário - Usando Mass Assigned
    $user = \App\User::find(1);
    $store = $user->store()->create([
        'name' => 'Loja Teste',
        'description' => 'Loja Teste Informatica',
        'phone' => 'xxx-xxxx-xxx',
        'mobile_phone' => '+4477215545',
        'slug' => 'loja-teste'
    ]);

    dd($store);
    */

    /*
    //Criar um produto para uma loja
    $store = \App\Store::find(41);
    $product = $store->products()->create([
        'name'=> 'Notebook Dell',
        'description'=> 'Core I5 com 4GB',
        'body' => 'qualquer coisa...',
        'price' => 2999.90,
        'slug' => 'notebook-dell',
    ]);

    dd($product);
    */

    /*
    //Criar uma categoria
    \App\Category::create([
        'name' => 'Games',
        'description' => null,
        'slug' => 'games'
    ]);

    \App\Category::create([
        'name' => 'Games',
        'description' => null,
        'slug' => 'games'
    ]);

    return \App\Category::all();
    */

    /*
    //Adicionar um produto para uma categoria ou vice versa
    $product = \App\Product::find(41);
    //dd($product->categories()->attach([1])); //adiciona array
    //dd($product->categories()->detach([1])); //remove array
    //dd($product->categories()->sync([1,2])); //adiciona um array com varios itens
    */

    /*
    $product = \App\Product::find(41);
    return $product->categories;
    */

    return \App\User::all();
});

/* Rotas Completas
Route::get('/admin/stores', 'Admin\\StoreController@index');
Route::get('/admin/stores/create', 'Admin\\StoreController@create');
Route::post('/admin/stores/store', 'Admin\\StoreController@store');
*/

/*Rotas com Prefixo
Route::prefix('admin')->group(function(){
    Route::get('/stores', 'Admin\\StoreController@index');
    Route::get('/stores/create', 'Admin\\StoreController@create');
    Route::post('/stores/store', 'Admin\\StoreController@store');
});
*/

/*Rotas com Prefixo com Namespace
Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/create', 'StoreController@create');
    Route::post('/stores/store', 'StoreController@store');
});
*/

/*Rotas com Prefixo Resumidas*/
/*
Route::prefix('admin')->namespace('Admin')->group(function(){

    Route::prefix('stores')->group(function(){
        Route::get('/', 'StoreController@index');
        Route::get('/create', 'StoreController@create');
        Route::post('/store', 'StoreController@store');
        Route::get('/{store}/edit', 'StoreController@edit');
        Route::post('/update/{store}', 'StoreController@update');
        Route::get('/destroy/{store}', 'StoreController@destroy');
    });
*/

/*Rotas Resumidas com Apelido - Namespace*/
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        Route::prefix('stores')->name('stores.')->group(function(){
            Route::get('/', 'StoreController@index')->name('index');
            Route::get('/create', 'StoreController@create')->name('create');
            Route::post('/store', 'StoreController@store')->name('store');
            Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
            Route::post('/update/{store}', 'StoreController@update')->name('update');
            Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        });

        /*Products - Rotas com Resource*/
        Route::resource('products','ProductController');

});
