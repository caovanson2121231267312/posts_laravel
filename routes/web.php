<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('refresh', [App\Http\Controllers\HomeController::class, 'refresh'])->name('refresh');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('blogs');

Route::group(['prefix' => '/admin', 'namespace' => 'admin', 'middleware'=>['auth', 'isAdmin']], function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissisonController::class);
    Route::resource('news', NewsController::class);
    Route::resource('keywords', KeywordController::class);

    Route::group(['prefix' => 'categories'], function(){
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/',[
                'as'=>'categories',
                'uses'=>'index',
            ]);
            Route::get('search/',[
                'as'=>'categories.search',
                'uses'=>'search',
            ]);
            Route::get('create',[
                'as'=>'categories.create',
                'uses'=>'create',
            ]);
            Route::get('show',[
                'as'=>'categories.show',
                'uses'=>'show',
            ]);
            Route::post('add/',[
                'as'=>'categories.add',
                'uses'=>'store',
            ]);
            Route::get('edit/{id}',[
                'as'=>'categories.edit',
                'uses'=>'edit',
            ]);
            Route::post('update/{id}',[
                'as'=>'categories.update',
                'uses'=>'update',
            ]);
            Route::get('delete/{id}',[
                'as'=>'categories.delete',
                'uses'=>'destroy',
            ]);
            Route::post('truncate/',[
                'as'=>'categories.truncate',
                'uses'=>'truncate',
            ]);
        });
    });

    Route::group(['prefix' => 'user'], function(){
        Route::controller(UserController::class)->group(function () {
            Route::get('/',[
                'as'=>'user',
                'uses'=>'index',
            ]);
            Route::get('search/',[
                'as'=>'users.search',
                'uses'=>'search',
            ]);
            Route::get('create',[
                'as'=>'user.create',
                'uses'=>'create',
            ]);
            Route::get('show',[
                'as'=>'user.show',
                'uses'=>'show',
            ]);
            Route::post('add/',[
                'as'=>'user.add',
                'uses'=>'store',
            ]);
            Route::get('edit/{id}',[
                'as'=>'user.edit',
                'uses'=>'edit',
            ]);
            Route::post('update/{id}',[
                'as'=>'user.update',
                'uses'=>'update',
            ]);
            Route::get('delete/{id}',[
                'as'=>'user.delete',
                'uses'=>'destroy',
            ]);
            Route::post('truncate/',[
                'as'=>'user.truncate',
                'uses'=>'truncate',
            ]);

        });
    });

});