<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VercementController;
use App\Models\Commande;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
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

Route::get('/', function () {
    return view('pages.home');
})->middleware('auth')->name('home');

Route::get('/client/{id}/edit',function($id){
    return view('pages.editClient');
});
Route::middleware('auth')->group(function()
{
    // client routes
    Route::get('client',[ClientController::class,'index'])->name('client');
    Route::get('client/{id}',[ClientController::class,'edit'])->name('edit');
    Route::post('client',[ClientController::class,'store'])->name('client');
    Route::put('client/',[ClientController::class,'update'])->name('update');
    Route::delete('client/{client}',[ClientController::class,'destroy'])->name('destroyclient');

    // Service route
    Route::get('service',[ServiceController::class,'index'])->name('service');
    Route::post('service',[ServiceController::class,'store'])->name('storeservice');
    Route::get('service/{id}',[ServiceController::class,'edit'])->name('editservice');
    Route::put('service',[ServiceController::class,'update'])->name('updateservice');
    Route::delete('service/{id}',[ServiceController::class,'destroy'])->name('destroyservice');


    Route::get('commande',[CommandeController::class,'index'])->name('commande');
    Route::post('commande',[CommandeController::class,'store'])->name('storecommande');
    Route::get('commande/{id}',[CommandeController::class,'edit'])->name('editcommande');
    Route::put('commande',[CommandeController::class,'update'])->name('updatecommande');
    Route::delete('commande/{id}',[CommandeController::class,'destroy'])->name('destroycommande');

    // versement
    Route::get('versement',[VercementController::class,'index'])->name('allvercement');
    Route::get('versement/{id}',[VercementController::class,'create'])->name('vercement');
    Route::post('versement',[VercementController::class,'store'])->name('storevercement');

    // user
    Route::get('user',[UserController::class,'index'])->name('allusers');


});



require __DIR__.'/auth.php';
