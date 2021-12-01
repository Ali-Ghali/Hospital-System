<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[AdminController::class,'addview']);    
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);  
Route::delete('/cancel_apoint/{id}', [HomeController::class, 'cancel_apoint']);
Route::get('/showappointment',[AdminController::class,'showappointment']);  
Route::get('/approved/{id}',[AdminController::class,'approved']);  
Route::get('/canceled/{id}',[AdminController::class,'canceled']);  
Route::get('/showdoctors',[AdminController::class,'showdoctors']);  
Route::delete('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::get('/doctorupdate/{id}', [AdminController::class, 'edit']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);
Route::get('/emailview/{id}', [AdminController::class, 'emailview']);
Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);