<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faqs', FaqController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});

Route::resource('news', NewsController::class);

Route::resource('contact-forms', ContactFormController::class)->only(['create', 'store']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('news', NewsController::class)->except(['index', 'show']);
    Route::get('/admin/contact-forms', [ContactFormController::class, 'index'])->name('contact.index');
});

Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('faq-categories', FaqCategoryController::class);
Route::resource('faqs', FaqController::class);
Route::get('faq/create', [FaqController::class, 'create'])->name('faqs.create');
Route::post('faq', [FaqController::class, 'store'])->name('faqs.store');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
