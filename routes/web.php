<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProvincesImport;


Auth::routes();


Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', [App\Http\Controllers\TypeController::class, 'index'])->name('type.index');


Route::get('/vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'show'])->name('vehicles.show');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/vehicle/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicle', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicle/{vehicle}/edit', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::post('/vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::get('/vehicle/list', [App\Http\Controllers\VehicleController::class, 'list'])->name('vehicles.list');
    Route::get('/vehicle/{vehicle}/pdf', [App\Http\Controllers\VehicleController::class, 'adminpdf'])->name('vehicles.adminpdf');

    Route::get('/vehicle/{vehicle}/photos', [App\Http\Controllers\PhotoController::class, 'index'])->name('photos.index');
    Route::post('/vehicle/{vehicle}/photos', [App\Http\Controllers\PhotoController::class, 'store'])->name('photos.store');
    Route::post('/photos/{photo}', [App\Http\Controllers\PhotoController::class, 'destroy'])->name('photos.destroy');
    //Route::get('/photos', [App\Http\Controllers\PhotoController::class, 'reorderAll'])->name('photos.reorderAll');
    //Route::post('/photos/reorder', [App\Http\Controllers\PhotoController::class, 'reorder'])->name('photos.reorder');
    //Route::post('/photos/selection', [App\Http\Controllers\PhotoController::class, 'destroyselection'])->name('photos.destroyselection');

    Route::resource('brands', App\Http\Controllers\BrandController::class);
    Route::resource('providers', App\Http\Controllers\ProviderController::class);
    Route::resource('containertypes', App\Http\Controllers\ContainerTypeController::class);
    Route::get('/repuestos/create', [App\Http\Controllers\MachineryPartController::class,'create'])->name('machineryparts.create');
    Route::post('/repuestos', [App\Http\Controllers\MachineryPartController::class,'store'])->name('machineryparts.store');
    Route::get('/repuestos/{machineryPart}/edit', [App\Http\Controllers\MachineryPartController::class,'edit'])->name('machineryparts.edit');
    Route::post('/repuestos/{machineryPart}', [App\Http\Controllers\MachineryPartController::class, 'update'])->name('machineryparts.update');
    Route::delete('/repuestos/{machineryPart}', [App\Http\Controllers\MachineryPartController::class, 'destroy'])->name('machineryparts.destroy');
});
Route::get('/photos/{vehicle}', [App\Http\Controllers\PhotoController::class, 'reorderAll'])->name('photos.reorderAll');
Route::get('/photosM/{machineryPart}', [App\Http\Controllers\PhotoController::class, 'reorderAllMachinery'])->name('photos.reorderAllMachinery');
Route::post('/photos/reorder', [App\Http\Controllers\PhotoController::class, 'reorder'])->name('photos.reorder');
Route::post('/photosM/reorder', [App\Http\Controllers\PhotoController::class, 'reorderMachineryParts'])->name('photos.reorderMachineryParts');
Route::post('/photos', [App\Http\Controllers\PhotoController::class, 'destroyselection'])->name('photos.destroyselection');
//Route::post('/photos/selection', [App\Http\Controllers\PhotoController::class, 'destroyselection'])->name('photos.destroyselection');
Route::get('/vehicle/{vehicle}/pdf', [App\Http\Controllers\VehicleController::class, 'adminpdf'])->name('vehicles.pdf');

Route::get('rent', [App\Http\Controllers\RentController::class, 'index'])->name('rent.index');
Route::get('rent/{vethicle}', [App\Http\Controllers\RentController::class, 'create'])->name('rent.create');
Route::post('rent', [App\Http\Controllers\RentController::class, 'store'])->name('rent.store');
Route::get('repuestos', [App\Http\Controllers\MachineryPartController::class, 'index'])->name('machineryparts.index');
Route::get('repuestos/{machineryPart}', [App\Http\Controllers\MachineryPartController::class, 'show'])->name('machineryparts.show');

Route::get('/noticias/idae', [App\Http\Controllers\PoliticController::class, 'news'])->name('politics.news');

Route::get('testing/repuestos', function () {

    return App\Models\MachineryPart::all();
    /*$vehicle = App\Models\Vehicle::first();
    $photo = $vehicle->photos()->first()->url;
    $photos = $vehicle->photos()->pluck('url');
    $path = 'public/mini/'.$vehicle->registration;
    $y = 1;
    foreach ($photos as $photo) {
        $path = str_replace('public','storage',$path);
        Image::make($photo)->resize(300, 200)->save($path.'/'.$vehicle->registration.'_'.$y.'.jpeg');
        $y += 1;
        $pht = Image::make($photo)->resize(300, 200);
    }
    return 'okkk'.$y;

    //return App\Models\Photo::all();
    //$vehicle = App\Models\Vehicle::first();
    //$pdf = PDF::loadView('vehicles.infopdfAdmin',['vehicle' => $vehicle]);
    //return $pdf->download('test.pdf');*/
    //Excel::import(new ProvincesImport, 'provinces.xlsx');
    //return 'success. All Provincess imported good!';
});
Route::get('/{type}', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.index');
