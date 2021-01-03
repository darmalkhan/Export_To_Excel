<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\export_excel;
use App\Exports\UsersExport;


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
    return view('welcome');
});


//controllers

Route::get('export',[export_excel::class,'excel']);


//export file Route
Route::get('/Export', function () {
        return Excel::download(new UsersExport(), 'users.xlsx');
});


Route::get('/ExportPdf', function () {
        return Excel::download(new UsersExport(), 'users.pdf');
});