<?php

use App\Http\Controllers\Jobs\CompanyController;
use App\Http\Controllers\Jobs\ExperienceController;
use App\Http\Middleware\Authenticate;
use App\Livewire\Jobs\Experiences\Index;
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

Route::middleware(Authenticate::class)->group(function(){

    Route::get('companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::get('companies-all', [CompanyController::class, 'getAllCompany'])->name('companies.all');
    Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');

    //EXPERIENCES
    Route::post('/experiences/store', [ExperienceController::class,'store'])->name('experiences.store');


    Route::get('/experience-level',Index::class)->name('experiences');

});

// Route::get('/experience-level',[ExperienceController::class, 'index'])->name('experiences');
Route::get('/experience-level',Index::class)->name('experiences');

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

