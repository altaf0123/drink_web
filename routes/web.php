<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController as LoginController;

use App\Http\Controllers\user\DashboardController as ClientDashController;
use App\Http\Controllers\user\ProductsController as ClientProducts;
use App\Http\Controllers\user\OrdersController as ClientOrders;
use App\Http\Controllers\user\TablesController as ClientTables;
use App\Http\Controllers\user\ReservationsController as ClientReservations;
use App\Http\Controllers\user\ReportsController as ClientReports;
use App\Http\Controllers\user\ProfileController as ClientProfile;
use App\Http\Controllers\user\UsersController as ClientUser;
use App\Http\Controllers\user\WaitersController as ClientWaiter;
use App\Http\Controllers\user\ManagersController as ClientManager;

use App\Http\Controllers\waiter\DashboardController as WaiterDashController;
use App\Http\Controllers\waiter\ProductsController as WaiterProducts;
use App\Http\Controllers\waiter\OrdersController as WaiterOrders;
use App\Http\Controllers\waiter\TablesController as WaiterTables;
use App\Http\Controllers\waiter\ReservationsController as WaiterReservations;
use App\Http\Controllers\waiter\ReportsController as WaiterReports;
use App\Http\Controllers\waiter\ProfileController as WaiterProfile;

use App\Http\Controllers\manager\DashboardController as ManagerDashController;
use App\Http\Controllers\manager\ProductsController as ManagerProducts;
use App\Http\Controllers\manager\CategoriesController as ManagerCategories;
use App\Http\Controllers\manager\ProfileController as ManagerProfile;
use App\Http\Controllers\manager\WaitersController as ManagerWaiter;
use App\Http\Controllers\manager\UsersController as ManagerWaiterUser;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductsController as AdminProducts;
use App\Http\Controllers\admin\OrdersController as AdminOrders;
use App\Http\Controllers\admin\TablesController;
use App\Http\Controllers\admin\ReservationsController;
use App\Http\Controllers\admin\BarsController;
use App\Http\Controllers\admin\CMSController;
use App\Http\Controllers\admin\ReportsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\SearchController;
use App\Http\Controllers\admin\WaitersController;
use App\Http\Controllers\admin\ManagersController;
use App\Http\Controllers\admin\DealsController;
use App\Http\Controllers\admin\InvoiceController;

Auth::routes();

/* General Routes */

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::get('/invoice/{id}', [App\Http\Controllers\HomeController::class, 'invoice']);
/* End General Routes */

