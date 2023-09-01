<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ClasseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::controller(TableauController::class)->group(function () {
   Route::get('classes/etudiants', 'index')->name('films.category');
});*/



Route::get('index', [TableauController::class, 'index'])->name('index');
Route::post('inscription', [TableauController::class, 'inscription'])->name('inscription');
Route::post('store', [TableauController::class, 'store'])->name('store');
Route::get('show', [TableauController::class, 'show'])->name('show');
//Route::resource('etudiant', TableauController::class);


Route::get('exemple', [TableauController::class, 'createArray'])->name('exemple');

Route::get('/basic_response', function () {
    return 'Hello World';
 });
/* Route::get('/index', function() {
    return view('index');
 });*/
 Route::get('/inscription', function() {
    return view('etudiants.inscription');
 });
 Route::get('/form',function() {
    return view('form');
 });
Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');


Route::resource('classes', ClasseController::class);
Route::resource('etudiants', EtudiantController::class);

?>
