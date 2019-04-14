<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('abertura', 'ExemploController@abertura');

Route::resource('bichos', 'BichosController');

Route::get('contagem', 'BichosController@contagem')->name('bichos.contagem');

Route::any('pesquisar', 'BichosController@pesquisar')->name('bichos.pesquisar');