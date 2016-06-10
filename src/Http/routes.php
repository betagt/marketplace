<?php

Route::group(['namespace' => 'BetaGT\Marketplace\Http\Controllers\Front'], function(){
   Route::group(['prefix' => 'Categoria', 'as' => 'categoria.'], function(){
       Route::get('', [
           'as' => 'index',
           'uses' => 'CategoriaController@index'
       ]);
       Route::get('/{id}/{slug}', [
           'as' => 'visualizar',
           'uses' => 'CategoriaController@visualizar'
       ]);
   });
   Route::group(['prefix' => 'Cliente', 'as' => 'cliente.'], function(){
        Route::get('', [
            'as' => 'index',
            'uses' => 'ClienteController@index'
        ]);
        Route::get('/{id}/{slug}', [
            'as' => 'visualizar',
            'uses' => 'ClienteController@visualizar'
        ]);
   });
});