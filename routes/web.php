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
     Route::get('/notation', function () {
        return view('homepage.notation');
    });
    /* Route::get('/avancementnew', function () {
        return view('pages.avancement.index2');
    }); */
    #aptitudeprofessionnelle
    Route::prefix('aptitudeprofessionnelle')->group(function () {
        /* Route::get('/', function () {
            return view('pages.aptitudes.index');
        });
        Route::get('/create', function () {
            return view('pages.aptitudes.create');
        });
        Route::get('/details', function () {
            return view('pages.aptitudes.details');
        });

        Route::get('/accepte', function () {
            return view('pages.aptitudes.accepte');
        });

        Route::get('/listeexamenoral', function () {
            return view('pages.aptitudes.listeexamenoral');
        });

        Route::get('/comiteexamen', function () {
            return view('pages.aptitudes.comiteexamen');
        });
        Route::get('/comitegardiens', function () {
            return view('pages.aptitudes.comitegardiens');
        });

        Route::get('/notationexamenecrit', function () {
            return view('pages.aptitudes.notationexamenecrit');
        });
         Route::get('/listeexamenecrit', function () {
            return view('pages.aptitudes.listeexamenecrit');
        });*/



        Route::get('/','AptitudeController@index')->name('aptitude.index');
        Route::get('/create','AptitudeController@create')->name('aptitude.create');
        Route::get('/edit/{id_aptitude}','AptitudeController@edit')->name('aptitude.edit');
        Route::get("/details/{id_aptitude}","AptitudeController@show")->name("aptitude.details");
        Route::get("/filter/{name?}","AptitudeController@filter")->name("aptitude.filter");
        Route::post("/save","AptitudeController@store")->name("aptitude.save");
        Route::post("/update","AptitudeController@update")->name("aptitude.update");
        Route::get("/delete/{id_aptitude}","AptitudeController@destroy")->name("aptitude.delete");


        Route::get('/accepte/{id_aptitude}','AptitudeController@accepte')->name('aptitude.accepte');
        Route::any('/accepte_save','AptitudeController@accepte_save')->name('aptitude.accepte_save');
        Route::any('/accepte_remove/{id_liste_aptitude}','AptitudeController@accepte_remove')->name('aptitude.accepte_remove');

        Route::get('/ecrit/{id_aptitude}','AptitudeController@ecrit')->name('aptitude.ecrit');
        Route::any('/ecrit_save','AptitudeController@ecrit_save')->name('aptitude.ecrit_save');
        Route::any('/ecrit_saveAll/{id_aptitude}','AptitudeController@ecrit_saveAll')->name('aptitude.ecrit_saveAll');
        Route::any('/ecrit_remove/{id_liste_aptitude}','AptitudeController@ecrit_remove')->name('aptitude.ecrit_remove');

        Route::get('/orale/{id_aptitude}','AptitudeController@orale')->name('aptitude.orale');
        Route::any('/orale_save','AptitudeController@orale_save')->name('aptitude.orale_save');
        Route::any('/orale_saveAll/{id_aptitude}','AptitudeController@orale_saveAll')->name('aptitude.orale_saveAll');
        Route::any('/orale_remove/{id_liste_aptitude}','AptitudeController@orale_remove')->name('aptitude.orale_remove');

        Route::get('/comiteExamen/{id_aptitude}','AptitudeController@comiteExamen')->name('aptitude.comiteExamen');
        Route::any('/comiteExamen_save','AptitudeController@comiteExamen_save')->name('aptitude.comiteExamen_save');
        Route::any('/comiteExamen_remove/{id_liste_aptitude}','AptitudeController@comiteExamen_remove')->name('aptitude.comiteExamen_remove');

        Route::get('/comiteSurve/{id_aptitude}','AptitudeController@comiteSurve')->name('aptitude.comiteSurve');
        Route::any('/comiteSurve_save','AptitudeController@comiteSurve_save')->name('aptitude.comiteSurve_save');
        Route::any('/comiteSurve_remove/{id_liste_aptitude}','AptitudeController@comiteSurve_remove')->name('aptitude.comiteSurve_remove');

        Route::get('/notationEcrit/{id_aptitude}','AptitudeController@notationEcrit')->name('aptitude.notationEcrit');
        Route::any('/notationEcrit_save','AptitudeController@notationEcrit_save')->name('aptitude.notationEcrit_save');
        Route::any('/notationEcrit_saveAll/{id_aptitude}','AptitudeController@notationEcrit_saveAll')->name('aptitude.notationEcrit_saveAll');
        Route::any('/notationEcrit_remove/{id_liste_aptitude}','AptitudeController@notationEcrit_remove')->name('aptitude.notationEcrit_remove');

        Route::get('/notationOrale/{id_aptitude}','AptitudeController@notationOrale')->name('aptitude.notationOrale');
        Route::any('/notationOrale_save','AptitudeController@notationOrale_save')->name('aptitude.notationOrale_save');
        Route::any('/notationOrale_saveAll/{id_aptitude}','AptitudeController@notationOrale_saveAll')->name('aptitude.notationOrale_saveAll');
        Route::any('/notationOrale_remove/{id_liste_aptitude}','AptitudeController@notationOrale_remove')->name('aptitude.notationOrale_remove');


    });
    #Home
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('/listretraites','HomeController@listretraites')->name('home.listretraites');
    Route::get('/vacances','HomeController@vacances')->name('home.vacances');
    Route::get('/listconge','HomeController@listconge')->name('home.listconge');
    Route::get('/listdocument','HomeController@listdocument')->name('home.listdocument');
    Route::get('/test','HomeController@test')->name('home.test');

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

