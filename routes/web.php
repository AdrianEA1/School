<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PrefectController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'loginForm'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


//Interfaz del prefecto #n
Route::get('/prefect_interface/{user_id}', [PrefectController::class, 'index'])->name('prefect_interface');

//Interfaz detalle prefecto
Route::get('/group_details_interface/{group_id}', [GroupController::class, 'index'])->name('group_details_interface');


//Interfaz del tutor
Route::get('/tutor_interface/{user_id}', [TutorController::class, 'index'])->name('tutor_interface');
Route::get('/get-attendances/{student_id}', [TutorController::class, 'getAttendances']);

Route::get('/tutor_interface/reports/{student_id}', [TutorController::class, 'reports']) ->name('tutor_interface_reports');
Route::post('make_report', action: [TutorController::class, 'makeReport']) ->name('make_report');
// Route::resource('make_report', TutorController::class);


//Tomar asistencia
Route::get('/asistencia', [SiteController::class, 'interface_qr']);
Route::post('/take', [QRController::class, 'store']);

//Interfaz CRUD reportes
/*Route::get('/reports_interface', function () {
    return view('school.reports_interface');
});*/
Route::get('/reports_interface/{student_id}/{nuevo?}', action: [ReportController::class, 'index'])->name('reports_interface');

Route::get('/report/list/{student_id}', [ReportController::class, 'list'])->name('report.list');

//Update Reporte
Route::post('/report/update', action: [ReportController::class, 'update'])->name('report.update');

Route::post(uri: '/report/store', action: [ReportController::class, 'store'])->name('report.store');

Route::post(uri: '/report/delete', action: [ReportController::class, 'delete'])->name('report.delete');

