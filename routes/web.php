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
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFlashcardsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPronounciationController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\ParentController;



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

Route::get("/", [RoutesController::class, "index"])->name('welcome');
Route::get("/flashcards", [RoutesController::class, "flashcard"])->name('flashcards');
Route::get("/pronounciations", [RoutesController::class, "pronounciation"])->name('pronounciations');
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
        Route::get("/adminhome", [AdminController::class, "dashboard"])->name('admin.home');
        Route::get("/admin/flashcards", [AdminFlashcardsController::class, "index"])->name('adminflashcards');
        Route::get("/admin_create_flashcard", [AdminFlashcardsController::class, "create"])->name('admin_create_flashcards');
        Route::post("/admin/store_flashcard", [AdminFlashcardsController::class, "store"])->name('admin.flashcard.store');
        Route::get("/admin_edit_flashcard/{id}", [AdminFlashcardsController::class, "edit"])->name('admin.editflashcards');
        Route::get("/admin_delete_flashcard/{id}", [AdminFlashcardsController::class, "destroy"])->name('admin.deleteflashcards');

        Route::post("/admin/store_category", [AdminCategoryController::class, "store"])->name('admin.category.store');

        Route::get("/admin/pronounciation", [AdminPronounciationController::class, "index"])->name('admin.pronounciation');
        Route::get("/admin/create_pronounciation", [AdminPronounciationController::class, "create"])->name('admin_create_pronounciation');;
        Route::post("/admin/store_pronounciation", [AdminPronounciationController::class, "store"])->name('admin.pronounciation.store');
        Route::get("/admin_delete_pronounciation/{id}", [AdminPronounciationController::class, "destroy"])->name('admin.deletepronounciation');

        Route::get("/admin/quiz", [AdminQuizController::class, "index"])->name('admin.quiz');
        Route::get("/admin/create_quiz", [AdminQuizController::class, "create"])->name('admin_create_quiz');
        Route::get("/admin_show_quiz/{id}", [AdminQuizController::class, "show"])->name('admin.viewquiz');
        Route::post("/admin/store_quiz", [AdminQuizController::class, "store"])->name('admin.quiz.store');
        Route::get("/admin_delete_quiz/{id}", [AdminQuizController::class, "destroy"])->name('admin.deletequiz');
        Route::get("/admin/editprofile", [AdminController::class, "edit"])->name('admin.editprofile');
        Route::post("/admin/storeprofile", [AdminController::class, "store"])->name('admin.profile.store');
        Route::post("/admin/storepass", [AdminController::class, "storepass"])->name('admin.profile.storepass');
        
        Route::get("/admin/accounts", [AdminUsersController::class, "index"])->name('admin.accounts');
        Route::get("/admin_accountes_enroll/{id}", [AdminUsersController::class, "enroll"])->name('admin.acconts.enroll');
        Route::get("/admin_accounts_deactivate/{id}", [AdminUsersController::class, "deactivate"])->name('admin.accounts.de-activate');
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
        
        Route::get("/quizme", [RoutesController::class, "quizme"])->name('quizme');
        Route::get("/showflashcard/{id}", [RoutesController::class, "card"])->name('card.show');
        Route::get("/showpronounciation/{id}", [RoutesController::class, "voice"])->name('voice.show');
        Route::post("/storevoice", [RoutesController::class, "storevoice"])->name('voice.store');
        Route::get("/showquiz/{id}", [RoutesController::class, "showquiz"])->name('quiz.show');
        Route::post("/storequiz/{id}", [RoutesController::class, "storequiz"])->name('quiz.store');

    });


/*------------------------------------------
--------------------------------------------
All Parent Routes List
--------------------------------------------
--------------------------------------------*/
    Route::group(['middleware' => 'checkRole:parent'], function() {
        Route::get("/parenthome", [ParentController::class, "dashboard"])->name('parent.home');
        Route::get("/parent_student_quiz", [ParentController::class, "quiz"])->name('parent.studentquiz');
        Route::get("/parent_viewquiz/{id}", [ParentController::class, "showquiz"])->name('parent.viewquiz');
        Route::get("/parent_viewstudent/{id}", [ParentController::class, "showstudent"])->name('parent.viewstudent');

    });
});

require __DIR__.'/auth.php';
