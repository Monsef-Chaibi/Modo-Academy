<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect('/HomePage');
});
Route::get('/verify', function () {
    return redirect('/HomePage');
})->middleware(['auth','verified']);

Route::get('/HomePage', [App\Http\Controllers\Controller::class, 'welcome'])->name('HomePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/RecordCourses', [App\Http\Controllers\Controller::class, 'RecordCourses'])->name('RecordCourses');

Route::get('/LiveCourses', [App\Http\Controllers\Controller::class, 'LiveCourses'])->name('LiveCourses');

Route::get('/LiveCourses/Course/{id}', [App\Http\Controllers\Controller::class, 'LiveCourseWatche'])->name('LiveCourseWatche');

Route::get('/CourseWatache/{id}', [App\Http\Controllers\Controller::class, 'CourseWatche'])->name('CourseWatche');

Route::get('/Cart', [App\Http\Controllers\Controller::class, 'Cart'])->name('Cart');

Route::post('/AddToCart/{id}', [App\Http\Controllers\Controller::class, 'AddToCart'])->name('AddToCart');

Route::get('/RemoveFromCart/{id}', [App\Http\Controllers\Controller::class, 'RemoveFromCart'])->name('RemoveFromCart');


Route::get('/lang/{local}', function($local){
    if(in_array($local,['ar','en'])){
        session()->put('local',$local);
    }
    return redirect()->back();
})->name('lang');


