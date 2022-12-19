<?php

use App\Http\Controllers\Recontrol\RecontrolController;
use App\Http\Livewire\Factory\Change\EditChangeFactory;
use App\Http\Livewire\Factory\Change\ShowChangeFactory;
use App\Http\Livewire\Factory\CreateMechanicFactory;
use App\Http\Livewire\Factory\EditMechanicFactory;
use App\Http\Livewire\Factory\EditProductionFactory;
use App\Http\Livewire\Factory\EditQualityFactory;
use App\Http\Livewire\Factory\Faults\EditFaultFactory;
use App\Http\Livewire\Factory\Faults\ShowFaultFactory;
use App\Http\Livewire\Factory\Faults\ViewFaultFactory;
use App\Http\Livewire\Factory\Quality\EditQualityProduction;
use App\Http\Livewire\Factory\Quality\ShowQualityProduction;
use App\Http\Livewire\Factory\Recontrol\CreateRecontrols;
use App\Http\Livewire\Factory\Recontrol\EditLorealRecontrols;
use App\Http\Livewire\Factory\Recontrol\EditPuigRecontrols;
use App\Http\Livewire\Factory\Recontrol\EditRecontrols;
use App\Http\Livewire\Factory\Recontrol\ShowHistoryRecontrols;
use App\Http\Livewire\Factory\Recontrol\ShowLorealRecontrols;
use App\Http\Livewire\Factory\Recontrol\ShowPuigRecontrols;
use App\Http\Livewire\Factory\Recontrol\ShowRecontrols;
use App\Http\Livewire\Factory\ShowMechanicFactory;
use App\Http\Livewire\Factory\ShowProductionFactory;
use App\Http\Livewire\Factory\ShowQualityFactory;
use App\Http\Livewire\Factory\ShowQualityOne;
use App\Http\Livewire\Factory\Store\EditStorePtFactory;
use App\Http\Livewire\Factory\Store\EditStorePtFactoryClosed;
use App\Http\Livewire\Factory\Store\ShowStorePtFactory;
use App\Http\Livewire\Factory\Store\ShowStorePtFactoryClosed;
use App\Http\Livewire\Sistem\CreateProduction;
use App\Models\Production;
use App\Models\Recontrol;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;




// Escritorio

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//  ])->group(function () {
//     Route::get('/', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });



/*
// Inicio  mecanicos fabricación
Route::get('/inicio/mecanica', ShowMechanicFactory::class)->name('factory.mechanic.index');
//Route::get('inicio/mecanica/{production}/crear', CreateMechanicFactory::class)->name('factory.mechanic.create');
Route::get('inicio/mecanica/{production}/editar', EditMechanicFactory::class)->name('factory.mechanic.edit');

// Inicio calidad fabricación
Route::get('/inicio/calidad', ShowQualityFactory::class)->name('factory.qualities.index');
//Route::get('inicio/calidad/crear', CreateProduction::class)->name('factory.productions.create');
Route::get('inicio/calidad/{production}/editar', EditQualityFactory::class)->name('factory.qualities.edit');

//produccion de calidad
Route::get('/calidad/produccion', ShowQualityProduction::class)->name('quality.production.index');
Route::get('/calidad/produccion/{order}/editar', EditQualityProduction::class)->name('quality.production.edit');


//Producción en fabrica
Route::get('/producciones', ShowProductionFactory::class)->name('factory.production.index');
//Route::get('productions/create', CreateProduction::class)->name('sistem.productions.create');
Route::get('producciones/{production}/editar', EditProductionFactory::class)->name('factory.productions.edit');
//Route::get('/productions-closed', ShowProductionClosed::class)->name('sistem.production.index2');

//Averías
Route::get('/averias', ShowFaultFactory::class)->name('factory.fault.index');
Route::get('/averias/{production}/editar', EditFaultFactory::class)->name('factory.fault.edit');

//Cambios
Route::get('/cambios', ShowChangeFactory::class)->name('factory.change.index');
Route::get('/cambios/{change}/editar', EditChangeFactory::class)->name('factory.change.edit');


//recontroles
//Route::get('/recontroles',  [RecontrolController::class, 'index']  )->name('factory.recontrol.index'); //ojo ver si quito
Route::get('/recontroles-show', ShowRecontrols::class)->name('factory.recontrol.show.index');
Route::get('/recontroles-history', ShowHistoryRecontrols::class)->name('factory.recontrol.history.index');
Route::get('/recontroles/crear', CreateRecontrols::class)->name('factory.recontrol.create');
Route::get('/recontroles/{recontrol}/editar', EditRecontrols::class)->name('factory.recontrol.edit');
Route::get('/recontroles/{recontrol}/editar-puig', EditPuigRecontrols::class)->name('factory.recontrol.edit.puig');
Route::get('/recontroles/{recontrol}/editar-loreal', EditLorealRecontrols::class)->name('factory.recontrol.edit.loreal');
Route::get('/recontroles-loreal', ShowLorealRecontrols::class)->name('factory.recontrol.show.index.loreal');
Route::get('/recontroles-puig', ShowPuigRecontrols::class)->name('factory.recontrol.show.index.puig');

//Almacén
Route::get('/almacen', ShowStorePtFactory::class)->name('factory.store.pt.index');
Route::get('/almacen-closed', ShowStorePtFactoryClosed::class)->name('factory.store.pt.closed');
Route::get('/almacen/{qualityProduction}/editar', EditStorePtFactory::class)->name('factory.store.pt.edit');
*/

