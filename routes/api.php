<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'as'        => 'api.', 
    'namespace' => 'App\Http\Controllers'
], function () {

    Route::group([
        'prefix' => 'auth',
        'as'     => 'auth.'
    ], function () {
        Route::post('/register', 'Auth\RegisterController')->name('register');
        Route::post('/login', 'Auth\LoginController')->name('login');
    });

    Route::group([
        'prefix' => 'order',
        'as'     => 'order.'
    ], function () {
        Route::post('/', 'Orders\CreateController')->name('create');
        Route::get('/list', 'Orders\ListController')->name('list');
    });
   
    Route::middleware('admin.auth')->group(function () {
        Route::group([
            'prefix' => 'driver',
            'as'     => 'driver.'
        ], function () {
            Route::post('/', 'Drivers\CreateController')->name('create');
            Route::get('/list', 'Drivers\ListController')->name('list');
            Route::get('/{id}', 'Drivers\FetchController')->name('fetch');
            Route::delete('/{id}', 'Drivers\DeleteController')->name('delete');
            Route::put('/{id}', 'Drivers\EditController')->name('edit');
            Route::post('/assign', 'Drivers\AssignVehicleController')->name('assign');
        });

        Route::group([
            'prefix' => 'vehicle',
            'as'     => 'vehicle.'
        ], function () {
            Route::post('/', 'Vehicles\CreateController')->name('create');
            Route::get('/list', 'Vehicles\ListController')->name('list');
            Route::get('/{id}', 'Vehicles\FetchController')->name('fetch');
            Route::delete('/{id}', 'Vehicles\DeleteController')->name('delete');
            Route::put('/{id}', 'Vehicles\EditController')->name('edit');
            Route::post('/assign', 'Vehicles\AssignTariffController')->name('assign');
        });
        
        Route::group([
            'prefix' => 'tariff',
            'as'     => 'tariff.'
        ], function () {
            Route::post('/', 'Tariffs\CreateController')->name('create');
            Route::get('/list', 'Tariffs\ListController')->name('list');
            Route::get('/{id}', 'Tariffs\FetchController')->name('fetch');
            Route::delete('/{id}', 'Tariffs\DeleteController')->name('delete');
            Route::put('/{id}', 'Tariffs\EditController')->name('edit');
        });
    });
});
