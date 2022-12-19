<?php

use App\Http\Livewire\Admin\ChargeComponent;
use App\Http\Livewire\Admin\ClientRecontrolComponent;
use App\Http\Livewire\Admin\GroupComponent;
use App\Http\Livewire\Admin\IncidentTypesComponent;
use App\Http\Livewire\Admin\MechanicComponen;
use App\Http\Livewire\Admin\OrderStateComponent;
use App\Http\Livewire\Admin\RoomComponent;
use App\Http\Livewire\Admin\SexComponent;
use App\Http\Livewire\Admin\StateChangeComponent;
use App\Http\Livewire\Admin\StateProductionComponent;
use App\Http\Livewire\Admin\TypeChangeComponent;
use App\Http\Livewire\Admin\TypeDecreaseComponent;
use App\Http\Livewire\Admin\TypeFaultComponent;
use App\Http\Livewire\Admin\TypeOrderComponent;
use App\Http\Livewire\Admin\User\CreateUser;
use App\Http\Livewire\Admin\User\EditUser;
use App\Http\Livewire\Admin\User\ShowUser;
use App\Http\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;


// //Usuarios
// Route::get('/users', ShowUser::class)->name('admin.users.index');
// Route::get('users/create', CreateUser::class)->name('admin.users.create');
// Route::get('users/{user}/edit', EditUser::class)->name('admin.users.edit');

// //Route::get('users', UserComponent::class)->name('admin.users.index');

// Route::get('salas', RoomComponent::class)->name('admin.rooms.index');

// Route::get('estdo-cambios', StateChangeComponent::class)->name('admin.state-changes.index');

// Route::get('orden-estado', OrderStateComponent::class)->name('admin.order-states.index');

// Route::get('estado-produccion', StateProductionComponent::class)->name('admin.state-productions.index');

// Route::get('tipos-ordenes', TypeOrderComponent::class)->name('admin.type-orders.index');

// Route::get('tipos-incidente', IncidentTypesComponent::class)->name('admin.incident-types.index');

// Route::get('tipos-cambio', TypeChangeComponent::class)->name('admin.type-changes.index');

// Route::get('sexo', SexComponent::class)->name('admin.sexes.index');

// Route::get('cargos', ChargeComponent::class)->name('admin.charges.index');

// Route::get('grupos', GroupComponent::class)->name('admin.groups.index');

// Route::get('mecanico', MechanicComponen::class)->name('admin.mechanic.index');

// Route::get('cliente-recontrol', ClientRecontrolComponent::class)->name('admin.client-recontrol.index');

// Route::get('tipos-averias', TypeFaultComponent::class)->name('admin.type-fault.index');

// Route::get('tipos-mermas', TypeDecreaseComponent::class)->name('admin.type-decrease.index');

//Usuarios
Route::get('/users', ShowUser::class)->middleware('can:admin.users.index')->name('admin.users.index');
Route::get('users/create', CreateUser::class)->middleware('can:admin.users.create')->name('admin.users.create');
Route::get('users/{user}/edit', EditUser::class)->middleware('can:admin.users.edit')->name('admin.users.edit');

//Route::get('users', UserComponent::class)->middleware('can:admin.users.index')->name('admin.users.index');

Route::get('salas', RoomComponent::class)->middleware('can:admin.rooms.index')->name('admin.rooms.index');

Route::get('estado-cambios', StateChangeComponent::class)->middleware('can:admin.state-changes.index')->name('admin.state-changes.index');

Route::get('orden-estado', OrderStateComponent::class)->middleware('can:admin.order-states.index')->name('admin.order-states.index');

Route::get('estado-produccion', StateProductionComponent::class)->middleware('can:admin.state-productions.index')->name('admin.state-productions.index');

Route::get('tipos-ordenes', TypeOrderComponent::class)->middleware('can:admin.type-orders.index')->name('admin.type-orders.index');

Route::get('tipos-incidente', IncidentTypesComponent::class)->middleware('can:admin.incident-types.index')->name('admin.incident-types.index');

Route::get('tipos-cambio', TypeChangeComponent::class)->middleware('can:admin.type-changes.index')->name('admin.type-changes.index');

Route::get('sexo', SexComponent::class)->middleware('can:admin.sexes.index')->name('admin.sexes.index');

Route::get('cargos', ChargeComponent::class)->middleware('can:admin.charges.index')->name('admin.charges.index');

Route::get('grupos', GroupComponent::class)->middleware('can:admin.groups.index')->name('admin.groups.index');

Route::get('mecanico', MechanicComponen::class)->middleware('can:admin.mechanic.index')->name('admin.mechanic.index');

Route::get('cliente-recontrol', ClientRecontrolComponent::class)->middleware('can:admin.client-recontrol.index')->name('admin.client-recontrol.index');

Route::get('tipos-averias', TypeFaultComponent::class)->middleware('can:admin.type-fault.index')->name('admin.type-fault.index');

Route::get('tipos-mermas', TypeDecreaseComponent::class)->middleware('can:admin.type-decrease.index')->name('admin.type-decrease.index');