#notation
Route::prefix('notation')->group(function () {
    Route::get('/','NotationController@index')->name('notation.index');
    Route::get('/create','NotationController@create')->name('notation.create');
    Route::get('/edit/{id_notation}','NotationController@edit')->name('notation.edit');
    Route::get("/details/{id_notation}","NotationController@show")->name("notation.details");
    Route::get("/filter/{name?}","NotationController@filter")->name("notation.filter");
    Route::any("/save","NotationController@store")->name("notation.save");
    Route::post("/update","NotationController@update")->name("notation.update");
    Route::get("/delete/{id_notation}","NotationController@destroy")->name("notation.delete");
    Route::get('/fiche_notation', 'NotationController@fiche_notation')->name('notation.fiche_notation');
});

#grade
Route::prefix('grade')->group(function () {
    Route::get('/','GradeController@index')->name('grade.index');
    Route::get('/create','GradeController@create')->name('grade.create');
    Route::get('/edit/{id_grade}','GradeController@edit')->name('grade.edit');
    Route::get("/details/{id_grade}","GradeController@show")->name("grade.details");
    Route::get("/filter/{name?}","GradeController@filter")->name("grade.filter");
    Route::any("/save","GradeController@store")->name("grade.save");
    Route::post("/update","GradeController@update")->name("grade.update");
    Route::get("/delete/{id_grade}","GradeController@destroy")->name("grade.delete");
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
    Route::get("/change_statut/{name?}","CongeController@change_statut")->name("conge.change_statut");
    Route::get("/filterHistory/{name?}","CongeController@filterHistory")->name("conge.filterHistory");
    Route::post("/save","CongeController@store")->name("conge.save");
    Route::post("/update","CongeController@update")->name("conge.update");
    Route::post("/uploadDocuments","CongeController@uploadDocuments")->name("conge.uploadDocuments");
    Route::get("/delete/{id_conge}","CongeController@destroy")->name("conge.delete");
    Route::get('/export_word_demandeConge', 'CongeController@export_word_demandeConge')->name('attestation.export_word_demandeConge');
});

    #Services
Route::prefix('services')->group(function () {
    Route::get('/filter_departement','ServiceController@filter_departement')->name('service.filter_departement');
    Route::get('/filter_service','ServiceController@filter_service')->name('service.filter_service');
});

