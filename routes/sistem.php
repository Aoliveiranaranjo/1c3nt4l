<?php

use App\Http\Controllers\CustomerController;
use App\Http\Livewire\Dashboard\ShowEmployeesDashboard;
use App\Http\Livewire\Factory\Production\ViewProductionActiveFactory;
use App\Http\Livewire\Sistem\Article\CreateArticle;
use App\Http\Livewire\Sistem\Article\EditArticle;
use App\Http\Livewire\Sistem\Article\ShowArticle;
use App\Http\Livewire\Sistem\Change\EditChange;
use App\Http\Livewire\Sistem\Change\ShowChange;
use App\Http\Livewire\Sistem\Change\ShowChangeClosed;
use App\Http\Livewire\Sistem\Customer\CreateCustomer;
use App\Http\Livewire\Sistem\Customer\EditCustomer;
use App\Http\Livewire\Sistem\Customer\ShowCustomer;
use App\Http\Livewire\Sistem\Employee\CreateEmployee;
use App\Http\Livewire\Sistem\Employee\EditEmployee;
use App\Http\Livewire\Sistem\Employee\ShowEmployee;
use App\Http\Livewire\Sistem\Machine\CreateMachine;
use App\Http\Livewire\Sistem\Machine\EditMachine;
use App\Http\Livewire\Sistem\Machine\ShowMachine;
use App\Http\Livewire\Sistem\Order\CreateOrder;
use App\Http\Livewire\Sistem\Order\EditOrder;
use App\Http\Livewire\Sistem\Order\EditOrderClosed;
use App\Http\Livewire\Sistem\Order\EditOrderNew;
use App\Http\Livewire\Sistem\Order\EditOrderNull;
use App\Http\Livewire\Sistem\Order\EditOrderProgress;
use App\Http\Livewire\Sistem\Order\EditOrderStop;
use App\Http\Livewire\Sistem\Order\ShowOrder;
use App\Http\Livewire\Sistem\Order\ShowOrderClosed;
use App\Http\Livewire\Sistem\Order\ShowOrderNew;
use App\Http\Livewire\Sistem\Order\ShowOrderNull;
use App\Http\Livewire\Sistem\Order\ShowOrderProgress;
use App\Http\Livewire\Sistem\Order\ShowOrderStop;
use App\Http\Livewire\Sistem\Production\EditProduction;
use App\Http\Livewire\Sistem\Production\EditProductionClosed;
use App\Http\Livewire\Sistem\Production\EditProductionEnd;
use App\Http\Livewire\Sistem\Production\ShowProduction;
use App\Http\Livewire\Sistem\Production\ShowProductionActive;
use App\Http\Livewire\Sistem\Production\ShowProductionChange;
use App\Http\Livewire\Sistem\Production\ShowProductionClosed;
use App\Http\Livewire\Sistem\Production\ShowProductionEnd;
use App\Http\Livewire\Sistem\Production\ShowProductionExpres;
use App\Http\Livewire\Sistem\Production\ShowProductionNew;
use App\Http\Livewire\Sistem\Production\ShowProductionStop;
use App\Http\Livewire\Sistem\Production\ShowProductionOutsourced;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;



// Escritorio

// Route::middleware(['auth:sanctum', 'logs-out-banned-user',
//     config('jetstream.auth_session'),
//     'verified'
//  ])->group(function () {
//     Route::get('/', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });





//Clientes
Route::get('/customers', ShowCustomer::class)->middleware('can:sistem.customer.index')->name('sistem.customer.index');
Route::get('customers/create', CreateCustomer::class)->middleware('can:sistem.customers.create')->name('sistem.customers.create');
Route::get('customers/{customer}/edit', EditCustomer::class)->middleware('can:sistem.customers.edit')->name('sistem.customers.edit');
Route::get('customers/export', [CustomerController::class, 'export'])->middleware('can:sistem.customers.export')->name('sistem.customers.export');
Route::get('customers/import', [CustomerController::class, 'import'])->middleware('can:sistem.customers.import')->name('sistem.customers.import');


//Articulos
Route::get('/articles', ShowArticle::class)->middleware('can:sistem.article.index')->name('sistem.article.index');
Route::get('articles/create', CreateArticle::class)->middleware('can:sistem.articles.create')->name('sistem.articles.create');
Route::get('articles/{article}/edit', EditArticle::class)->middleware('can:sistem.articles.edit')->name('sistem.articles.edit');

//Empleados
Route::get('/employees', ShowEmployee::class)->middleware('can:sistem.employee.index')->name('sistem.employee.index');
Route::get('employees/create', CreateEmployee::class)->middleware('can:sistem.employees.create')->name('sistem.employees.create');
Route::get('employees/{employee}/edit', EditEmployee::class)->middleware('can:sistem.employees.edit')->name('sistem.employees.edit');
Route::get('/employees-dashboard', ShowEmployeesDashboard::class)->middleware('can:sistem.employee.dashboard.index')->name('sistem.employee.dashboard.index');

