<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\EndeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarcodsController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\IncomingsController;
use App\Http\Controllers\OutgoingsController;
use App\Http\Controllers\TypeItemsController;
use App\Http\Controllers\ManualUpdateConteroller;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('/items', ItemsController::class)->middleware('auth');

Route::resource('/typeitem', TypeItemsController::class)->middleware('auth');

Route::resource('/barcods', BarcodsController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');

Route::resource('/incoming', IncomingsController::class)->middleware('auth');
Route::resource('/outgoing', OutgoingsController::class)->middleware('auth');
Route::get('/outgoing_end/{id}', [EndeController::class, 'create'])->middleware('auth');
Route::post('/outgoing_end/add', [EndeController::class, 'adddata'])->middleware('auth');
Route::get('/outgoing_end', [EndeController::class, 'index']);  
Route::post('/outgoing_end/delete/{id}', [EndeController::class, 'delete'])->middleware('auth');
Route::get('/pdfincoming/{id}', [PdfController::class, 'pdfincoming'])->middleware('auth');
Route::get('/pdfoutgoing/{id}', [PdfController::class, 'pdfoutgoing'])->middleware('auth');
Route::get('/pdfoutgoingend/{id}', [PdfController::class, 'pdfoutgoingend'])->middleware('auth');

Route::post('/name_item', [GetDataController::class, 'getName'])->middleware('auth');
Route::post('/brcd_item', [GetDataController::class, 'getEnumValue'])->middleware('auth');
Route::post('/max_qty', [GetDataController::class, 'getMaxQty'])->middleware('auth');
Route::get('/selectItem', [GetDataController::class, 'select_items'])->middleware('auth');
Route::post('/selectBrcd',[GetDataController::class,'brcd_items'])->middleware('auth');
Route::get('/selectType',[GetDataController::class,'type_items'])->middleware('auth');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::Post('/updateitem',[ManualUpdateConteroller::class,'updatedataitem'])->middleware('auth');
Route::Post('/updateuser',[ManualUpdateConteroller::class,'updatedatauser'])->middleware('auth');