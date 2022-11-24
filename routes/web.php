<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SystemInformationController;
use App\Http\Controllers\Backend\Auth\LoginController;
//use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPrintController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\ImageuploadController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\AttributeDetailController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\InventorynameController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\MainclientController;
use App\Http\Controllers\Admin\CardriverController;
use App\Http\Controllers\Admin\ConsigmentController;
use App\Http\Controllers\Admin\ReleaseController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\OtherConsigmentController;
use App\Http\Controllers\Admin\SelltoshopController;

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

Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');



    ///vendor
    Route::get('vendor', [VendorController ::class, 'index'])->name('admin.vendor');
    Route::get('vendor/search', [VendorController ::class, 'search'])->name('admin.vendor.search');
    Route::get('vendor/create', [VendorController ::class, 'create'])->name('admin.vendor.create');
    Route::post('vendor/store', [VendorController ::class, 'store'])->name('admin.vendor.store');
    Route::get('vendor/edit', [VendorController ::class, 'edit'])->name('admin.vendor.edit');
    Route::post('vendor/update', [VendorController ::class, 'update'])->name('admin.vendor.update');
    Route::delete('vendor/delete/{id}', [VendorController ::class, 'delete'])->name('admin.vendor.delete');


    ///vendor


    ///inventory_name


    Route::get('inventory_name', [InventorynameController ::class, 'index'])->name('admin.inventory_name');
    Route::get('inventory_name/search', [InventorynameController ::class, 'search'])->name('admin.inventory_name.search');
    Route::get('inventory_name/create', [InventorynameController ::class, 'create'])->name('admin.inventory_name.create');
    Route::post('inventory_name/store', [InventorynameController ::class, 'store'])->name('admin.inventory_name.store');
    Route::get('inventory_name/edit', [InventorynameController ::class, 'edit'])->name('admin.inventory_name.edit');
    Route::post('inventory_name/update', [InventorynameController ::class, 'update'])->name('admin.inventory_name.update');
    Route::delete('inventory_name/delete/{id}', [InventorynameController ::class, 'delete'])->name('admin.inventory_name.delete');

    ///inventory_name


    ///inventory


    Route::get('inventory/view', [InventoryController ::class, 'view'])->name('admin.inventory.view');



    Route::post('inventory_quantity/store', [InventoryController ::class, 'inventory_quantity'])->name('inventory_quantity');
    Route::delete('inventory_quantity/delete/{id}', [InventoryController ::class, 'inventory_quantity_delete'])->name('admin.inventory_quantity.delete');




    Route::get('inventory', [InventoryController ::class, 'index'])->name('admin.inventory');
    Route::get('inventory/search', [InventoryController ::class, 'search'])->name('admin.inventory.search');
    Route::get('inventory/create', [InventoryController ::class, 'create'])->name('admin.inventory.create');
    Route::post('inventory/store', [InventoryController ::class, 'store'])->name('admin.inventory.store');
    Route::get('inventory/edit', [InventoryController ::class, 'edit'])->name('admin.inventory.edit');
    Route::post('inventory/update', [InventoryController ::class, 'update'])->name('admin.inventory.update');
    Route::delete('inventory/delete/{id}', [InventoryController ::class, 'delete'])->name('admin.inventory.delete');


    ///inventory



     ///main_client


     Route::post('client_payment', [MainclientController ::class, 'client_payment'])->name('client_payment');




     Route::get('main_client', [MainclientController ::class, 'index'])->name('admin.main_client');
     Route::get('main_client/search', [MainclientController ::class, 'search'])->name('admin.main_client.search');
     Route::get('main_client/create', [MainclientController ::class, 'create'])->name('admin.main_client.create');
     Route::post('main_client/store', [MainclientController ::class, 'store'])->name('admin.main_client.store');
     Route::get('main_client/edit', [MainclientController ::class, 'edit'])->name('admin.main_client.edit');

     Route::get('main_client/view/{id}', [MainclientController ::class, 'view'])->name('admin.main_client.view');


     Route::post('main_client/update', [MainclientController ::class, 'update'])->name('admin.main_client.update');
     Route::delete('main_client/delete/{id}', [MainclientController ::class, 'delete'])->name('admin.main_client.delete');


     ///main_client


     ///car and driver


     Route::get('car_and_driver', [CardriverController ::class, 'index'])->name('admin.car_and_driver');
     Route::get('car_and_driver/search', [CardriverController ::class, 'search'])->name('admin.car_and_driver.search');
     Route::get('car_and_driver/create', [CardriverController ::class, 'create'])->name('admin.car_and_driver.create');
     Route::post('car_and_driver/store', [CardriverController ::class, 'store'])->name('admin.car_and_driver.store');
     Route::get('car_and_driver/edit', [CardriverController ::class, 'edit'])->name('admin.car_and_driver.edit');
     Route::post('car_and_driver/update', [CardriverController ::class, 'update'])->name('admin.car_and_driver.update');
     Route::delete('car_and_driver/delete/{id}', [CardriverController ::class, 'delete'])->name('admin.car_and_driver.delete');


     ///car and driver


     ///consigment

     Route::get('get_client_name', [ConsigmentController ::class, 'get_client_name'])->name('get_client_name');
     Route::get('get_truck_name', [ConsigmentController ::class, 'get_truck_name'])->name('get_truck_name');


     Route::get('consigment', [ConsigmentController ::class, 'index'])->name('admin.consigment');
     Route::get('consigment/search', [ConsigmentController ::class, 'search'])->name('admin.consigment.search');
     Route::get('consigment/create', [ConsigmentController ::class, 'create'])->name('admin.consigment.create');
     Route::post('consigment/store', [ConsigmentController ::class, 'store'])->name('admin.consigment.store');
     Route::get('consigment/edit/{id}', [ConsigmentController ::class, 'edit'])->name('admin.consigment.edit');
     Route::post('consigment/update', [ConsigmentController ::class, 'update'])->name('admin.consigment.update');
     Route::delete('consigment/delete/{id}', [ConsigmentController ::class, 'delete'])->name('admin.consigment.delete');



     Route::get('get_vendor_name', [OtherConsigmentController ::class, 'get_vendor_name'])->name('get_vendor_name');



     Route::get('other_consigment', [OtherConsigmentController ::class, 'index'])->name('admin.other_consigment');
     Route::get('other_consigment/search', [OtherConsigmentController ::class, 'search'])->name('admin.other_consigment.search');
     Route::get('other_consigment/create', [OtherConsigmentController ::class, 'create'])->name('admin.other_consigment.create');
     Route::post('other_consigment/store', [OtherConsigmentController ::class, 'store'])->name('admin.other_consigment.store');
     Route::get('other_consigment/edit/{id}', [OtherConsigmentController ::class, 'edit'])->name('admin.other_consigment.edit');
     Route::post('other_consigment/update', [OtherConsigmentController ::class, 'update'])->name('admin.other_consigment.update');
     Route::delete('other_consigment/delete/{id}', [OtherConsigmentController ::class, 'delete'])->name('admin.other_consigment.delete');






     Route::get('get_assaign_product_to_vendor', [SelltoshopController ::class, 'get_assaign_product_to_vendor'])->name('get_assaign_product_to_vendor');



     Route::get('sell_to_shop', [SelltoshopController ::class, 'index'])->name('admin.sell_to_shop');
     Route::get('sell_to_shop/search', [SelltoshopController ::class, 'search'])->name('admin.sell_to_shop.search');
     Route::get('sell_to_shop/create', [SelltoshopController ::class, 'create'])->name('admin.sell_to_shop.create');
     Route::post('sell_to_shop/store', [SelltoshopController ::class, 'store'])->name('admin.sell_to_shop.store');
     Route::get('sell_to_shop/edit/{id}', [SelltoshopController ::class, 'edit'])->name('admin.sell_to_shop.edit');
     Route::post('sell_to_shop/update', [SelltoshopController ::class, 'update'])->name('admin.sell_to_shop.update');
     Route::delete('sell_to_shop/delete/{id}', [SelltoshopController ::class, 'delete'])->name('admin.sell_to_shop.delete');

     ///consigment


     ///release list


     Route::get('release_product', [ReleaseController ::class, 'index'])->name('admin.release_product');
     Route::get('release_product/search', [ReleaseController ::class, 'search'])->name('admin.release_product.search');
     Route::get('release_product/create', [ReleaseController ::class, 'create'])->name('admin.release_product.create');
     Route::post('release_product/store', [ReleaseController ::class, 'store'])->name('admin.release_product.store');
     Route::get('release_product/edit', [ReleaseController ::class, 'edit'])->name('admin.release_product.edit');
     Route::post('release_product/update', [ReleaseController ::class, 'update'])->name('admin.release_product.update');
     Route::delete('release_product/delete/{id}', [ReleaseController ::class, 'delete'])->name('admin.release_product.delete');



     ///release list




    //sub_category

    Route::get('sub_category_type', [CategoryController::class, 'sub_category_type'])->name('sub_category_type');

    Route::get('category_type', [CategoryController::class, 'category_type'])->name('category_type');
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    //sub_category






    //new brand
    //ajax
    Route::get('brand_pagi_ajax', [BrandController ::class, 'brand_pagi_ajax'])->name('brand_pagi_ajax');
    Route::get('brand_ajax_multiple_delete', [BrandController ::class, 'brand_ajax_multiple_delete'])->name('brand_ajax_multiple_delete');
    Route::get('brand_ajax_multiple_select', [BrandController ::class, 'brand_ajax_multiple_select'])->name('brand_ajax_multiple_select');
    Route::get('brand_ajax_multiple_select_active', [BrandController ::class, 'brand_ajax_multiple_select_active'])->name('brand_ajax_multiple_select_active');

    Route::get('brand_search_ajax', [BrandController ::class, 'brand_search_ajax'])->name('brand_search_ajax');
    Route::get('brand_search_ajax_part2', [BrandController ::class, 'brand_search_ajax_part2'])->name('brand_search_ajax_part2');
    //ajax
    Route::get('brand', [BrandController ::class, 'index'])->name('admin.brand');
    Route::get('brand/search', [BrandController ::class, 'search'])->name('admin.brand.search');
    Route::get('brand/create', [BrandController ::class, 'create'])->name('admin.brand.create');
    Route::post('brand/store', [BrandController ::class, 'store'])->name('admin.brand.store');
    Route::get('brand/edit', [BrandController ::class, 'edit'])->name('admin.brand.edit');
    Route::post('brand/update', [BrandController ::class, 'update'])->name('admin.brand.update');
    Route::delete('brand/delete/{id}', [BrandController ::class, 'delete'])->name('admin.brand.delete');
    //end brand


     //new unit
    //ajax
    Route::get('unit_pagi_ajax', [UnitController ::class, 'unit_pagi_ajax'])->name('unit_pagi_ajax');
    Route::get('unit_ajax_multiple_delete', [UnitController ::class, 'unit_ajax_multiple_delete'])->name('unit_ajax_multiple_delete');
    Route::get('unit_ajax_multiple_select', [UnitController ::class, 'unit_ajax_multiple_select'])->name('unit_ajax_multiple_select');
    Route::get('unit_ajax_multiple_select_active', [UnitController ::class, 'unit_ajax_multiple_select_active'])->name('unit_ajax_multiple_select_active');

    Route::get('unit_search_ajax', [UnitController ::class, 'unit_search_ajax'])->name('unit_search_ajax');
    Route::get('unit_search_ajax_part2', [UnitController ::class, 'unit_search_ajax_part2'])->name('unit_search_ajax_part2');
    //ajax
    Route::get('unit', [UnitController ::class, 'index'])->name('admin.unit');
    Route::get('unit/search', [UnitController ::class, 'search'])->name('admin.unit.search');
    Route::get('unit/create', [UnitController ::class, 'create'])->name('admin.unit.create');
    Route::post('unit/store', [UnitController ::class, 'store'])->name('admin.unit.store');
    Route::get('unit/edit', [UnitController ::class, 'edit'])->name('admin.unit.edit');
    Route::post('unit/update', [UnitController ::class, 'update'])->name('admin.unit.update');
    Route::delete('unit/delete/{id}', [UnitController ::class, 'delete'])->name('admin.unit.delete');
    //end unit


    Route::get('system_information', [SystemInformationController::class, 'index'])->name('admin.system_information');
    Route::post('system_information/store', [SystemInformationController::class, 'store'])->name('admin.system_information.store');
    Route::post('system_information/update', [SystemInformationController::class, 'update'])->name('admin.system_information.update');
    Route::post('system_information/delete/{id}', [SystemInformationController::class, 'delete'])->name('admin.system_information.delete');

    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('admin.admins.update');
    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');



    Route::get('settings',[ProfileController::class, 'setting'])->name('admin.settings');
    Route::get('view_profile',[ProfileController::class, 'profile_view'])->name('admin.profile_view');







    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');



    Route::get('/logout_session',[SessionController::class,'logout_session'])->name('admin.logout_session');
    Route::get('/lock_screen/{email}',[SessionController::class,'lock_screen'])->name('admin.lock_screen');
    Route::post('/login_from_session',[SessionController::class,'login_from_session'])->name('admin.login_from_session');
    // Forget Password Routes



});
Route::get('/1recovery_password',[SessionController::class,'recovery_password'])->name('admin.recovery_password');

 Route::get('/1check_mail_from_list',[ForgetPasswordController::class,'check_mail_from_list'])->name('check_mail_from_list');
    Route::post('/1send_mail_get_from_list',[ForgetPasswordController::class,'send_mail_get_from_list'])->name('send_mail_get_from_list');
    Route::get('/password_reset_page',[ForgetPasswordController::class,'password_reset_page'])->name('password_reset_page');
    Route::get('/1successfully_mail_send/{id}',[ForgetPasswordController::class,'successfully_mail_send'])->name('successfully_mail_send');

    Route::post('/1password_change_confirmed',[ForgetPasswordController::class,'password_change_confirmed'])->name('password_change_confirmed');

    Route::get('/1password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
