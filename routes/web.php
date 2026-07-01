<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Models\Patient;
use App\Http\Controllers\DoctorController;
use App\Models\Doctor;
use App\Http\Controllers\RegistrationController;
use App\Models\Registration;
use App\Http\Controllers\TestGroupController;
use App\Http\Controllers\PrintGroupController;
use App\Http\Controllers\TestParameterController;
use App\Http\Controllers\RegistrationDetailController;
use App\Http\Controllers\LabSettingController;
use App\Http\Controllers\SampleTypeController;
use App\Http\Controllers\SampleCollectionController;
use App\Http\Controllers\AnalyzerController;
use App\Http\Controllers\AnalyzerTestMappingController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ReferenceRangeController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ReferenceDetailController;

Route::get('/', function () {

    $totalPatients = Patient::count();
    $totalDoctors = Doctor::count();
    $totalRegistrations = Registration::count();

    return view('dashboard', compact('totalPatients', 'totalDoctors', 'totalRegistrations'));

});

Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('registrations', RegistrationController::class);
Route::resource('test-groups', TestGroupController::class);
Route::resource('print-groups',PrintGroupController::class);
Route::resource('test-parameters',TestParameterController::class);
Route::resource('sample-types', SampleTypeController::class);
Route::resource(
    'analyzers',
    AnalyzerController::class
);
Route::resource(
    'methods',
    MethodController::class
);
Route::resource('units', UnitController::class);
Route::get('/search-patient/{norm}', function ($norm) {

    return App\Models\Patient::where(
        'norm',
        $norm
    )->first();

});
Route::resource(
    'reference-ranges',
    ReferenceRangeController::class
);
Route::get(
    '/registrations/{registration}/tests',
    [RegistrationDetailController::class,'create']
);

Route::post(
    '/registrations/{registration}/tests',
    [RegistrationDetailController::class,'store']
);
Route::get(
    '/registrations/{registration}/invoice',
    [RegistrationController::class,
     'invoice']
);
Route::get(
'/registrations/{id}/invoice',
[RegistrationController::class,'invoice']
)->name('registrations.invoice');

Route::get(
'/lab-setting',
[LabSettingController::class,'edit']
);

Route::post(
'/lab-setting',
[LabSettingController::class,'update']
);

Route::get(
    '/sample-collections',
    [SampleCollectionController::class,'index']
);

Route::post(
    '/sample-collections/{sample}/collect',
    [SampleCollectionController::class,'collect']
);

Route::post(
    '/sample-collections/{sample}/receive',
    [SampleCollectionController::class,'receive']
);

Route::get('/sample-collections',
    [SampleCollectionController::class, 'index']);

Route::post('/sample-collections/{sample}/collect',
    [SampleCollectionController::class, 'collect']);

Route::post('/sample-collections/{sample}/receive',
    [SampleCollectionController::class, 'receive']);

Route::get(
    '/sample-collections/{sample}/label',
    [SampleCollectionController::class, 'label']
)->name('sample.label');

Route::get(
    '/analyzers/{analyzer}/mapping',
    [AnalyzerTestMappingController::class,'index']
)->name('analyzers.mapping');

Route::post(
    '/analyzers/{analyzer}/mapping',
    [AnalyzerTestMappingController::class,'store']
)->name('analyzers.mapping.store');

Route::get(
    '/analyzers/{analyzer}/mapping',
    [AnalyzerTestMappingController::class,'index']
)->name('analyzers.mapping');

Route::post(
    '/analyzers/{analyzer}/mapping',
    [AnalyzerTestMappingController::class,'store']
)->name('analyzers.mapping.store');

Route::resource(
    'references',
    ReferenceController::class
);

Route::get(
    'references/{reference}/detail',
    [ReferenceDetailController::class,'index']
)->name('references.detail');

Route::get(
    'references/{reference}/detail/create',
    [ReferenceDetailController::class,'create']
)->name('references.detail.create');

Route::post(
    'references/{reference}/detail',
    [ReferenceDetailController::class,'store']
)->name('references.detail.store');

Route::get(
    'reference-detail/{detail}/edit',
    [ReferenceDetailController::class,'edit']
)->name('reference.detail.edit');

Route::put(
    'reference-detail/{detail}',
    [ReferenceDetailController::class,'update']
)->name('reference.detail.update');

Route::delete(
    'reference-detail/{detail}',
    [ReferenceDetailController::class,'destroy']
)->name('reference.detail.destroy');

Route::get(
    'reference-detail/{detail}/copy',
    [ReferenceDetailController::class,'copy']
)->name('reference.detail.copy');

Route::get(
    'references/{reference}/quick-add',
    [ReferenceDetailController::class,'quickAdd']
)->name('references.detail.quickadd');

Route::post(
    'references/{reference}/quick-add',
    [ReferenceDetailController::class,'quickStore']
)->name('references.detail.quickstore');

Route::post(
    'references/{reference}/copy-mapping',
    [ReferenceController::class,'copyMapping']
)->name('references.copy.mapping');