Route::middleware(['admin','role:admin'])->prefix('admin')->namespace('admin')->group(static function(){
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    /************************************** Categories ****************************************/
    
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/categories/add', [CategoriesController::class, 'create']);
    Route::get('/categories/delete/{id}', [CategoriesController::class, 'remove']);
    Route::get('/categories/view/{id}', [CategoriesController::class, 'show']);

    Route::post('/categories/add', [CategoriesController::class, 'create']);
    Route::post('/categories/update/{id}', [CategoriesController::class, 'update']);

    /************************************** Products ****************************************/
    
    Route::get('/products', [AdminProducts::class, 'index']);
    Route::get('/products/add', [AdminProducts::class, 'create']);
    Route::get('/products/delete/{id}', [AdminProducts::class, 'remove']);
    Route::get('/products/view/{id}', [AdminProducts::class, 'show']);

    Route::post('/products/add', [AdminProducts::class, 'create']);
    Route::post('/products/update/{id}', [AdminProducts::class, 'update']);
    Route::get('/products/search', [AdminProducts::class, 'search'])->name('products_admin.search');

    Route::get('/products/product/{id}', [AdminProducts::class, 'show2']);

    /************************************** Orders ********************************************/
    
    Route::get('/orders', [AdminOrders::class, 'index']);
    Route::get('/orders/add', [AdminOrders::class, 'create']);
    Route::post('/orders/add', [AdminOrders::class, 'create']);
    Route::get('/orders/view/{id}', [AdminOrders::class, 'show']);
    Route::get('/orders/toPending/{id}', [AdminOrders::class, 'toPending']);
    Route::get('/orders/toComplete/{id}', [AdminOrders::class, 'toComplete']);
    Route::get('/orders/toPaid/{id}', [AdminOrders::class, 'toPaid']);
    Route::get('/orders/toUnPaid/{id}', [AdminOrders::class, 'toUnPaid']);    
    Route::get('/orders/search', [AdminOrders::class, 'search'])->name('web_admin.search');
    Route::post('/orders/update/{id}', [AdminOrders::class, 'update']);
    Route::get('/orders/order_chart_by_restaurant/{id}', [AdminOrders::class, 'order_chart_by_restaurant']);

    /************************************** Tables  *******************************************/
    
    Route::get('/tables', [TablesController::class, 'index']);
    Route::get('/tables/add', [TablesController::class, 'create']);
    Route::get('/tables/view/{id}', [TablesController::class, 'show']);
    Route::get('/tables/delete/{id}', [TablesController::class, 'remove']);

    Route::post('/tables/add', [TablesController::class, 'create']);
    Route::post('/tables/update/{id}', [TablesController::class, 'update']);
    Route::get('/tables/show/{id}', [TablesController::class, 'show']);
    Route::get('/tables/search', [TablesController::class, 'search'])->name('tables_admin.search');

    /************************************** Reservation  **************************************/
    
    Route::get('/reservations', [ReservationsController::class, 'index']);
    Route::get('/reservations/add', [ReservationsController::class, 'create']);
    Route::get('/reservations/view/{id}', [ReservationsController::class, 'show']);
    Route::get('/reservations/delete/{id}', [ReservationsController::class, 'remove']);

    Route::post('/reservations/add', [ReservationsController::class, 'create']);
    Route::post('/reservations/update/{id}', [ReservationsController::class, 'update']);
    Route::get('/reservations/show/{id}', [ReservationsController::class, 'show']);

    /************************************** Bar  *********************************************/
    
    Route::get('/restaurants/index', [BarsController::class, 'index']);
    Route::get('/restaurants/add', [BarsController::class, 'create']);
    Route::get('/restaurants/view/{id}', [BarsController::class, 'show']);
    Route::get('/restaurants/delete/{id}', [BarsController::class, 'remove']);

    Route::post('/restaurants/add', [BarsController::class, 'create']);
    Route::post('/restaurants/update/{id}', [BarsController::class, 'update']);
    Route::post('/restaurants/uploadRestaurantImages', [BarsController::class, 'uploadRestaurantImages']);
    Route::post('/restaurants/fileDestroy', [BarsController::class, 'fileDestroy']);
    Route::get('/restaurants/DeleteGet/{id}', [BarsController::class, 'DeleteGet']);
    Route::get('/restaurants/show/{id}', [BarsController::class, 'show']);
    Route::get('/restaurants/ledger', [BarsController::class, 'ledger']);
    Route::get('/restaurants/ledgerUser', [BarsController::class, 'ledgerUser']);
    
    Route::get('/restaurants/toPending/{id}', [BarsController::class, 'toPending']);
    Route::get('/restaurants/toComplete/{id}', [BarsController::class, 'toComplete']);

    /************************************** CMS  ********************************************/
    
    Route::get('/cms/show/{name}', [CMSController::class, 'show']);    
    Route::post('/cms/show/{name}', [CMSController::class, 'show']);

    /************************************** Reports  ****************************************/
    Route::get('/reports/show', [ReportsController::class, 'show']);   
    Route::get('/reports/total_orders_all_time', [ReportsController::class, 'total_orders_all_time']);
    Route::get('/reports/orders_by_highest_grand', [ReportsController::class, 'orders_by_highest_grand']);

    /************************************** Profile  ****************************************/
    
    Route::get('/profile/show', [ProfileController::class, 'show']);   
    Route::post('/profile/update', [ProfileController::class, 'update']);

    /************************************** Users  ****************************************/
    
    Route::get('/users', [UsersController::class, 'index'])->name('users.list');;
    Route::get('/users/add', [UsersController::class, 'create']);
    Route::get('/users/view/{id}', [UsersController::class, 'show']);
    Route::get('/users/delete/{id}', [UsersController::class, 'remove']);
   
    Route::post('/users/update/{id}', [UsersController::class, 'update']);
    Route::post('/users/add', [UsersController::class, 'create']);
    
    Route::get('/users/toPending/{id}', [UsersController::class, 'toPending']);
    Route::get('/users/toComplete/{id}', [UsersController::class, 'toComplete']);
    
    Route::get('/users/toVerifyPending/{id}', [UsersController::class, 'toVerifyPending']);
    Route::get('/users/toVerifyComplete/{id}', [UsersController::class, 'toVerifyComplete']);
    
    /************************************** Waiters ****************************************/
    
    Route::get('/waiters', [WaitersController::class, 'index'])->name('waiters.list');
    Route::get('/waiters/assign/{id}', [WaitersController::class, 'assign'])->name('waiters.assign');
    Route::post('/waiters/assign/{id}', [WaitersController::class, 'assign'])->name('waiters.assign');
    Route::get('/waiters/viewOrders/{id}', [WaitersController::class, 'assign'])->name('waiters.assign');
    
    /************************************** Managers ****************************************/
    
    Route::get('/managers', [ManagersController::class, 'index'])->name('managers.list');
    Route::get('/managers/assign/{id}', [ManagersController::class, 'assign'])->name('managers.assign');
    Route::post('/managers/assign/{id}', [ManagersController::class, 'assign'])->name('managers.assign');
    Route::get('/managers/viewOrders/{id}', [ManagersController::class, 'assign'])->name('managers.assign');
    
    /************************************** Deals ****************************************/
    
    Route::get('/deals', [DealsController::class, 'index'])->name('deals.list');;
    Route::get('/deals/add', [DealsController::class, 'create']);
    Route::get('/deals/view/{id}', [DealsController::class, 'show']);
    Route::get('/deals/delete/{id}', [DealsController::class, 'remove']);
   
    Route::post('/deals/update/{id}', [DealsController::class, 'update']);
    Route::post('/deals/add', [DealsController::class, 'create']);
    
    /************************************** Invoices ****************************************/
    
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('deals.list');
    Route::get('/invoices/add', [InvoiceController::class, 'create']);
    Route::get('/invoices/view/{id}', [InvoiceController::class, 'show']);
    Route::get('/invoices/delete/{id}', [InvoiceController::class, 'remove']);
   
    Route::post('/invoices/add', [InvoiceController::class, 'create']);
    Route::get('/invoices/invoice/{id}', [InvoiceController::class, 'invoice']);

    /************************************** Search  ****************************************/
    
    Route::get('/search', [SearchController::class, 'index']);

});