#Absences
Route::prefix('absences')->group(function () {
    Route::get('/','AbsenceController@index')->name('absence.index');
    Route::get('/filter','AbsenceController@filter')->name('absence.filter');
    Route::get('/pdf', 'AbsenceController@generatePdf')->name('absence.generate');
});
#Avancements
Route::prefix('avancements')->group(function () {
    Route::get('/','AvancementController@index')->name('avancement.index');
    Route::get('/avancement_echellon','AvancementController@avancement_echellon')->name('avancement.avancement_echellon');
    Route::get('/avancement_echelle','AvancementController@avancement_echelle')->name('avancement.avancement_echelle');
    Route::get('/etat_engagement','AvancementController@etat_engagement')->name('avancement.etat_engagement');

});

#Imports
Route::prefix('imports')->group(function () {
    Route::any('/','ImportController@importData')->name('import.importData');
});

#Attestations
Route::prefix('attestations')->group(function () {
    Route::get('/','AttestationController@index')->name('attestation.index');
    Route::get('/find','AttestationController@find')->name('attestation.find');
    Route::get('/export_word', 'AttestationController@export_word')->name('attestation.export_word');
    Route::get('/ordervirement','AttestationController@ordervirement')->name('attestation.ordervirement');
    Route::get('/find_ordervirement','AttestationController@find_ordervirement')->name('attestation.find_ordervirement');
    Route::get('/export_word_ordervirement', 'AttestationController@export_word_ordervirement')->name('attestation.export_word_ordervirement');
    Route::get('/decisionretraite','AttestationController@decisionretraite')->name('attestation.decisionretraite');
    Route::get('/find_decisionretraite','AttestationController@find_decisionretraite')->name('attestation.find_decisionretraite');
    Route::get('/export_word_decisionretraite', 'AttestationController@export_word_decisionretraite')->name('attestation.export_word_decisionretraite');
    Route::get('/allocationfamilial','AttestationController@allocationfamilial')->name('attestation.allocationfamilial');
    Route::get('/find_allocationfamilial','AttestationController@find_allocationfamilial')->name('attestation.find_allocationfamilial');
    Route::get('/export_word_allocationfamilial', 'AttestationController@export_word_allocationfamilial')->name('attestation.export_word_allocationfamilial');

    Route::get('/tps','AttestationController@tps')->name('attestation.tps');
    Route::get('/find_tps','AttestationController@find_tps')->name('attestation.find_tps');
    Route::get('/export_word_tps', 'AttestationController@export_word_tps')->name('attestation.export_word_tps');

    Route::get('/annulationtps','AttestationController@annulationtps')->name('attestation.annulationtps');
    Route::get('/find_annulationtps','AttestationController@find_annulationtps')->name('attestation.find_annulationtps');
    Route::get('/export_word_annulationtps', 'AttestationController@export_word_annulationtps')->name('attestation.export_word_annulationtps');



    Route::get('/export_word_bordereau_ar', 'AttestationController@export_word_bordereau_ar')->name('attestation.export_word_bordereau_ar');
    Route::get('/export_word_bordereau_fr', 'AttestationController@export_word_bordereau_fr')->name('attestation.export_word_bordereau_fr');
    Route::get('/export_word_message', 'AttestationController@export_word_message')->name('attestation.export_word_message');



    Route::get('/bordereau_ar','AttestationController@bordereau_ar')->name('attestation.bordereau_ar');
    Route::get('/bordereau_fr','AttestationController@bordereau_fr')->name('attestation.bordereau_fr');
    Route::get('/message','AttestationController@message')->name('attestation.message');





});

    #Exports
Route::prefix('exports')->group(function () {
    Route::get('/test','ExportController@test')->name('export.test');
});




#Absences
Route::prefix('avancement')->group(function () {
    Route::get('/','AvancementController@index')->name('avancement.index');
});















});
