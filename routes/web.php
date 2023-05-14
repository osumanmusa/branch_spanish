<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminFlashcardsController;
use App\Http\Controllers\Admin\AdminCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/flashcards', function () {
    return Inertia::render('flashcard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/pronounciations', function () {
    return Inertia::render('pronounciation', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/quizme', function () {
    return Inertia::render('quiz', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/contesta', function () {
    return Inertia::render('contesta', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/test1', function () {
    return Inertia::render('test', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/test2', function () {
    return Inertia::render('test2', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});Route::get('/admin/dashboard', function () {
    return Inertia::render('admin/dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/flashcardcontent', function () {
    return Inertia::render('flashcardcontent', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});
Route::get('/procontent', function () {
    return Inertia::render('procontent', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get("/admin/login", [AdminLoginController::class, "index"])->name('adminlogin');
Route::post("/adminlogged", [AdminLoginController::class, "store"])->name('admin.login');
Route::get('/admin/register', function () {
    return Inertia::render('Admin/Auth/register');
});
Route::post("/admin/reg", [AdminRegisterController::class, "store"])->name('admin.reg');


Route::group(['middleware' => 'auth'], function() {

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::inertia('/adminhome', 'Admin/dashboard')->name('admin.home');
        Route::get("/admin/flashcards", [AdminFlashcardsController::class, "index"])->name('adminflashcards');
        Route::get("/admin_create_flashcard", [AdminFlashcardsController::class, "create"])->name('admin_create_flashcards');
        Route::post("/admin/store_flashcard", [AdminFlashcardsController::class, "store"])->name('admin.flashcard.store');


        Route::post("/admin/store_category", [AdminCategoryController::class, "store"])->name('admin.category.store');
    });


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::inertia('/userhome', 'UserDashboard',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        ])->name('user.home');
    });


/*------------------------------------------
--------------------------------------------
All Parent Routes List
--------------------------------------------
--------------------------------------------*/
    Route::group(['middleware' => 'checkRole:parent'], function() {
        Route::inertia('/parenthome', 'GuestDashboard')->name('parent.home');
    });
});

require __DIR__.'/auth.php';
