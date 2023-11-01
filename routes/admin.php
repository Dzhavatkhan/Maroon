    <?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

    Route::middleware('auth:admin')->group(function() {
        Route::get('/panel', [AdminController::class, 'index'])->name('admin');
        Route::get('/panel/users', [AdminController::class, 'getUsers'])->name('getUsers');
        Route::get('/panel/admins', [AdminController::class, 'getAdmins'])->name('getAdmins');
        Route::get('/panel/products', [AdminController::class, 'getProducts'])->name('getProducts');
        Route::post('/panel/add_products', [AdminController::class, 'addProduct'])->name('addProduct');
        Route::get('logout', [AdminController::class, 'admin_logout'])->name('admin-logout');

        Route::put('edit_to_product', [AdminController::class, 'update'])->name('editProduct');

        Route::get('delete_product', [AdminController::class, 'destroy'])->name('delete_product');
        Route::get('delete_admin_id', [AdminController::class, 'delete_admin'])->name('delete_admin');
        Route::get('delete_user_id', [AdminController::class, 'delete_user'])->name('delete_user');
    });

