<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
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

Route::get('/','CustomerController@index');
Route::get('/test','CustomerController@test');



Route::group(['prefix' => 'admin'], function() {

    Route::get('/', function () {
       return redirect('/admin/login');
    });

Auth::routes();

Route::middleware('role:superadmin|admin|user|ketoan|kythuat|thungan')->group(function(){
    Route::get('/dashboard','ReportController@barChart')->name('dashboard');
    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    Route::middleware('role:superadmin|admin|thungan')->group(function (){
        Route::resource('users', 'UserController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('roles','RoleController');
        Route::resource('menus','MenuController');
        Route::get('menus/menu-builder/{menuId}','MenuItemController@index')->name('menu-builder.index');
        Route::put('menus/menu-builder/{menuId}','MenuItemController@update')->name('menu-builder.update'); // ajax

        Route::get('/menus/menu-builder/show/{itemId}','MenuItemController@showItem')->name('menu-item.show');
        Route::post('/menus/menu-builder/create/{menuId}','MenuItemController@storeItem')->name('menu-item.store');
        Route::post('/menus/menu-builder/update/{itemId}','MenuItemController@updateItem')->name('menu-item.update');
        Route::delete('/menus/menu-builder/delete/{itemId}','MenuItemController@destroyItem')->name('menu-item.destroy');
        Route::get('/menus/menu-builder/edit/{itemId}','MenuItemController@updateItemAction')->name('menu-item.updateItemAction');
        Route::post('/menus/menu-builder/edit/{itemId}','MenuItemController@submitUpdateItemAction')->name('menu-item.submitUpdateItemAction');

        Route::get('/product-types','ProductController@indexProductType')->name('products.types.index');
        Route::post('/product-types','ProductController@storeProductType')->name('products.types.store');
        Route::put('/product-types/{id}','ProductController@updateProductType')->name('products.types.update');
        Route::delete('/product-types/{id}','ProductController@destroyProductType')->name('products.types.destroy');
        Route::resource('/products','ProductController');
        Route::post('/product-search','ProductController@productSearch')->name('products.search');
        
        Route::resource('/contracts','ContractController');
        Route::get('/contracts/create','ContractController@create')->name('contracts.create');
        Route::get('/contracts/{id}','ContractController@show')->name('contracts.show');

        Route::post('/contracts/store','ContractController@store')->name('contracts.store');
        Route::delete('/contracts/delete/{id}','ContractController@destroy')->name('contracts.destroy');
        

        Route::resource('/companies','CompanyController')->only(['index','store','update','destroy']);

        Route::get('/bill/import/create','Bills\ImportController@create')->name('bill.import.create');
        Route::post('/bill/import/store','Bills\ImportController@store')->name('bill.import.store');
        Route::get('/bill/import','Bills\ImportController@index')->name('bill.import.index');
        Route::get('/bill/import/{id}','Bills\ImportController@show')->name('bill.import.show');
        Route::get('/bill/import/edit/{id}','Bills\ImportController@editAction')->name('bill.import.editAction');
        Route::delete('bill/import/delete/{id}','Bills\ImportController@deleteAction')->name('bill.import.delete');

        Route::get('/bill/export','Bills\ExportController@index')->name('bill.export.index');
        Route::get('/bill/export/create','Bills\ExportController@create')->name('bill.export.create');
        Route::post('/bill/export/store','Bills\ExportController@store')->name('bill.export.store');
        Route::get('/bill/export/{id}','Bills\ExportController@show')->name('bill.export.show');

        Route::get('/ajax/list-products/{id}','Bills\ImportController@getListProducts')->name('ajax.list.products');

        Route::get('/client','ClientController@index')->name('client.index');
        Route::get('/client/edit/{id}','ClientController@editAction')->name('client.editAction');
        Route::post('/client/edit/{id}','ClientController@submitEditAction')->name('client.submitEdit');
        Route::post('/client/add','ClientController@submitAddAction')->name('client.submitAdd');
        Route::delete('/client/delete/{id}','ClientController@deleteAction')->name('client.delete');
        Route::post('/client/add-client','ClientController@store')->name('client.store');
        Route::get('/report','ReportController@index')->name('report.index');
        Route::post('/report','ReportController@index')->name('report.index');

        //Bao cao xuat nhap ton
        Route::get('/eximreport','ExImReportController@index')->name('eximreport.index');
        Route::post('/eximreport','ExImReportController@index')->name('eximreport.index');

        Route::get('/companies','CompanyController@index')->name('companies.index');
        Route::post('/companies/add','CompanyController@submitAddAction')->name('companies.submitAdd');
        Route::delete('/companies/delete/{id}','CompanyController@deleteAction')->name('companies.delete');
        Route::get('/companies/edit/{id}','CompanyController@editAction')->name('companies.editAction');
        Route::post('/companies/edit/{id}','CompanyController@submitEditAction')->name('companies.submitEditAction');

        Route::get('/report-bar-chart','ReportController@barChart')->name('companies.bar-chart');

        Route::get('/update-profile/{id}','UserController@updateProfileAction')->name('user.update-profile');
        Route::post('/update-profile/{id}','UserController@submitUpdateProfileAction')->name('user.submit-update-profile');

        \App\BaseRoute::CheckOut();
        Route::get('/setting','SettingController@index')->name('setting');
        Route::post('/setting-chang-password','SettingController@changePasswordAction')->name('setting.change-password');
        Route::post('/setting-reset-password','SettingController@resetPasswordAction')->name('setting.email');

        //product ***
        Route::get('/product-management','ProductManagementController@index')->name('product-management');
        Route::get('/product-management/load','ProductManagementController@load')->name('product-management.load');
        Route::post('/product-management/postdata','ProductManagementController@postdata')->name('product-management.postdata');
        Route::get('/product-management/editdata','ProductManagementController@editdata')->name('product-management.editdata');
        Route::get('/product-management/deletedata','ProductManagementController@deletedata')->name('product-management.deletedata');

        //logo Home 
        Route::get('/logo', 'LogoController@getlogo');
        Route::post('/logo', 'LogoController@postlogo');
        
        //slide
        Route::get('/slide', 'SlideController@getslide');
        Route::post('/slide', 'SlideController@postslide');


    });
});

});


