<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SecretPageController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminController;

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
 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');
    
    Route::get('/questions/create', [AdminQuestionController::class, 'create'])->name('admin/create-question');
    Route::post('/questions', [AdminQuestionController::class, 'store'])->name('admin.questions.store');
    
    
    Route::get('/admin/exam-attempts', [AdminController::class, 'viewAttempts'])->name('admin.exam-attempts');
    Route::resource('exam-attempts', \App\Http\Controllers\AdminController::class)->only(['edit', 'update', 'destroy']);

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


Route::middleware(['auth'])->group(function () {
        
    Route::get('/exam-page/{subject}', [SecretPageController::class, 'showForm'])->name('exam.form');
    Route::post('/exam-page/{subject}', [SecretPageController::class, 'checkPassword'])->name('exam.check');
    Route::get('/subject/{subject}', [SecretPageController::class, 'showSubject'])->name('subject.view');
    Route::post('/subject/{subject}/submit', [SecretPageController::class, 'submitExam'])->name('exam.submit');

});

Route::get('/exam-result', function () {
    return view('exam.subject.exam-result', ['score' => session('score')]);
})->name('exam.result');
require __DIR__.'/auth.php';


//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
