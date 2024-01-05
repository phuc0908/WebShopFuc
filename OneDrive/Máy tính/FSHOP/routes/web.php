<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartegoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ImageColorController;
use App\Http\Controllers\Admin\HomeController;
// 
use App\Http\Controllers\Client\ProductController as ProductClient;
// 
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\UserController as UserClient;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController as HomeClient;
use App\Http\Controllers\Client\PayController;
use App\Http\Controllers\Client\OrderController as OrderClient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('client.check')->prefix("")->group(function () {

    Route::get('', [HomeClient::class, "create"])
        ->name("client.index");
    Route::get('index', [HomeClient::class, "create"]);
    // SEARCH
    Route::post('index', [HomeClient::class, "searchProduct"])->name('client.search');

    Route::get('danh-muc/{slug?}', [HomeClient::class, "show"])->name('client.getCartegory');

    Route::get('all-product', [HomeClient::class, "getAllProduct"])->name('client.allproduct');
    // CLIENT
    // Cart
    Route::prefix("cart")->group(function () {
        // cart view
        Route::get('', [CartController::class, "create"])->name("client.cart");
        // Delete Product in cart
        Route::get('delete/{product_id}/{color_id}{size_id}', [CartController::class, "destroy"])->name("client.cart.destroy");
    });
    // payment
    Route::get('purched', [PayController::class, "create"])->name("client.pay");

    Route::post('purched', [PayController::class, "pay"])->name("client.payOrder");
    // Product
    Route::prefix("product")->group(function () {

        Route::get('{id?}', [ProductClient::class, 'create'])->name("client.product");
        Route::post('{id?}', [CartController::class, 'store'])->name("client.product.addCart");
    });


    // AUTHENTICATION CLIENT 
    // SIGN in
    Route::get('signin', [AuthController::class, 'signin'])
        ->name('client.auth.signin');
    Route::post('signin', [AuthController::class, 'create']);
    // SIGN up
    Route::get('signup', [AuthController::class, 'signup'])
        ->name('client.auth.signup');
    Route::post('signup', [AuthController::class, 'store']);


    // Infor_User
    Route::get('infor', [AuthController::class, 'didSignIn'])
        ->name('client.auth.infor');
    Route::get('my-order', [OrderClient::class, 'create'])
        ->name('client.myOrder');

    Route::post('infor', [AuthController::class, 'logout'])
        ->name("client.auth.logout");
    // Edit
    Route::get('edit-infor/{id}', [UserClient::class, 'edit'])
        ->name('client.edit.infor');
    Route::post('edit-infor/{id}', [UserClient::class, 'update'])->name('client.update.infor');



    // Ajax.post.districs
    Route::get('showDistricts/{id}', [UserController::class, 'showDistricts'])
        ->name('client.showDistricts');
    // Ajax.post.wards
    Route::get('showWards/{id}', [UserController::class, 'showWards'])
        ->name('client.showWards');
});


