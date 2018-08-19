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

//rute za logovanje, registraciju korisnika i odjavu
Route::post('/login', 'LoginKontroler@logovanje')->name('login');
Route::get('/odjava', 'LoginKontroler@odjava')->name('odjava');


//prikaz stranica
Route::get('/autor', 'PrikazKontroler@autor')->name('autor');
Route::get('/', 'PrikazKontroler@prijava')->name('pocetna');
Route::get('/registracija', 'PrikazKontroler@registracija')->name('registracija');
Route::post('/registrovan', 'LoginKontroler@registracija')->name('reg');

//AJAX rute
Route::group(['prefix' => '/ajax'], function(){
	Route::get('/anketa', 'AjaxKontroler@anketa')->name('ajaxAnketa');
	Route::post('/anketa', 'AjaxKontroler@anketa')->name('ajaxAnketa');
	Route::get('/ajaxTelefoni/{offset}', 'AjaxKontroler@ajaxTelefoni');
	Route::post('/filter', 'AjaxKontroler@filter')->name('filter');
	Route::get('/korpa', 'AjaxKontroler@korpa');
	Route::get('/search', 'AjaxKontroler@search');
});


Route::group(['middleware' => 'zastita'], function() {

	//rute za korisnika
	Route::get('/telefoni/', 'KorisnikKontroler@telefoni')->name('home');
	Route::get('/telefoni/{id?}', 'KorisnikKontroler@telefon')->name('Telefon');
	Route::get('/galerija', 'KorisnikKontroler@galerije')->name('galerije');
	Route::get('/galerija/{id?}', 'KorisnikKontroler@galerija')->name('galerija');
	Route::get('/anketa', 'KorisnikKontroler@anketa')->name('anketa');
	Route::get('/naruci/{proizvodjac}/{model}/{korisnik}', 'KorisnikKontroler@naruci')->name('naruci');
	Route::get('/korpa/{korisnik}', 'KorisnikKontroler@korpa')->name('korpa');
	Route::get('/korpa/brisanje/{korpa}', 'KorisnikKontroler@brisanjeNarucbine')->name('brisanjeNarucbine');
	Route::get('/popusti/', 'KorisnikKontroler@popusti')->name('popusti');
	Route::get('/popusti/{id}', 'KorisnikKontroler@popust');

	
	Route::group(['prefix'=> '/admin'], function(){

		Route::get('/grad', 'AdminKontroler@grad')->name('grad');
		Route::post('/grad/unos', 'AdminKontroler@unosGrad')->name('unosGrad');
		Route::get('/grad/brisanje/{id}', 'AdminKontroler@brisanjeGrad');
		Route::get('/grad/izmena/{id}', 'AdminKontroler@izmenaGrad');
		Route::post('/grad/update/{id}', 'AdminKontroler@updateGrad');

		Route::get('/meni', 'AdminKontroler@meni')->name('meni');
		Route::post('/meni/unos', 'AdminKontroler@unosMenija')->name('unosMeni');
		Route::get('/meni/brisanje/{id}', 'AdminKontroler@brisanjeMeni');
		Route::get('/meni/izmena/{id}', 'AdminKontroler@izmenaMeni');
		Route::post('/meni/update/{id}', 'AdminKontroler@updateMeni');

		Route::get('/korisnik', 'AdminKontroler@korisnik')->name('korisnik');
		Route::get('/korisnik/brisanje/{id}', 'AdminKontroler@brisanjeKorisnik');
		Route::get('/korisnik/izmena/{id}', 'AdminKontroler@izmenaUloga');
		Route::post('/korisnik/update/{id}', 'AdminKontroler@updateUloga');

		Route::get('/telefon', 'AdminKontroler@telefon')->name('telefon');
		Route::post('/telefon/unosProizvodjaca', 'AdminKontroler@unosProizvodjaca')->name('unosProizvodjaca');
		Route::post('/telefon/unos', 'AdminKontroler@unosModela')->name('unosModela');
		Route::get('/telefon/brisanje/{id}', 'AdminKontroler@brisanjeTelefona');
		Route::get('/telefon/izmena/{id}', 'AdminKontroler@izmenaTelefon');
		Route::post('/telefon/update/{id}', 'AdminKontroler@updateTelefon');

		Route::get('/anketa', 'AdminKontroler@anketa')->name('Anketa');
		Route::post('/anketa/unos', 'AdminKontroler@unosAnketa')->name('unosAnketa');
		Route::get('/anketa/brisanje/{id}', 'AdminKontroler@brisanjeAnkete');
		Route::get('/anketa/izmena/{id}', 'AdminKontroler@izmenaAnketa');
		Route::post('/anketa/update/{id}', 'AdminKontroler@updateAnketa');

		Route::get('/slajder', 'AdminKontroler@slajder')->name('slajder');
		Route::post('/slajder/unos', 'AdminKontroler@unosSlajdera')->name('unosSlajdera');
		Route::get('/slajder/brisanje/{id}', 'AdminKontroler@brisanjeSlajdera');
		Route::get('/slajder/izmena/{id}', 'AdminKontroler@izmenaSlajdera');
		Route::post('/slajder/update/{id}', 'AdminKontroler@updateSlajdera');

		Route::get('/galerija', 'AdminKontroler@galerija')->name('galerija');
		Route::post('/galerija/unos', 'AdminKontroler@unosSlike')->name('unosSlike');
		Route::get('/galerija/brisanje/{id}', 'AdminKontroler@brisanjeSlike');

		Route::get('/narucbine', 'AdminKontroler@narucbine')->name('naruceno');
		Route::get('/narucbine/brisanje/{id}', 'AdminKontroler@brisanjeNarucbine');

	});	
});