//Ordenes
Route::get('orders/create', CreateOrder::class)->middleware('can:sistem.orders.create')->name('sistem.orders.create');

Route::get('/orders', ShowOrder::class)->middleware('can:sistem.order.index')->name('sistem.order.index');
Route::get('/orders-null', ShowOrderNull::class)->middleware('can:sistem.order.null')->name('sistem.order.null');
Route::get('/orders-new', ShowOrderNew::class)->middleware('can:sistem.order.new')->name('sistem.order.new');
Route::get('/orders-progress', ShowOrderProgress::class)->middleware('can:sistem.order.progress')->name('sistem.order.progress');
Route::get('/orders-stop', ShowOrderStop::class)->middleware('can:sistem.order.stop')->name('sistem.order.stop');
Route::get('/orders-closed', ShowOrderClosed::class)->middleware('can:sistem.order.closed')->name('sistem.order.closed');

Route::get('orders/{order}/edit', EditOrder::class)->middleware('can:sistem.orders.edit')->name('sistem.orders.edit');
Route::get('orders-null/{order}/edit', EditOrderNull::class)->middleware('can:sistem.orders.edit.null')->name('sistem.orders.edit.null');
Route::get('orders-new/{order}/edit', EditOrderNew::class)->middleware('can:sistem.orders.edit.new')->name('sistem.orders.edit.new');
Route::get('orders-progress/{order}/edit', EditOrderProgress::class)->middleware('can:sistem.orders.edit.progress')->name('sistem.orders.edit.progress');
Route::get('orders-stop/{order}/edit', EditOrderStop::class)->middleware('can:sistem.orders.edit.stop')->name('sistem.orders.edit.stop');
Route::get('orders-closed/{order}/edit', EditOrderClosed::class)->middleware('can:sistem.orders.edit.closed')->name('sistem.orders.edit.closed');


//Producción
Route::get('/productions', ShowProduction::class)->middleware('can:sistem.production.index')->name('sistem.production.index');
Route::get('productions/{production}/view', ViewProductionActiveFactory::class)->middleware('can:sistem.productions.view')->name('sistem.productions.view');

//Route::get('productions/create', CreateProduction::class)->middleware('can:sistem.productions.create')->name('sistem.productions.create');
Route::get('productions/{production}/edit', EditProduction::class)->middleware('can:sistem.productions.edit')->name('sistem.productions.edit');
Route::get('productions-closed/{production}/edit-closed', EditProductionClosed::class)->middleware('can:sistem.productions.edit.closed')->name('sistem.productions.edit.closed');
Route::get('/productions-new', ShowProductionNew::class)->middleware('can:sistem.production.new')->name('sistem.production.new');
Route::get('/productions-change', ShowProductionChange::class)->middleware('can:sistem.production.change')->name('sistem.production.change');
Route::get('/productions-active', ShowProductionActive::class)->middleware('can:sistem.production.active')->name('sistem.production.active');
Route::get('/productions-express', ShowProductionExpres::class)->middleware('can:sistem.production.express')->name('sistem.production.express');
Route::get('/productions-stop', ShowProductionStop::class)->middleware('can:sistem.production.stop')->name('sistem.production.stop');
Route::get('/productions-end', ShowProductionEnd::class)->middleware('can:sistem.production.end')->name('sistem.production.end');
Route::get('/productions-closed', ShowProductionClosed::class)->middleware('can:sistem.production.closed')->name('sistem.production.closed');
Route::get('/productions-outsourced', ShowProductionOutsourced::class)->middleware('can:sistem.production.closed')->name('sistem.production.outsourced');
Route::get('productions-end/{production}/edit-end', EditProductionEnd::class)->middleware('can:sistem.productions.edit.end')->name('sistem.productions.edit.end');

//Cambios
Route::get('/changes', ShowChange::class)->middleware('can:sistem.change.index')->name('sistem.change.index');
Route::get('changes/{change}/edit', EditChange::class)->middleware('can:sistem.changes.edit')->name('sistem.changes.edit');
Route::get('/changes-closed', ShowChangeClosed::class)->middleware('can:sistem.change.index2')->name('sistem.change.index2');
Route::get('/changes-closed/{id}/restore', ShowChangeClosed::class, 'restore')->middleware('can:sistem.change.restore')->name('sistem.change.restore');

//Articulos
Route::get('/machines', ShowMachine::class)->middleware('can:sistem.machine.index')->name('sistem.machine.index');
Route::get('machines/create', CreateMachine::class)->middleware('can:sistem.machines.create')->name('sistem.machines.create');
Route::get('machines/{machine}/edit', EditMachine::class)->middleware('can:sistem.machines.edit')->name('sistem.machines.edit');

