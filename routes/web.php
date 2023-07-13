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

    #Home
    Route::get('/','HomeController@index')->name('home.index');

    #Agents
Route::prefix('agents')->group(function () {
    Route::get('/','AgentController@index')->name('agent.index');
    Route::get('/create','AgentController@create')->name('agent.create');
    Route::get('/export','AgentController@export')->name('agent.export');
    Route::get('/edit/{id_agent}','AgentController@edit')->name('agent.edit');
    Route::get("/details/{id_agent}","AgentController@show")->name("agent.details");
    Route::get("/filter/{name?}","AgentController@filter")->name("agent.filter");
    Route::get("/filterByPosition/{name?}","AgentController@filterByPosition")->name("agent.filterByPosition");
    Route::post("/save","AgentController@store")->name("agent.save");
    Route::post("/update","AgentController@update")->name("agent.update");
    Route::post("/uploadDocuments","AgentController@uploadDocuments")->name("agent.uploadDocuments");
    Route::get("/delete/{id_agent}","AgentController@destroy")->name("agent.delete");
});

    #Archives
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

    #Formations
Route::prefix('formations')->group(function () {
    Route::get('/','FormationController@index')->name('formation.index');
    Route::get('/create','FormationController@create')->name('formation.create');
    Route::get('/edit/{id_formation}','FormationController@edit')->name('formation.edit');
    Route::get("/details/{id_formation}","FormationController@show")->name("formation.details");
    Route::get("/filter/{name?}","FormationController@filter")->name("formation.filter");
    Route::post("/save","FormationController@store")->name("formation.save");
    Route::post("/update","FormationController@update")->name("formation.update");
    Route::get("/delete/{id_formation}","FormationController@destroy")->name("formation.delete");
});

    #Stagiaires
Route::prefix('stagiaires')->group(function () {
    Route::get('/','StagiaireController@index')->name('stagiaire.index');
    Route::get('/create','StagiaireController@create')->name('stagiaire.create');
    Route::get('/edit/{id_stagiaire}','StagiaireController@edit')->name('stagiaire.edit');
    Route::get("/details/{id_stagiaire}","StagiaireController@show")->name("stagiaire.details");
    Route::get("/filter/{name?}","StagiaireController@filter")->name("stagiaire.filter");
    Route::post("/save","StagiaireController@store")->name("stagiaire.save");
    Route::post("/update","StagiaireController@update")->name("stagiaire.update");
    Route::post("/uploadDocuments","StagiaireController@uploadDocuments")->name("stagiaire.uploadDocuments");
    Route::get("/delete/{id_stagiaire}","StagiaireController@destroy")->name("stagiaire.delete");
});

    #Conges
Route::prefix('conges')->group(function () {
    Route::get('/','CongeController@index')->name('conge.index');
    Route::get('/create','CongeController@create')->name('conge.create');
    Route::get('/edit/{id_conge}','CongeController@edit')->name('conge.edit');
    Route::get("/details/{id_conge}","CongeController@show")->name("conge.details");
    Route::get("/filter/{name?}","CongeController@filter")->name("conge.filter");
    Route::get("/filterHistory/{name?}","CongeController@filterHistory")->name("conge.filterHistory");
    Route::post("/save","CongeController@store")->name("conge.save");
    Route::post("/update","CongeController@update")->name("conge.update");
    Route::post("/uploadDocuments","CongeController@uploadDocuments")->name("conge.uploadDocuments");
    Route::get("/delete/{id_conge}","CongeController@destroy")->name("conge.delete");
});

    #Services
Route::prefix('services')->group(function () {
    Route::get('/filter_departement','ServiceController@filter_departement')->name('service.filter_departement');
    Route::get('/filter_service','ServiceController@filter_service')->name('service.filter_service');
});
    #Exports
Route::prefix('exports')->group(function () {
    Route::get('/test','ExportController@test')->name('export.test');
});


















});
