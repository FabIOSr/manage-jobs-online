<?php

use App\Http\Controllers\Jobs\CompanyController;
use App\Http\Controllers\Jobs\ContractypeController;
use App\Http\Controllers\Jobs\DepartmentController;
use App\Http\Controllers\Jobs\ExperienceController;
use App\Http\Controllers\Jobs\JobTitleController;
use App\Http\Controllers\Jobs\OfficeController;
use App\Http\Controllers\Jobs\TypeVacancy;
use App\Http\Controllers\Jobs\VagasSolicitadaController;
use App\Http\Middleware\Authenticate;
use App\Livewire\Jobs\JobTitle\Index;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(Authenticate::class)->group(function(){

    //VACANCY TYPE
    Route::get('/vacancies', [TypeVacancy::class, 'index'] )->name('vacancies');
    Route::get('/vacancies/create', [TypeVacancy::class, 'create'] )->name('vacancies.create');
    Route::post('/vacancies', [TypeVacancy::class, 'store'] )->name('vacancies.store');
    Route::get('/vacancies/edit/{vacancy}', [TypeVacancy::class, 'edit'] )->name('vacancies.edit');
    Route::post('/vacancies/update/{vacancy}', [TypeVacancy::class, 'update'] )->name('vacancies.update');
    Route::post('/vacancies/delete/{vacancy}', [TypeVacancy::class, 'delete'] )->name('vacancies.delete');

    //DEPARTMENT
    Route::get('/departments', [DepartmentController::class, 'index'] )->name('departments');
    Route::get('/departments/create', [DepartmentController::class, 'create'] )->name('departments.create');
    Route::get('/departments/edit/{code}', [DepartmentController::class, 'edit'] )->name('departments.edit');
    Route::post('/departments', [DepartmentController::class, 'store'] )->name('departments.store');
    Route::post('/departments/update/{department}', [DepartmentController::class, 'update'] )->name('departments.update');
    Route::post('/departments/delete/{code}', [DepartmentController::class, 'delete'] )->name('departments.delete');

    //COMPANY
    Route::get('/companies', [CompanyController::class, 'index'] )->name('companies');
    Route::get('/companies/create', [CompanyController::class, 'create'] )->name('companies.create');
    Route::get('/companies/edit/{code}', [CompanyController::class, 'edit'] )->name('companies.edit');
    Route::post('/companies', [CompanyController::class, 'store'] )->name('companies.store');
    Route::put('/companies/update/{company}', [CompanyController::class, 'update'] )->name('companies.update');
    Route::delete('/companies/delete/{code}', [CompanyController::class, 'delete'] )->name('companies.delete');

    //OFFICE
    // Route::get('/job-titles', Index::class)->name('job.titles');
    Route::get('/job-title', [JobTitleController::class, 'listJobTitle'] )->name('job.titles');
    Route::get('/job-title/create', [JobTitleController::class, 'createView'] )->name('job.titles.create');
    Route::get('/job-title/edit/{code}', [JobTitleController::class, 'editJob'] )->name('job.titles.edit');
    Route::post('/job-title', [JobTitleController::class, 'saveJob'] )->name('job.titles.store');
    Route::post('/job-title/update/{office}', [JobTitleController::class, 'update'] )->name('job.titles.update');
    Route::post('/job-title/delete/{code}', [JobTitleController::class, 'delete'] )->name('job.titles.delete');

    //CONTRACT TYPE
    Route::get('/contract-type', [ContractypeController::class, 'index'] )->name('contract-types');
    Route::get('/contract-type/create', [ContractypeController::class, 'create'] )->name('contract-types.create');
    Route::get('/contract-type/edit/{code}', [ContractypeController::class, 'edit'] )->name('contract-types.edit');
    Route::post('/contract-type', [ContractypeController::class, 'store'] )->name('contract-types.store');
    Route::post('/contract-type/update/{contractType}', [ContractypeController::class, 'update'] )->name('contract-types.update');
    Route::post('/contract-type/delete/{code}', [ContractypeController::class, 'delete'] )->name('contract-types.delete');

    //EXPERIENCE
    Route::get('/experiences', [ExperienceController::class, 'index'] )->name('experiences');
    Route::get('/experiences/create', [ExperienceController::class, 'create'] )->name('experiences.create');
    Route::get('/departmenst/edit/{code}', [ExperienceController::class, 'edit'] )->name('experiences.edit');
    Route::post('/experiences', [ExperienceController::class, 'store'] )->name('experiences.store');
    Route::post('/experiences/update/{experience}', [ExperienceController::class, 'update'] )->name('experiences.update');
    Route::post('/experiences/delete/{code}', [ExperienceController::class, 'delete'] )->name('experiences.delete');

    //VAGAS SOLICITADAS
    Route::get('/vagas/solicitadas', [VagasSolicitadaController::class, 'index'])->name('vagas.solicitadas');
    Route::get('/vagas/solicitar', [VagasSolicitadaController::class, 'create'])->name('vagas.solicitar');
    Route::post('/vagas/solicitar', [VagasSolicitadaController::class, 'store'])->name('vagas.store');
});



Route::get('/reports', function () {
    return view('reports/index');
})->name('reports');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

