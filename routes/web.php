<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::prefix('/')->namespace('App\\Http\\Controllers\\')->group(function () {
    #Agents
Route::prefix('agents')->group(function () {
    Route::get('/','AgentController@index')->name('agent.index');
    Route::get('/create','AgentController@create')->name('agent.create');
    Route::get('/edit/{id_agent}','AgentController@edit')->name('agent.edit');
    Route::get("/details/{id_agent}","AgentController@show")->name("agent.details");
    Route::post("/save","AgentController@store")->name("agent.save");
    Route::post("/update","AgentController@update")->name("agent.update");
    Route::post("/uploadDocuments","AgentController@uploadDocuments")->name("agent.uploadDocuments");
    Route::get("/delete/{id}","AgentController@destroy")->name("agent.delete");
});
Route::prefix('services')->group(function () {
    Route::get('/filter_departement','ServiceController@filter_departement')->name('service.filter_departement');
    Route::get('/filter_service','ServiceController@filter_service')->name('service.filter_service');
});






















});
