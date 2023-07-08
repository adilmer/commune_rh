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
    Route::get("/filter/{name?}","AgentController@filter")->name("agent.filter");
    Route::get("/filterByPosition/{name?}","AgentController@filterByPosition")->name("agent.filterByPosition");
    Route::post("/save","AgentController@store")->name("agent.save");
    Route::post("/update","AgentController@update")->name("agent.update");
    Route::post("/uploadDocuments","AgentController@uploadDocuments")->name("agent.uploadDocuments");
    Route::get("/delete/{id_agent}","AgentController@destroy")->name("agent.delete");
});
Route::prefix('archives')->group(function () {
    Route::get('/','ArchiveController@index')->name('archive.index');
    Route::get("/filter/{name?}","ArchiveController@filter")->name("archive.filter");
    Route::get("/filterByCategorie/{name?}","ArchiveController@filterByCategorie")->name("archive.filterByCategorie");
    Route::get("/filterByDate/{name?}","ArchiveController@filterByDate")->name("archive.filterByDate");
    Route::post("/save","ArchiveController@store")->name("archive.save");
    Route::get("/saveCategorie","ArchiveController@storeCategorie")->name("archive.saveCategorie");
    Route::post("/update","ArchiveController@update")->name("archive.update");
    Route::get("/delete/{id_archive?}","ArchiveController@destroy")->name("archive.delete");
});

Route::prefix('formations')->group(function () {
    Route::get('/','FormationController@index')->name('formation.index');
    Route::get('/create','FormationController@create')->name('formation.create');
    Route::get('/edit/{id_formation}','FormationController@edit')->name('formation.edit');
    Route::get("/details/{id_formation}","FormationController@show")->name("formation.details");
    Route::get("/filter/{name?}","FormationController@filter")->name("formation.filter");
    Route::get("/filterByPosition/{name?}","FormationController@filterByPosition")->name("formation.filterByPosition");
    Route::post("/save","FormationController@store")->name("formation.save");
    Route::post("/update","FormationController@update")->name("formation.update");
    Route::post("/uploadDocuments","FormationController@uploadDocuments")->name("formation.uploadDocuments");
    Route::get("/delete/{id_formation}","FormationController@destroy")->name("formation.delete");
});

Route::prefix('services')->group(function () {
    Route::get('/filter_departement','ServiceController@filter_departement')->name('service.filter_departement');
    Route::get('/filter_service','ServiceController@filter_service')->name('service.filter_service');
});






















});
