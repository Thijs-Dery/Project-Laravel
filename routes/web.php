<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactFormController;


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

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::resource('news', NewsController::class);

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::resource('faq', FAQController::class);
Route::resource('faq-categories', FAQCategoryController::class);
Route::resource('news', NewsController::class);
Route::resource('contact-forms', ContactFormController::class)->only(['create', 'store']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('news', NewsController::class)->except(['index', 'show']);
});

Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('news', NewsController::class);

Route::resource('faq_categories', FaqCategoryController::class);
Route::resource('faqs', FaqController::class);

Route::get('/contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contact-forms', [ContactFormController::class, 'index'])->name('contact.index');
});



Route::get('/contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/contact-forms', [ContactFormController::class, 'index'])->name('contact.index');
});
