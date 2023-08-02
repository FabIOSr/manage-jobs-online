<?php

use App\Http\Controllers\Jobs\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/experience-level', function () {
    return view('experience/index');
})->name('experiences');

Route::get('/contract-types', function () {
    return view('contract/index');
})->name('contracttype');

Route::get('/job-types', function () {
    return view('jobstype/index');
})->name('jobstype');

Route::get('/job-requested', function () {
    return view('jobsrequested/index');
})->name('jobsrequested');

Route::get('/reports', function () {
    return view('reports/index');
})->name('reports');

Route::get('/departments', function () {
    return view('departments/index');
})->name('departments');

Route::get('/offices', function () {
    return view('offices/index');
})->name('offices');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('companies', [CompanyController::class, 'index'])->name('companies');
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::get('companies-all', [CompanyController::class, 'getAllCompany'])->name('companies.all');
Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
