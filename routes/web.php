<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;


// Log In and Register
Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    // Route::group(['middleware' => 'admin_auth', 'prefix' => 'category', 'namespace' => 'admin'], function () { });
    Route::middleware(['admin_auth'])->group(function () {

        // admin -> account
        Route::prefix('admin')->group(function () {
            // Password
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            // account info
            Route::get('details', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');

            // admin list
            Route::get('adminlist', [AdminController::class, 'adminlist'])->name('admin#adminlist');
            Route::get('listdelete/{id}', [AdminController::class, 'listdelete'])->name('admin#listdelete');
            Route::get('changerole/{id}', [AdminController::class, 'changerole'])->name('admin#changerole');
            Route::post('roleupdate/{id}', [AdminController::class, 'roleupdate'])->name('admin#roleUpdate');

            // user list
            Route::get('userlist', [AdminController::class, 'userlist'])->name('admin#userlist');
            Route::get('userdelete/{id}', [AdminController::class, 'userDelete'])->name('admin#userdelete');
            Route::get('ajax_userrolechange', [AdminController::class, 'userRoleChange'])->name('admin#ajaxuserrolechange');
        });

        // admin -> category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        // admin -> products_list
        Route::prefix('products')->group(function () {
            Route::get('productslist', [ProductController::class, 'productslist'])->name('products#productslist');
            Route::get('create_page', [ProductController::class, 'createpage'])->name('products#createProductsPage');
            Route::post('create_product', [ProductController::class, 'createproducts'])->name('products#createProduct');
            Route::get('delete/{id}', [ProductController::class, 'productDelete'])->name('products#delete');
            Route::get('detail,{id}', [ProductController::class, 'productDetail'])->name('product#detail');
            Route::get('editProduct,{id}', [ProductController::class, 'editProduct'])->name('products#editProduct');
            Route::post('updateProduct', [ProductController::class, 'updateProduct'])->name('product#update');
        });

        // admin -> order_list
        Route::prefix('order')->group(function () {
            Route::get('order_list', [OrderController::class, 'orderList'])->name('order#orderlist');
            Route::get('search_by_status', [OrderController::class, 'searchByStatus'])->name('order#searchbystatus');
            Route::get('ajax_statuschange', [OrderController::class, 'ajaxStatusChange'])->name('order#ajaxstatuschange');
            Route::get('order_detail,{orderCode}', [OrderController::class, 'orderDetail'])->name('order#orderdetail');
        });

        // admin -> contact and inbox
        Route::prefix('admin/contact')->group(function () {
            Route::get('inbox', [ContactController::class, 'contactInbox'])->name('admin#contactinbox');
            Route::get('readmore/{id}', [ContactController::class, 'readmore'])->name('admin#readmore');
            Route::get('ajaxChangeStatus', [ContactController::class, 'ajaxChangeStatus'])->name('admin#ajaxChangeStatus');
            Route::get('ajaxshownoti', [ContactController::class, 'ajaxshownoti'])->name('admin#ajaxshownoti');
        });

    });


    // User
    Route::middleware(['user_auth'])->group(function () {

        // user home
        Route::prefix('user')->group(function () {
            Route::get('home', [UserController::class, 'userhome'])->name('user#home');
            Route::get('filter_category/{id}', [UserController::class, 'filterCategory'])->name('user#filtercategory');
            Route::get('product_details/{id}', [UserController::class, 'productDetails'])->name('user#productdetails');
            Route::get('mycart', [UserController::class, 'myCart'])->name('user#mycart');
            Route::get('history', [UserController::class, 'history'])->name('user#history');
        });

        // change password
        Route::prefix('password')->group(function () {
            Route::get('change_password', [UserController::class, 'changepwpage'])->name('user#changepwpage');
            Route::post('change_password', [UserController::class, 'changePassword'])->name('user#changePassword');
        });

        // account
        Route::prefix('account')->group(function () {
            Route::get('view_account', [UserController::class, 'viewAccount'])->name('user#viewaccount');
            Route::get('edit_account/{id}', [UserController::class, 'editAccount'])->name('user#editaccount');
            Route::post('update_account/{id}', [UserController::class, 'updateAccount'])->name('user#updateaccount');
        });

        // ajax
        Route::prefix('ajax')->group(function () {
            Route::get('pizza_list', [AjaxController::class, 'pizzaList'])->name('ajax#pizzalist');
            Route::get('add_to_cart', [AjaxController::class, 'addToCart'])->name('ajax#addtocart');
            Route::get('checkout', [AjaxController::class, 'checkout'])->name('ajax#checkout');
            Route::get('clear_cart', [AjaxController::class, 'clearCart'])->name('ajax#clearcart');
            Route::get('delete_item', [AjaxController::class, 'deleteItem'])->name('ajax#deleteitem');
            Route::get('view_count', [AjaxController::class, 'viewCount'])->name('ajax#viewcount');
        });

        // user contact
        Route::prefix('user/contact')->group(function () {
            Route::get('contact_admin', [ContactController::class, 'contactAdmin'])->name('user#contactadmin');
            Route::post('send_message', [ContactController::class, 'sendMessage'])->name('user#sendmessage');
        });

    });


    // Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
    //     Route::get('home', function () {
    //         return view('user.home');
    //     })->name('user#home');
    // });

});




