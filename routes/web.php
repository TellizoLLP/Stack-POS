<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', \App\Http\Livewire\Login::class)->name('login')->middleware('install');
Route::group(['prefix' => 'admin/', 'middleware' => ['admin','install']], function () {
    Route::get('/dashboard', \App\Http\Livewire\Admin\Home::class)->name('admin.dashboard');
    Route::get('/pos', \App\Http\Livewire\Admin\Orders\PosScreen::class)->name('admin.pos');
    
    Route::group(['prefix' => 'inventory/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Inventory\InventoryView::class)->name('admin.view_inventory');
        Route::get('/products', \App\Http\Livewire\Admin\Products\ViewProducts::class)->name('admin.view_products');
        Route::get('/products/{id}/addons', \App\Http\Livewire\Admin\Products\Addons::class)->name('admin.addons');
        Route::get('/products/add', \App\Http\Livewire\Admin\Products\AddProducts::class)->name('admin.add_products');
        Route::get('/products/edit/{id}', \App\Http\Livewire\Admin\Products\EditProducts::class)->name('admin.edit_product');
        Route::get('/category', \App\Http\Livewire\Admin\ProductCategory\ProductCategory::class)->name('admin.product_category');
    });

    Route::group(['prefix' => 'orders/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Orders\Orders::class)->name('admin.orders');
        Route::get('/view/{id}', \App\Http\Livewire\Admin\Orders\ViewOrder::class)->name('admin.view_order');
        Route::get('/print/{order}/{printer}', \App\Http\Livewire\Admin\Orders\PrintOrder::class)->name('admin.print_order');
        Route::get('/status-screen', \App\Http\Livewire\Admin\Orders\OrderStatusScreen::class)->name('admin.order_status_screen');
    });
    Route::group(['prefix' => 'staffs/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Staff\ViewStaffs::class)->name('admin.staffs');
        Route::get('/create', \App\Http\Livewire\Admin\Staff\CreateStaff::class)->name('admin.create_staff');
        Route::get('/edit/{id}', \App\Http\Livewire\Admin\Staff\EditStaff::class)->name('admin.edit_staff');
    });

    Route::group(['prefix' => 'settings/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Settings\SettingsView::class)->name('admin.view_settings');
        Route::get('/app', \App\Http\Livewire\Admin\Settings\AppSettings::class)->name('admin.app_settings');
        Route::get('/account', \App\Http\Livewire\Admin\Settings\AccountSettings::class)->name('admin.account_settings');
    });
    Route::group(['prefix' => 'reports/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Reports\ReportsView::class)->name('admin.report_view');
        Route::get('/sales', \App\Http\Livewire\Admin\Reports\SalesReport::class)->name('admin.sales_report');
        Route::get('/day-wise', \App\Http\Livewire\Admin\Reports\DaywiseSalesReport::class)->name('admin.daywise_report');
        Route::get('/item-sales', \App\Http\Livewire\Admin\Reports\ItemSalesReport::class)->name('admin.item_sales_report');
        Route::get('/customer', \App\Http\Livewire\Admin\Reports\CustomerReport::class)->name('admin.customer_report');
    });
    Route::group(['prefix' => 'translations/'], function () {
        Route::get('/', \App\Http\Livewire\Admin\Translation\Translations::class)->name('admin.translations');
        Route::get('/add', \App\Http\Livewire\Admin\Translation\AddTranslations::class)->name('admin.add_translation');
        Route::get('/edit/{id}', \App\Http\Livewire\Admin\Translation\EditTranslations::class)->name('admin.edit_translation');
    });
    Route::get('/tables', \App\Http\Livewire\Admin\Tables\Tables::class)->name('admin.tables');
    Route::get('/customers', \App\Http\Livewire\Admin\Customers\Customers::class)->name('admin.customers');
});


Route::group(['prefix' => 'install/'], function () {
    Route::get('/', \App\Http\Livewire\Installer\Installer::class)->name('install');
});