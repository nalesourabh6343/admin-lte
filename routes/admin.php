<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CalculateController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\CompressController;
use App\Http\Controllers\admin\ConsultancyController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\admin\TestimonilController;
use App\Http\Controllers\admin\TrainingController;
use App\Http\Controllers\admin\WorkshopController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('/admin');

    Route::get('/admin', [AdminController::class, 'dashboard']);

    // ========****========**** TRAINING ROUTE ****========****=========
    Route::get('/admin/training/index', [TrainingController::class, 'Index']);
    Route::get('/admin/training/create', [TrainingController::class, 'Create']);
    Route::post('/admin/training/create', [TrainingController::class, 'Store']);
    Route::get("/admin/training/edit/{id}", [TrainingController::class, 'Edit']);
    Route::post('/admin/training/update', [TrainingController::class, 'Update']);
    Route::get('/admin/training/status/{status}/{training_id}', [TrainingController::class, 'UpdateStatus']);

    // ========****========**** CONSULTANCY ROUTE ****========****=========
    Route::get('/admin/consultancy/index', [ConsultancyController::class, 'Index']);
    Route::get('/admin/consultancy/create', [ConsultancyController::class, 'Create']);
    Route::post('/admin/consultancy/create', [ConsultancyController::class, 'Store']);
    Route::get("/admin/consultancy/edit/{id}", [ConsultancyController::class, 'Edit']);
    Route::post('/admin/consultancy/update', [ConsultancyController::class, 'Update']);
    Route::get('/admin/consultancy/status/{status}/{consultancy_id}', [ConsultancyController::class, 'UpdateStatus']);

    // ========****========**** WORKSHOP ROUTE ****========****=========
    Route::get('/admin/workshop/index', [WorkshopController::class, 'Index']);
    Route::get('/admin/workshop/create', [WorkshopController::class, 'Create']);
    Route::post('/admin/workshop/create', [WorkshopController::class, 'Store']);
    Route::get("/admin/workshop/edit/{id}", [WorkshopController::class, 'Edit']);
    Route::post('/admin/workshop/update', [WorkshopController::class, 'Update']);
    Route::get('/admin/workshop/status/{status}/{workshop_id}', [WorkshopController::class, 'UpdateStatus']);

    // ========****========**** CLIENT ROUTE ****========****=========
    Route::get('/admin/client/index', [ClientController::class, 'Index']);
    Route::get('/admin/client/create', [ClientController::class, 'Create']);
    Route::post('/admin/client/create', [ClientController::class, 'Store']);
    Route::get("/admin/client/edit/{id}", [ClientController::class, 'Edit']);
    Route::post('/admin/client/update', [ClientController::class, 'Update']);
    Route::get('/admin/client/status/{status}/{client_id}', [ClientController::class, 'UpdateStatus']);

    // ========****========**** TESTIMONIL ROUTE ****========****=========
    Route::get('/admin/testimonil/index', [TestimonilController::class, 'Index']);
    Route::get('/admin/testimonil/create', [TestimonilController::class, 'Create']);
    Route::post('/admin/testimonil/create', [TestimonilController::class, 'Store']);
    Route::get("/admin/testimonil/view/{id}", [TestimonilController::class, 'View']);
    Route::get("/admin/testimonil/edit/{id}", [TestimonilController::class, 'Edit']);
    Route::post('/admin/testimonil/update', [TestimonilController::class, 'Update']);
    Route::get('/admin/testimonil/status/{status}/{testimonil_id}', [TestimonilController::class, 'UpdateStatus']);

    // ========****========**** BLOG ROUTE ****========****=========
    Route::get('/admin/blog/index', [BlogController::class, 'Index']);
    Route::get('/admin/blog/create', [BlogController::class, 'Create']);
    Route::post('/admin/blog/create', [BlogController::class, 'Store']);
    Route::get("/admin/blog/edit/{id}", [BlogController::class, 'Edit']);
    Route::get("/admin/blog/view/{id}", [BlogController::class, 'View']);
    Route::post('/admin/blog/update', [BlogController::class, 'Update']);
    Route::get('/admin/blog/status/{status}/{blog_id}', [BlogController::class, 'UpdateStatus']);

    // ========****========**** INQUIRY ROUTE ****========****=========
    Route::get('/admin/inquiry/index', [InquiryController::class, 'Index']);
    Route::get('/admin/inquiry/delete/{inquiry_id}', [InquiryController::class, 'Delete']);
    // ================================ Profile ROUTES ============================
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::post('/admin/profile/updated', [AdminController::class, 'updated']);

    // ========****========**** COMPRESS ROUTE ****========****=========
    Route::get('/admin/compress/index', [CompressController::class, 'Index']);
    Route::get('/admin/compress/create', [CompressController::class, 'Create']);
    Route::post('/admin/compress/create', [CompressController::class, 'Store']);
    Route::get("/admin/compress/edit/{id}", [CompressController::class, 'Edit']);
    Route::get("/admin/compress/view/{id}", [CompressController::class, 'View']);
    Route::post('/admin/compress/update', [CompressController::class, 'Update']);
    Route::get('/admin/compress/status/{status}/{compress_id}', [CompressController::class, 'UpdateStatus']);

        // ========****========**** TRAINING ROUTE ****========****=========
        Route::get('/admin/calculate/index', [CalculateController ::class, 'Index']);
});

// create the model table and migration table
// php artisan make:model tbl_workshop -m
// create the Controller
// php artisan make:controller front/FrontController -r