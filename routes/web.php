<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UpdateLabController;
use App\Http\Controllers\FullCalenderController;
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

//front end
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('trangchu1');
Route::get('/trangchu', 'App\Http\Controllers\HomeController@index')->name('trangchupage');
Route::get('/danhsachdk', 'App\Http\Controllers\HomeController@list');  

//backend

//calendar
Route::get('fullcalendar','App\Http\Controllers\FullCalenderController@index')->name('calendar');
Route::get('fullcalendarpage','App\Http\Controllers\FullCalenderController@indexpage')->name('calendarpage');
Route::get('fullcalendaradmin','App\Http\Controllers\FullCalenderController@indexadmin')->name('calendaradmin');
Route::post('fullcalendar/create','App\Http\Controllers\FullCalenderController@store');
Route::post('fullcalendar/update','App\Http\Controllers\FullCalenderController@update');
Route::post('fullcalendar/delete','App\Http\Controllers\FullCalenderController@destroy');
Route::get('/lichptn','App\Http\Controllers\RegistrationController@lichptn')->name('lichptn');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/welcome', 'App\Http\Controllers\AdminController@showdashboard')->name('welcome'); 
Route::get('/logout','App\Http\Controllers\AdminController@log_out')->name('logout');
Route::post('/welcome','App\Http\Controllers\AdminController@dashboard')->name('trangchu');
Route::get('/dasboard','App\Http\Controllers\AdminController@admindashboard')->name('dasboard');
Route::post('/account', [AdminController::class, 'createAccount'])->name('account');
Route::get('/account', 'App\Http\Controllers\AdminController@showaccount')->name('accountform');
Route::get('/danhsachacount', 'App\Http\Controllers\AdminController@Account')->name('accounts');
Route::delete('/delete_acount/{role}', [AdminController::class, 'deleteAccount'])->name('delete_acount');
Route::put('/update_acount/{id}/update', [AdminController::class, 'updateAccount'])->name('update_acount')->middleware('web');


Route::get('/dk', 'App\Http\Controllers\RegistrationController@showRegistrationForm')->name('registrations');
Route::get('/register', 'App\Http\Controllers\RegistrationController@Registration')->name('list');
Route::get('/danhsach', 'App\Http\Controllers\RegistrationController@Registration1')->name('danhsach');
Route::get('/danhsachadmin', 'App\Http\Controllers\RegistrationController@Registration2')->name('danhsachadmin');

Route::post('/register', 'App\Http\Controllers\RegistrationController@register')->name('dangky');
Route::get('/lich', 'App\Http\Controllers\RegistrationController@Registers');
Route::get('/lich', [RegistrationController::class, 'showregistrationschedule'])->name('lich');
Route::delete('/delete_route/{id}', [RegistrationController::class, 'deleteRegistration'])->name('delete_route');
Route::get('/update_route/{id}/{idUser}/update', [RegistrationController::class, 'updateRegistration'])->name('update_route')->middleware('web');
Route::get('/update_routeRefuse/{id}/update', [RegistrationController::class, 'updateRegistrationRefuse'])->name('update_routeRefuse')->middleware('web');

Route::get('/Thoigian', 'App\Http\Controllers\TimeController@showTimeForm')->name('thoigian');
Route::get('/Thoigiandk', 'App\Http\Controllers\TimeController@Times')->name('timetg');
Route::post('/Thoigian', 'App\Http\Controllers\TimeController@createTime')->name('times');
Route::delete('/delete_tg/{id}', [TimeController::class, 'destroy'])->name('delete_tg');

Route::get('/PTN', 'App\Http\Controllers\LabController@showlabForm')->name('PTNghiem');
Route::get('/PTNghiem_lab', 'App\Http\Controllers\LabController@showlabsForm')->name('PTNghiem1');

Route::post('/PTNghiem', 'App\Http\Controllers\LabController@createLab')->name('PTN');
Route::get('/dsPTN', 'App\Http\Controllers\LabController@Labs')->name('dsPTN');
Route::delete('/deletelab/{id}', [LabController::class, 'deletelab'])->name('deletelab');
Route::get('/capnhat', 'App\Http\Controllers\LabController@updatelab')->name('capnhat');
Route::put('/update_lab/{id}/update', [LabController::class, 'updatelabs'])->name('update_lab')->middleware('web');

Route::get('/Phongtn/{id}', [LabController::class, 'show'])->name('Phongtn');
Route::get('/PTN', 'App\Http\Controllers\LabController@labptn')->name('PTN1');
Route::get('/phong/{id}', [LabController::class, 'showlabtrangchu'])->name('phong');
Route::get('/Ptn', 'App\Http\Controllers\LabController@labstrangchu')->name('ptn');
Route::get('/phongtn/{id}', 'App\Http\Controllers\LabController@showadmin')->name('ptn1');

Route::get('/ThietBi', 'App\Http\Controllers\DeviceController@showdeviceForm')->name('ThietBi');
Route::post('/thietbi', 'App\Http\Controllers\DeviceController@creatdevice')->name('tb');
Route::get('/dsthietbi', 'App\Http\Controllers\DeviceController@Devices')->name('dsthietbi');
Route::delete('/deletetb/{id}', [DeviceController::class, 'deletedevice'])->name('deletetb');
Route::put('/update_tb/{id}/update', [DeviceController::class, 'updatedevice'])->name('update_tb')->middleware('web');

Route::get('/YeuCau', 'App\Http\Controllers\UpdateLabController@showupdateForm')->name('YeuCau');
Route::post('/YeuCauChinhSua', 'App\Http\Controllers\UpdateLabController@createupdate')->name('YeuCauChinhSua');
Route::get('/dsYeuCau', 'App\Http\Controllers\UpdateLabController@listupdate')->name('dsYeuCau');
Route::delete('/deleteup/{id}', [UpdateLabController::class, 'deleteupdate'])->name('deleteup');

Route::get('/login', function() {
    return view('login');
});

Route::get('/PTNCNVL', function() {
    return view('PTNCNVL');
});

Route::get('/PTNKTVL', function() {
    return view('PTNKTVL');
});

Route::get('/PTNVLYS', function() {
    return view('PTNVLYS');
});

Route::get('/PTNVLP', function() {
    return view('PTNVLP');
});

Route::get('/trangchu', function() {
    return view('trangchu');
});

Route::get('/amn', function() {
    return view('ad');
});

