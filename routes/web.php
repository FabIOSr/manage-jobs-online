<?php

use App\Http\Controllers\Jobs\CompanyController;
use App\Http\Controllers\Jobs\ContractypeController;
use App\Http\Controllers\Jobs\DepartmentController;
use App\Http\Controllers\Jobs\ExperienceController;
use App\Http\Controllers\Jobs\OfficeController;
use App\Http\Controllers\Jobs\TypeVacancy;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(Authenticate::class)->group(function(){

<<<<<<< HEAD
    //COMPANY
    Route::get('/companies', [CompanyController::class, 'index'] )->name('companies');
    Route::get('/companies/create', [CompanyController::class, 'create'] )->name('companies.create');
    Route::get('/companies/edit/{code}', [CompanyController::class, 'edit'] )->name('companies.edit');
    Route::post('/companies', [CompanyController::class, 'store'] )->name('companies.store');
    Route::post('/companies/update/{company}', [CompanyController::class, 'update'] )->name('companies.update');
    Route::post('/companies/delete/{code}', [CompanyController::class, 'delete'] )->name('companies.delete');


    // Route::get('companies', [CompanyController::class, 'index'])->name('companies');
    // Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    // Route::get('companies-all', [CompanyController::class, 'getAllCompany'])->name('companies.all');
    // Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');

    //EXPERIENCES
    Route::post('/experiences/store', [ExperienceController::class,'store'])->name('experiences.store');


    Route::get('/experience-level',Index::class)->name('experiences');

=======
>>>>>>> dcd68e7 (create company)
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
    Route::get('/departmenst/edit/{code}', [CompanyController::class, 'edit'] )->name('companies.edit');
    Route::post('/companies', [CompanyController::class, 'store'] )->name('companies.store');
    Route::post('/companies/update/{company}', [CompanyController::class, 'update'] )->name('companies.update');
    Route::post('/companies/delete/{code}', [CompanyController::class, 'delete'] )->name('companies.delete');

    //OFFICE
    Route::get('/offices', [OfficeController::class, 'index'] )->name('offices');
    Route::get('/offices/create', [OfficeController::class, 'create'] )->name('offices.create');
    Route::get('/offices/edit/{code}', [OfficeController::class, 'edit'] )->name('offices.edit');
    Route::post('/offices', [OfficeController::class, 'store'] )->name('offices.store');
    Route::post('/offices/update/{office}', [OfficeController::class, 'update'] )->name('offices.update');
    Route::post('/offices/delete/{code}', [OfficeController::class, 'delete'] )->name('offices.delete');

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

});


Route::get('/job-requested', function () {
    return view('jobsrequested/index');
})->name('jobsrequested');

Route::get('/reports', function () {
    return view('reports/index');
})->name('reports');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