// ADMIN
Route::prefix("admin")->group(function () {
    // Signin into manage 
    Route::get('', [AdminController::class, 'create'])
        ->name('admin.login');;


    Route::post('', [AdminController::class, 'index']);


    //MANAGE User
    Route::middleware('admin.check')
        ->prefix("home")
        ->group(function () {
            // Add
            Route::get('', [HomeController::class, 'index'])
                ->name('admin.home');
        });
    Route::middleware('admin.check')
        ->prefix("user")
        ->group(function () {
            // Add
            Route::get('add', [UserController::class, 'create'])
                ->name('admin.user.add');
            // Add.post
            Route::post('add', [UserController::class, 'store']);
            // Ajax.post.districts
            Route::get('showDistricts/{id}', [UserController::class, 'showDistricts'])
                ->name('admin.user.showDistricts');
            // Ajax.post.wards
            Route::get('showWards/{id}', [UserController::class, 'showWards'])
                ->name('admin.user.showWards');
            // Show
            Route::get('list', [UserController::class, 'showAll'])
                ->name('admin.user.list');
            // Update
            Route::get('edit/{id}', [UserController::class, 'edit'])
                ->name('admin.user.edit');
            // post
            Route::post('edit/{id}', [UserController::class, 'update']);
            // Delete
            Route::get('destroy/{id}', [UserController::class, 'destroy'])
                ->name('admin.user.destroy');
        });
    // MANAGE Product
    // 
    Route::middleware('admin.check')
        ->prefix("product")
        ->group(function () {
            // Add
            Route::get('add', [ProductController::class, 'create'])
                ->name('admin.product.add');
            // Add.post
            Route::post('add', [ProductController::class, 'store']);
            // Show
            Route::get('list', [ProductController::class, 'showAll'])
                ->name('admin.product.list');
            // Update
            Route::get('edit/{id}', [ProductController::class, 'edit'])
                ->name('admin.product.edit');
            // edit.post
            Route::post('edit/{id}', [ProductController::class, 'update']);
            // Delete
            Route::get('destroy/{id}', [ProductController::class, 'destroy'])
                ->name('admin.product.destroy');
            // Size_of_product 
            Route::prefix("size")
                ->group(function () {
                    // Add
                    Route::get('add/{product_id}', [ProductSizeController::class, 'create'])
                        ->name('admin.product.size.add');
                    // Add.post
                    Route::post('add/{product_id}', [ProductSizeController::class, 'store']);
                    // Show
                    Route::get('list/{product_id}', [ProductSizeController::class, 'show'])
                        ->name('admin.product.size.list');
                    // Delete
                    Route::get('destroy/{product_id}/{size_id}', [ProductSizeController::class, 'destroy'])
                        ->name('admin.product.size.destroy');
                });
            // Color_of_product 
            Route::prefix("color")
                ->group(function () {
                    // Add
                    Route::get('add/{product_id}', [ProductColorController::class, 'create'])
                        ->name('admin.product.color.add');
                    // Add.post
                    Route::post('add/{product_id}', [ProductColorController::class, 'store']);
                    // Show
                    Route::get('list/{product_id}', [ProductColorController::class, 'show'])
                        ->name('admin.product.color.list');
                    // Delete
                    Route::get('destroy/{product_id}/{color_id}', [ProductColorController::class, 'destroy'])
                        ->name('admin.product.color.destroy');
                });
        });
    // MANAGE Image
    // 
    Route::middleware('admin.check')
        ->prefix("image")
        ->group(function () {
            // Add
            Route::get('add/{product_id}', [ImageController::class, 'create'])
                ->name('admin.image.add');
            // Add.post
            Route::post('add/{product_id}', [ImageController::class, 'store']);
            // Show
            Route::get('list/{product_id}', [ImageController::class, 'show'])
                ->name('admin.image.list');
            // Update
            Route::get('edit/{product_id}/{id}', [ImageController::class, 'edit'])
                ->name('admin.image.edit');

            // Delete
            Route::get('destroy/{product_id}/{id}', [ImageController::class, 'destroy'])
                ->name('admin.image.destroy');
            // DeleteAll
            Route::get('destroy-all/{product_id?}', [ImageController::class, 'destroyAll'])
                ->name('admin.image.destroyAll');

            // Color_of_image
            Route::prefix("color")
                ->group(function () {
                    // Add
                    Route::get('add/{image_id}/{product_id}', [ImageColorController::class, 'create'])
                        ->name('admin.image.color.add');
                    // Add.post
                    Route::post('add/{image_id}/{product_id}', [ImageColorController::class, 'store']);
                    // Show
                    Route::get('list/{image_id}/{product_id}', [ImageColorController::class, 'show'])
                        ->name('admin.image.color.list');
                    // Delete
                    Route::get('destroy/{image_id}/{color_id}/{product_id}', [ImageColorController::class, 'destroy'])
                        ->name('admin.image.color.destroy');
                });
        });
    // MANAGE Cartegory
    Route::middleware('admin.check')
        ->prefix("cartegory")
        ->group(function () {
            // Add
            Route::get('add', [CartegoryController::class, 'create'])
                ->name('admin.cartegory.add');
            // Add.post
            Route::post('add', [CartegoryController::class, 'store']);
            // Show
            Route::get('list', [CartegoryController::class, 'showAll'])
                ->name('admin.cartegory.list');
            // Show a cartegory
            Route::get('detail/{id}', [CartegoryController::class, 'showProductofOne'])
                ->name('admin.cartegory.detail');
            // Update
            Route::get('edit/{id}', [CartegoryController::class, 'edit'])
                ->name('admin.cartegory.edit');
            // Update.post
            Route::post('edit/{id}', [CartegoryController::class, 'update']);
            // Delete
            Route::get('destroy/{id}', [CartegoryController::class, 'destroy'])
                ->name('admin.cartegory.destroy');
        });
    // MANAGE Order
    Route::middleware('admin.check')
        ->prefix("order")
        ->group(function () {
            // Add
            Route::get('add', [OrderController::class, 'create'])
                ->name('admin.order.add');
            // Add.post
            Route::post('add', [OrderController::class, 'store']);
            // Show
            Route::get('list', [OrderController::class, 'showAll'])
                ->name('admin.order.list');
            // Update
            Route::get('edit/{id}', [OrderController::class, 'edit'])
                ->name('admin.order.edit');
            // Delete
            Route::get('destroy/{id}', [OrderController::class, 'destroy'])
                ->name('admin.order.destroy');
            // State
            Route::get('state/{id}/{state}', [OrderController::class, 'updateState'])
                ->name('admin.order.state');
            // DETAIL
            Route::prefix("detail")
                ->group(function () {
                    Route::get('{idorder}', [OrderController::class, 'showDetaiOrder'])
                        ->name('admin.order.detail');

                    Route::get('detail/{idorder?}/detroy/{id}', [OrderController::class, 'detroyDetail'])
                        ->name('admin.order.detail.destroy');
                });
        });
    // MANAGE Sizes
    Route::middleware('admin.check')
        ->prefix("size")
        ->group(function () {
            // Add
            Route::get('add', [SizeController::class, 'create'])
                ->name('admin.size.add');
            // Add.post
            Route::post('add', [SizeController::class, 'store']);
            // Show
            Route::get('list', [SizeController::class, 'showAll'])
                ->name('admin.size.list');
            // Update
            Route::get('edit/{id}', [SizeController::class, 'edit'])
                ->name('admin.size.edit');
            //  Edit.post
            Route::post('edit/{id}', [SizeController::class, 'update']);
            // Delete
            Route::get('destroy/{id}', [SizeController::class, 'destroy'])
                ->name('admin.size.destroy');
        });
    // MANAGE Color
    Route::middleware('admin.check')
        ->prefix("color")
        ->group(function () {
            // Add
            Route::get('add', [ColorController::class, 'create'])
                ->name('admin.color.add');
            // Add.post
            Route::post('add', [ColorController::class, 'store']);
            // Show
            Route::get('list', [ColorController::class, 'showAll'])
                ->name('admin.color.list');
            // Update
            Route::get('edit/{id}', [ColorController::class, 'edit'])
                ->name('admin.color.edit');
            //  Edit.post
            Route::post('edit/{id}', [ColorController::class, 'update']);
            // Delete
            Route::get('destroy/{id}', [ColorController::class, 'destroy'])
                ->name('admin.color.destroy');
        });
});