// Inicio  mecanicos fabricación
Route::get('/inicio/mecanica', ShowMechanicFactory::class)->middleware('can:factory.mechanic.index')->name('factory.mechanic.index');
//Route::get('inicio/mecanica/{production}/crear', CreateMechanicFactory::class)->middleware('can:factory.mechanic.create')->name('factory.mechanic.create');
Route::get('inicio/mecanica/{production}/editar', EditMechanicFactory::class)->middleware('can:factory.mechanic.edit')->name('factory.mechanic.edit');

// Inicio calidad fabricación
Route::get('/inicio/calidad', ShowQualityFactory::class)->middleware('can:factory.qualities.index')->name('factory.qualities.index');
//Route::get('inicio/calidad/crear', CreateProduction::class)->middleware('can:factory.productions.create')->name('factory.productions.create');
Route::get('inicio/calidad/{production}/editar', EditQualityFactory::class)->middleware('can:factory.qualities.edit')->name('factory.qualities.edit');

//produccion de calidad
Route::get('/calidad/produccion', ShowQualityProduction::class)->middleware('can:quality.production.index')->name('quality.production.index');
Route::get('/calidad/produccion/{order}/editar', EditQualityProduction::class)->middleware('can:quality.production.edit')->name('quality.production.edit');


//Producción en fabrica
Route::get('/producciones', ShowProductionFactory::class)->middleware('can:factory.production.index')->name('factory.production.index');
Route::get('producciones/{production}/editar', EditProductionFactory::class)->middleware('can:factory.productions.edit')->name('factory.productions.edit');
//Route::get('/productions-closed', ShowProductionClosed::class)->middleware('can:sistem.production.index2')->name('sistem.production.index2');

//Averías
Route::get('/averias', ShowFaultFactory::class)->middleware('can:factory.fault.index')->name('factory.fault.index');
Route::get('/averias/{production}/editar', EditFaultFactory::class)->middleware('can:factory.fault.edit')->name('factory.fault.edit');

//Cambios
Route::get('/cambios', ShowChangeFactory::class)->middleware('can:factory.change.index')->name('factory.change.index');
Route::get('/cambios/{change}/editar', EditChangeFactory::class)->middleware('can:factory.change.edit')->name('factory.change.edit');


//recontroles
//Route::get('/recontroles',  [RecontrolController::class, 'index']  )->middleware('can:factory.recontrol.index')->name('factory.recontrol.index'); //ojo ver si quito
Route::get('/recontroles-show', ShowRecontrols::class)->middleware('can:factory.recontrol.show.index')->name('factory.recontrol.show.index');
Route::get('/recontroles-history', ShowHistoryRecontrols::class)->middleware('can:factory.recontrol.history.index')->name('factory.recontrol.history.index');
Route::get('/recontroles/crear', CreateRecontrols::class)->middleware('can:factory.recontrol.create')->name('factory.recontrol.create');
Route::get('/recontroles/{recontrol}/editar', EditRecontrols::class)->middleware('can:factory.recontrol.edit')->name('factory.recontrol.edit');
Route::get('/recontroles/{recontrol}/editar-puig', EditPuigRecontrols::class)->middleware('can:factory.recontrol.edit.puig')->name('factory.recontrol.edit.puig');
Route::get('/recontroles/{recontrol}/editar-loreal', EditLorealRecontrols::class)->middleware('can:factory.recontrol.edit.loreal')->name('factory.recontrol.edit.loreal');
Route::get('/recontroles-loreal', ShowLorealRecontrols::class)->middleware('can:factory.recontrol.show.index.loreal')->name('factory.recontrol.show.index.loreal');
Route::get('/recontroles-puig', ShowPuigRecontrols::class)->middleware('can:factory.recontrol.show.index.puig')->name('factory.recontrol.show.index.puig');

//Almacén
Route::get('/almacen', ShowStorePtFactory::class)->middleware('can:factory.store.pt.index')->name('factory.store.pt.index');
Route::get('/almacen-closed', ShowStorePtFactoryClosed::class)->middleware('can:factory.store.pt.closed')->name('factory.store.pt.closed');
Route::get('/almacen/{qualityProduction}/editar', EditStorePtFactory::class)->middleware('can:factory.store.pt.edit')->name('factory.store.pt.edit');
