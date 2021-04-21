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
    return view("connexion.login");
    // return view('gentelella-master2.production.template');
});

// Route::get('/', 'ExamenController@index');
Route::get('/test-contact', function () {
    return new App\Mail\Contact([
        'nom' => 'Durand',
        'email' => 'durand@chezlui.com',
        'message' => 'Je voulais vous dire que votre site est magnifique !'
    ]);
});

Route::get('confirmation', 'PayeController@verifPayement')->name('confirmation');
Route::get('payerconsult', 'PayeController@payerConsultation')->name('payerconsult');
Route::get('deconnecte', 'ConnexionController@deconnecte');
Route::resource('Todos', 'TodoController');
Route::resource('transaction', 'TransactionController');
Route::resource('contact', 'ContactController');
Route::resource('connexion', 'ConnexionController');
Route::resource('examen', 'ExamenController');
Route::resource('medecin', 'MedecinController');
Route::resource('disponibilite', 'DisponibiliteController');
Route::resource('affectation', 'AffectationController');
Route::resource('patient', 'PatientController');
Route::get('inscription', 'PatientController@inscription')->name('inscription');
Route::resource('rendezvous', 'RendezvousController');
Route::get('rendezvouspatient', 'RendezvousController@rendezvousPatient')->name('rendezvouspatient');
Route::get('reprogramme', 'RendezvousController@listereprogramme')->name('reprogramme');
Route::post('add', 'ExamenController@enregistrer');
Route::resource('structure', 'StructureController');
Route::resource('laboexam', 'LaboExamController');
Route::get('listelaboexamen', 'LaboExamController@listeexamen')->name('listeexamen');
Route::resource('test', 'TestController');
Route::resource('laboratoires', 'LaboratoiresController');
Route::resource('strspecial', 'StrSpecialController');
Route::resource('specialite', 'SpecialiteController');
Route::get('listeconsult', 'RendezvousController@listeconsultation')->name('listeconsult');
Route::post('rechercherconsult', 'RendezvousController@rechercherconsultation')->name('rechercherconsult');
Route::get('listeexamen', 'TestController@listexamen')->name('listexamen');
Route::post('rechercherexam', 'TestController@rechercherexamen')->name('rechercherexam');
Route::get('examenpatient', 'TestController@listeexamenPatient')->name('examenpatient');
Route::post('connect', 'ConnexionController@connexion')->name('connect');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