/*
*  
*    @USER/RESTAURANT END
*    @ROUTES
*
*/

Route::middleware(['user','role:user'])->prefix('user')->namespace('user')->group(static function(){

    Route::get('/', [ClientDashController::class, 'index'])->name('dashboard');

    /************************************** Products ****************************************/
    
    Route::get('/products', [ClientProducts::class, 'index']);
    Route::get('/products/add', [ClientProducts::class, 'create']);
    Route::get('/products/delete/{id}', [ClientProducts::class, 'remove']);
    Route::get('/products/view/{id}', [ClientProducts::class, 'show']);

    Route::post('/products/add', [ClientProducts::class, 'create']);
    Route::post('/products/update/{id}', [ClientProducts::class, 'update']);
    Route::get('/products/search', [ClientProducts::class, 'search'])->name('products_user.search');

    /************************************** Orders ********************************************/
    
    Route::get('/orders', [ClientOrders::class, 'index']);
    
    Route::get('/orders/add', [ClientOrders::class, 'create']);
    Route::post('/orders/add', [ClientOrders::class, 'create']);
    
    Route::post('/orders/update/{id}', [ClientOrders::class, 'update']);

    Route::get('/orders/view/{id}', [ClientOrders::class, 'show']);
    
    Route::get('/orders/toPending/{id}', [ClientOrders::class, 'toPending']);
    Route::get('/orders/toComplete/{id}', [ClientOrders::class, 'toComplete']);
    
    Route::get('/orders/toPaid/{id}', [ClientOrders::class, 'toPaid']);
    Route::get('/orders/toUnPaid/{id}', [ClientOrders::class, 'toUnPaid']);   
    
    Route::get('/orders/search', [ClientOrders::class, 'search'])->name('web.search');
    
    Route::get('/orders/order_chart_by_restaurant/{id}', [ClientOrders::class, 'order_chart_by_restaurant']);
    
    /************************************** Tables  *******************************************/
    
    Route::get('/tables', [ClientTables::class, 'index']);
    Route::get('/tables/add', [ClientTables::class, 'create']);
    Route::get('/tables/view/{id}', [ClientTables::class, 'show']);
    Route::get('/tables/delete/{id}', [ClientTables::class, 'remove']);

    Route::post('/tables/add', [ClientTables::class, 'create']);
    Route::post('/tables/update/{id}', [ClientTables::class, 'update']);
    Route::get('/tables/show/{id}', [ClientTables::class, 'show']);
    Route::get('/tables/search', [ClientTables::class, 'search'])->name('tables_user.search');

    /************************************** Reservation  **************************************/
    
    Route::get('/reservations', [ClientReservations::class, 'index']);
    Route::get('/reservations/add', [ClientReservations::class, 'create']);
    Route::get('/reservations/view/{id}', [ClientReservations::class, 'show']);
    Route::get('/reservations/delete/{id}', [ClientReservations::class, 'remove']);

    Route::post('/reservations/add', [ClientReservations::class, 'create']);
    Route::post('/reservations/update/{id}', [ClientReservations::class, 'update']);
    Route::get('/reservations/show/{id}', [ClientReservations::class, 'show']);

    /************************************** Reports  ****************************************/
    
    Route::get('/reports/show', [ClientReports::class, 'show']);   
    Route::get('/reports/total_orders_all_time', [ClientReports::class, 'total_orders_all_time']);
    Route::get('/reports/orders_by_highest_grand', [ClientReports::class, 'orders_by_highest_grand']);

    /************************************** Profile  ****************************************/
    
    Route::get('/profile/show', [ClientProfile::class, 'show']);   
    Route::post('/profile/update', [ClientProfile::class, 'update']);
    
    /************************************** Users  ****************************************/
    
    Route::get('/users', [ClientUser::class, 'index'])->name('users.list');
    Route::get('/managers', [ClientUser::class, 'index2']);

    Route::get('/users/add', [ClientUser::class, 'create']);
    Route::get('/users/view/{id}', [ClientUser::class, 'show']);
    Route::get('/managers/view/{id}', [ClientUser::class, 'show']);

    Route::get('/users/delete/{id}', [ClientUser::class, 'remove']);
   
    Route::post('/users/update/{id}', [ClientUser::class, 'update']);
    Route::post('/managers/update/{id}', [ClientUser::class, 'update']);

    Route::post('/users/add', [ClientUser::class, 'create']);
    
    Route::get('/users/toPending/{id}', [ClientUser::class, 'toPending']);
    Route::get('/users/toComplete/{id}', [ClientUser::class, 'toComplete']);
    
    Route::get('/users/toVerifyPending/{id}', [ClientUser::class, 'toVerifyPending']);
    Route::get('/users/toVerifyComplete/{id}', [ClientUser::class, 'toVerifyComplete']);
    
    Route::get('/users/ledger', [ClientUser::class, 'ledger']);

    
    /************************************** Waiters  ****************************************/
    
    Route::get('/waiters', [ClientWaiter::class, 'index'])->name('waiters.list');
    Route::get('/waiters/assign/{id}', [ClientWaiter::class, 'assign'])->name('waiters.assign');
    Route::post('/waiters/assign/{id}', [ClientWaiter::class, 'assign'])->name('waiters.assign');
    Route::get('/waiters/viewOrders/{id}', [ClientWaiter::class, 'assign'])->name('waiters.assign');
    

});


