
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;


Route::group(['prefix'  =>  'admin'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');





    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'products' =>App\Http\Controllers\Admin\ProductController::class,
            'categories' =>App\Http\Controllers\Admin\CategoryController::class,
            'orders' =>App\Http\Controllers\Admin\OrderController::class,
            'services' =>App\Http\Controllers\Admin\ServiceController::class,
             ]);


             Route::prefix('products')->name('products.')->group(function(){
                Route::post('set_order', [\App\Http\Controllers\Admin\ProductController::class, 'set_order'])->name('order');
                Route::get('delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete');

                Route::post('add-extra-variation-fields',[\App\Http\Controllers\Admin\ProductController::class, 'add_extra_variation_fields'])->name('add-extra-variation-fields');

                Route::post('get-variation-fields',[\App\Http\Controllers\Admin\ProductController::class, 'get_variation_fields'])->name('get-variation-fields');

                Route::post('get-size-fields',[\App\Http\Controllers\Admin\ProductController::class, 'get_size_fields'])->name('get-size-fields');

                Route::post('/delete-variation', [\App\Http\Controllers\Admin\ProductController::class, 'delete_variation'])->name('delete-variation');

                Route::post('/delete-gallery-image', [\App\Http\Controllers\Admin\ProductController::class, 'delete_gallery_image'])->name('delete-gallery-image');

                Route::post('generate-product-slug',[\App\Http\Controllers\Admin\ProductController::class, 'generate_product_slug'])->name('generate-product-slug');

            });

            Route::get('/orders/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('view.order');
            Route::get('/editorder/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('editorder');

            Route::post('orders/change-order-status', [\App\Http\Controllers\Admin\OrderController::class, 'change_order_status'])->name('orders.change-order-status');


            Route::get('{id}/view/service', [\App\Http\Controllers\Admin\ServiceController::class, 'view'])->name('view.service');
            Route::get('{id}/edit/service', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('editservice');
    });
});
