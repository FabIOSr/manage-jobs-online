<?php

use App\Http\Controllers\Jobs\CompanyController;
use App\Http\Controllers\Jobs\DepartmentController;
use App\Http\Controllers\Jobs\ExperienceController;
use App\Http\Controllers\Jobs\TypeVacancy;
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

    //VACANCY TYPE
    Route::get('/vacancies', [TypeVacancy::class, 'index'] )->name('vacancies');
    Route::get('/vacancies/create', [TypeVacancy::class, 'create'] )->name('vacancies.create');
    Route::post('/vacancies', [TypeVacancy::class, 'store'] )->name('vacancies.store');
    Route::get('/edit/{vacancy}', [TypeVacancy::class, 'edit'] )->name('vacancies.edit');
    Route::post('/update/{vacancy}', [TypeVacancy::class, 'update'] )->name('vacancies.update');
    Route::post('/delete/{vacancy}', [TypeVacancy::class, 'delete'] )->name('vacancies.delete');

    //DEPARTMENT
    Route::get('/departments', [DepartmentController::class, 'index'] )->name('departments');
    Route::get('/departments/create', [DepartmentController::class, 'create'] )->name('departments.create');
    Route::get('/departmenst/edit/{code}', [DepartmentController::class, 'edit'] )->name('departments.edit');
    Route::post('/departments', [DepartmentController::class, 'store'] )->name('departments.store');
    Route::post('/departmenst/update/{department}', [DepartmentController::class, 'update'] )->name('departments.update');
    Route::post('/departmenst/delete/{code}', [DepartmentController::class, 'delete'] )->name('departments.delete');

});

// Route::get('/experience-level',[ExperienceController::class, 'index'])->name('experiences');
Route::get('/experience-level',Index::class)->name('experiences');

Route::get('/contract-types', function () {
    return view('contract/index');
})->name('contracttype');



Route::get('/job-requested', function () {
    return view('jobsrequested/index');
})->name('jobsrequested');

Route::get('/reports', function () {
    return view('reports/index');
})->name('reports');

Route::get('/offices', function () {
    return view('offices/index');
})->name('offices');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

