<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users/{username}/repos','GetController@repos');
Route::get('/users/{username}','GetController@index');