/*
*  
*    @WAITER END
*    @ROUTES
*
*/

Route::middleware(['waiter','role:waiter'])->prefix('waiter')->namespace('waiter')->group(static function(){

    Route::get('/', [WaiterDashController::class, 'index'])->name('dashboard');
    
    /************************************** Orders ********************************************/
    
    Route::get('/orders', [WaiterOrders::class, 'index']);
    Route::get('/orders/view/{id}', [WaiterOrders::class, 'show']);
    Route::get('/orders/toPending/{id}', [WaiterOrders::class, 'toPending']);
    Route::get('/orders/toComplete/{id}', [WaiterOrders::class, 'toComplete']);
    Route::get('/orders/search', [WaiterOrders::class, 'search'])->name('orders_waiter.search');
    Route::get('/orders/ledger', [WaiterOrders::class, 'ledger']);

    /************************************** Profile  ****************************************/
    Route::get('/profile/show', [WaiterProfile::class, 'show']);   
    Route::post('/profile/update', [WaiterProfile::class, 'update']);


});


/*
*  
*    @MANAGER END
*    @ROUTES
*
*/

Route::middleware(['manager','role:manager'])->prefix('manager')->namespace('manager')->group(static function(){
    
    Route::get('/', [ManagerDashController::class, 'index']);
    
    /************************************** Categories ****************************************/
    
    Route::get('/categories', [ManagerCategories::class, 'index']);
    Route::get('/categories/view/{id}', [ManagerCategories::class, 'show']);
    Route::post('/categories/update/{id}', [ManagerCategories::class, 'update']);
    
    /************************************** Products ****************************************/
    
    Route::get('/products', [ManagerProducts::class, 'index']);
    Route::get('/products/add', [ManagerProducts::class, 'create']);
    Route::get('/products/view/{id}', [ManagerProducts::class, 'show']);
    Route::get('/products/product/{id}', [ManagerProducts::class, 'show2']);
    Route::get('/products/search', [ManagerProducts::class, 'search']);
    Route::post('/products/update/{id}', [ManagerProducts::class, 'update']);
    
    /************************************** Profile  ****************************************/
    
    Route::get('/profile/show', [ManagerProfile::class, 'show']);   
    Route::post('/profile/update', [ManagerProfile::class, 'update']);
    
    /************************************** Waiters  ****************************************/
    
    Route::get('/waiters', [ManagerWaiter::class, 'index']);
    Route::get('/waiters/assign/{id}', [ManagerWaiter::class, 'assign']);
    Route::get('/waiters/viewOrders/{id}', [ManagerWaiter::class, 'assign']);
    Route::post('/waiters/assign/{id}', [ManagerWaiter::class, 'assign']);
    
    
    Route::get('/users/toPending/{id}', [ManagerWaiterUser::class, 'toPending']);
    Route::get('/users/toComplete/{id}', [ManagerWaiterUser::class, 'toComplete']);
    
    Route::get('/users/toVerifyPending/{id}', [ManagerWaiterUser::class, 'toVerifyPending']);
    Route::get('/users/toVerifyComplete/{id}', [ManagerWaiterUser::class, 'toVerifyComplete']);

});
