<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SecretPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index']);

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
});

Route::get('/splash-login', function () {
    return view('splash-login');
})->name('splash-login');

Route::get('/splash-login-admin', function () {
    return view('splash-login-admin');
})->name('splash-login-admin');

Route::get('/splash-logout', function () {
    return view('splash-logout');
})->name('splash-logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/exam/courses', function () {
    return view('exam/courses');
})->name('exam/courses');


Route::middleware(['auth', 'check.password'])->group(function () {
        
    Route::get('/exam-page/{subject}', [SecretPageController::class, 'showForm'])->name('exam.form');
    Route::post('/exam-page/{subject}', [SecretPageController::class, 'checkPassword'])->name('exam.check');

    Route::get('/subject/{subject}', [SecretPageController::class, 'showSubject'])->name('subject.view');
    
    Route::get('/subject/elective2', [SecretPageController::class, 'elective2'])->name('subject/elective2');
    Route::get('/subject/elective4', [SecretPageController::class,'elective4'])->name('subject/elective4');
    Route::get('/subject/net101', [SecretPageController::class,'net101'])->name('subject/net101');
    Route::get('/subject/net102', [SecretPageController::class,'net102'])->name('subject/net102');
    Route::get('/subject/ipt101', [SecretPageController::class,'ipt101'])->name('subject/ipt101');
    Route::get('/subject/sia', [SecretPageController::class,'sia'])->name('subject/sia');
    Route::get('/subject/ias', [SecretPageController::class,'ias'])->name('subject/ias');
});
require __DIR__.'/auth.php';


//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
