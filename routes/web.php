<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SuperAdmin\Auth\SuperAdminRegisterController;
use App\Http\Controllers\SuperAdmin\Auth\SuperAdminLoginController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\SuperAdminFlashcardsController;
use App\Http\Controllers\SuperAdmin\SuperAdminCategoryController;
use App\Http\Controllers\SuperAdmin\SuperAdminPronounciationController;
use App\Http\Controllers\SuperAdmin\SuperAdminQuizController;
use App\Http\Controllers\SuperAdmin\SuperAdminUsersController;
use App\Http\Controllers\SuperAdmin\SuperAdminStudentController;
use App\Http\Controllers\SuperAdmin\AdminsController;

use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFlashcardsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPronounciationController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\ParentController;
use App\Http\Middleware\Authenticate;


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
Route::get("/quizme", [RoutesController::class, "quizme"])->name('quizme')->middleware(Authenticate::class);

Route::get("/showflashcard/{id}", [RoutesController::class, "card"])->name('card.show')->middleware(Authenticate::class);

Route::get("/shuffleflashcard/{id}", [RoutesController::class, "cardshuffler"])->name('card.shuffle')->middleware(Authenticate::class);
Route::get("/showpronounciation/{id}", [RoutesController::class, "voice"])->name('voice.show')->middleware(Authenticate::class);

Route::get("/showquiz/{id}", [RoutesController::class, "showquiz"])->name('quiz.show')->middleware(Authenticate::class);

Route::get("/register_user", [RoutesController::class, "userreg"])->name('user_register');
Route::post("/user_register", [RoutesController::class, "reguser"])->name('user.reg');

Route::get("/", [RoutesController::class, "index"])->name('welcome');
Route::get("/flashcards", [RoutesController::class, "flashcard"])->name('flashcards');
Route::get("/pronounciations", [RoutesController::class, "pronounciation"])->name('pronounciations');

Route::post("/user_passrestore", [RoutesController::class, "resetpass"])->name('user.passrestore');

Route::get("/admin/login", [AdminLoginController::class, "index"])->name('adminlogin');
Route::post("/adminlogged", [AdminLoginController::class, "store"])->name('admin.login');

Route::get("/superadmin/login", [SuperAdminLoginController::class, "index"])->name('superadminlogin');
Route::post("/superadminlogged", [SuperAdminLoginController::class, "store"])->name('superadmin.login');
Route::get('/superadmin/register', function () {
    return Inertia::render('SuperAdmin/Auth/register');
});
Route::post("/superadmin/reg", [SuperAdminRegisterController::class, "store"])->name('superadmin.reg');


Route::group(['middleware' => 'auth'], function() {

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

/*------------------------------------------
--------------------------------------------
All SuperAdmin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => 'checkRole:superadmin'], function() {
    Route::get("/superadminhome", [SuperAdminController::class, "dashboard"])->name('superadmin.home');
    Route::get("/superadmin/flashcards", [SuperAdminFlashcardsController::class, "index"])->name('superadminflashcards');
    Route::get("/superadmin_create_flashcard", [SuperAdminFlashcardsController::class, "create"])->name('superadmin_create_flashcards');
    Route::post("/superadmin/store_flashcard", [SuperAdminFlashcardsController::class, "store"])->name('superadmin.flashcard.store');
    Route::get("/superadmin_edit_flashcard/{id}", [SuperAdminFlashcardsController::class, "edit"])->name('superadmin.editflashcards');
    Route::get("/superadmin_delete_flashcard/{id}", [SuperAdminFlashcardsController::class, "destroy"])->name('superadmin.deleteflashcards');

    Route::post("/superadmin/store_category", [SuperAdminCategoryController::class, "store"])->name('superadmin.category.store');
    Route::get("/superadmin/category", [SuperAdminCategoryController::class, "index"])->name('superadmin.category.index');
    Route::get("/superadmin/delete_category/{id}", [SuperAdminCategoryController::class, "destroy"])->name('superadmin.category.destroy');

    Route::get("/superadmin/submissions", [SuperAdminPronounciationController::class, "main"])->name('superadmin.show.submissions');
    Route::get("/superadmin/pronounciation", [SuperAdminPronounciationController::class, "index"])->name('superadmin.pronounciation');
    Route::get("/superadmin/verifypronounciation", [SuperAdminPronounciationController::class, "verify"])->name('superadmin.verifypronounciation');
    Route::get("/superadmin/create_pronounciation", [SuperAdminPronounciationController::class, "create"])->name('superadmin_create_pronounciation');;
    Route::post("/superadmin/store_pronounciation", [SuperAdminPronounciationController::class, "store"])->name('superadmin.pronounciation.store');
    Route::get("/superadmin_delete_pronounciation/{id}", [SuperAdminPronounciationController::class, "destroy"])->name('superadmin.deletepronounciation');
    Route::get("/superadmin_show_pronounciation/{id}", [SuperAdminPronounciationController::class, "showpronounciation"])->name('superadmin.showpronounciation');

    Route::get("/superadmin/quiz", [SuperAdminQuizController::class, "index"])->name('superadmin.quiz');
    Route::get("/superadmin/create_quiz", [SuperAdminQuizController::class, "create"])->name('superadmin_create_quiz');
    Route::get("/superadmin_show_quiz/{id}", [SuperAdminQuizController::class, "show"])->name('superadmin.viewquiz');
    Route::post("/superadmin/store_quiz", [SuperAdminQuizController::class, "store"])->name('superadmin.quiz.store');
    Route::get("/superadmin_delete_quiz/{id}", [SuperAdminQuizController::class, "destroy"])->name('superadmin.deletequiz');
    Route::get("/superadmin_delquiz/{id}", [SuperAdminQuizController::class, "delquiz"])->name('superadmin.delquiz');
    Route::get("/superadmin/editprofile", [SuperAdminController::class, "edit"])->name('superadmin.editprofile');
    Route::post("/superadmin/storeprofile", [SuperAdminController::class, "store"])->name('superadmin.profile.store');
    Route::post("/superadmin/storepass", [SuperAdminController::class, "storepass"])->name('superadmin.profile.storepass');
    
    Route::get("/superadmin/accounts", [SuperAdminUsersController::class, "index"])->name('superadmin.accounts');
    Route::get("/superadmin_accountes_enroll/{id}", [SuperAdminUsersController::class, "enroll"])->name('superadmin.acconts.enroll');
    Route::get("/superadmin_accounts_deactivate/{id}", [SuperAdminUsersController::class, "deactivate"])->name('superadmin.accounts.de-activate');
    
    Route::get("/superadmin/students", [SuperAdminStudentController::class, "index"])->name('superadmin.students');
    Route::get("/superadmin_show_student/{id}", [SuperAdminStudentController::class, "show"])->name('superadmin.viewstudent');
    Route::get("/superadmin_student_detail/{id}", [SuperAdminStudentController::class, "view"])->name('superadmin.studentdetails');
    Route::get("/superadmin_student_detail/{id}/{btntype}/{user_id}/{att}", [SuperAdminStudentController::class, "details"])->name('superadmin.getstudentdetails');
    
    Route::get("/superadmin/admins", [AdminsController::class, "index"])->name('superadmin.admin');
    Route::get("/superadmin/addadmin", [AdminsController::class, "create"])->name('superadmin.addadmin');
    Route::post("/superadmin/storeadmin", [AdminsController::class, "store"])->name('superadmin.admin.store');
    Route::get("/superadmin/deleteadmin/{id}", [AdminsController::class, "destroy"])->name('superadmin.deleteadmin');





});


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
        Route::get("/admin/category", [AdminCategoryController::class, "index"])->name('admin.category.index');
        Route::get("/admin/delete_category/{id}", [AdminCategoryController::class, "destroy"])->name('admin.category.destroy');

        Route::get("/admin/pronounciation", [AdminPronounciationController::class, "index"])->name('admin.pronounciation');
        Route::get("/admin/submissions", [AdminPronounciationController::class, "main"])->name('admin.show.submissions');

        Route::get("/admin/verifypronounciation", [AdminPronounciationController::class, "verify"])->name('admin.verifypronounciation');
        Route::get("/admin/create_pronounciation", [AdminPronounciationController::class, "create"])->name('admin_create_pronounciation');;
        Route::post("/admin/store_pronounciation", [AdminPronounciationController::class, "store"])->name('admin.pronounciation.store');
        Route::get("/admin_delete_pronounciation/{id}", [AdminPronounciationController::class, "destroy"])->name('admin.deletepronounciation');
        Route::get("/admin_show_pronounciation/{id}", [AdminPronounciationController::class, "showpronounciation"])->name('admin.showpronounciation');

        Route::get("/admin/quiz", [AdminQuizController::class, "index"])->name('admin.quiz');
        Route::get("/admin/create_quiz", [AdminQuizController::class, "create"])->name('admin_create_quiz');
        Route::get("/admin_show_quiz/{id}", [AdminQuizController::class, "show"])->name('admin.viewquiz');
        Route::post("/admin/store_quiz", [AdminQuizController::class, "store"])->name('admin.quiz.store');
        Route::get("/admin_delete_quiz/{id}", [AdminQuizController::class, "destroy"])->name('admin.deletequiz');
        Route::get("/admin_delquiz/{id}", [AdminQuizController::class, "delquiz"])->name('admin.delquiz');
        Route::get("/admin/editprofile", [AdminController::class, "edit"])->name('admin.editprofile');
        Route::post("/admin/storeprofile", [AdminController::class, "store"])->name('admin.profile.store');
        Route::post("/admin/storepass", [AdminController::class, "storepass"])->name('admin.profile.storepass');
        
        Route::get("/admin/accounts", [AdminUsersController::class, "index"])->name('admin.accounts');
        Route::get("/admin_accountes_enroll/{id}", [AdminUsersController::class, "enroll"])->name('admin.acconts.enroll');
        Route::get("/admin_accounts_deactivate/{id}", [AdminUsersController::class, "deactivate"])->name('admin.accounts.de-activate');
        
        Route::get("/admin/students", [AdminStudentController::class, "index"])->name('admin.students');
        Route::get("/admin_show_student/{id}", [AdminStudentController::class, "show"])->name('admin.viewstudent');
        Route::get("/admin_student_detail/{id}", [AdminStudentController::class, "view"])->name('admin.studentdetails');
        Route::get("/admin_student_detail/{id}/{btntype}/{user_id}/{att}", [AdminStudentController::class, "details"])->name('admin.getstudentdetails');
        // Route::get("/quizme", [RoutesController::class, "quizme"])->name('quizme');
        // Route::get("/showflashcard/{id}", [RoutesController::class, "card"])->name('card.show');
        // Route::get("/showpronounciation/{id}", [RoutesController::class, "voice"])->name('voice.show');
        // Route::get("/showquiz/{id}", [RoutesController::class, "showquiz"])->name('quiz.show');

 
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
        
        // Route::get("/quizme", [RoutesController::class, "quizme"])->name('quizme');
        // Route::get("/showflashcard/{id}", [RoutesController::class, "card"])->name('card.show');
        // Route::get("/showpronounciation/{id}", [RoutesController::class, "voice"])->name('voice.show');
        Route::get("/verifypronounciation", [RoutesController::class, "verify"])->name('voice.verify');
        Route::post("/storevoice", [RoutesController::class, "storevoice"])->name('voice.store');
        // Route::get("/showquiz/{id}", [RoutesController::class, "showquiz"])->name('quiz.show');
        Route::post("/storequiz/{id}", [RoutesController::class, "storequiz"])->name('quiz.store');
        Route::get("/getscore", [RoutesController::class, "showscore"])->name('user.score');
        // Route::get("/userprofile", [RoutesController::class, "profile"])->name('user.profile');
        // Route::post("/user_store_profile", [RoutesController::class, "saveprofile"])->name('user.profile.store');
        // Route::get("/showquiz/{id}", [RoutesController::class, "showquiz"])->name('quiz.show');
        Route::get("/user_dashboad", [RoutesController::class, "userdash"])->name('user.dashboard');
        Route::get("/user_pronounciation", [RoutesController::class, "userpronounciation"])->name('user.pronounciation');
        Route::get("/user_quiz", [RoutesController::class, "userquiz"])->name('user.quiz');
        Route::get("/student/editprofile", [RoutesController::class, "profile"])->name('user.profile');
        Route::post("/student/storeprofile", [RoutesController::class, "storeprofile"])->name('user.profile.store');
        Route::post("/student/storepass", [RoutesController::class, "passstore"])->name('user.profile.storepass');
        Route::get("/user_viewquiz/{id}/{btntype}/{user_id}/{att}", [RoutesController::class, "viewquiz"])->name('user.viewquiz');

    });


/*------------------------------------------
--------------------------------------------
All Parent Routes List
--------------------------------------------
--------------------------------------------*/
    Route::group(['middleware' => 'checkRole:parent'], function() {
        Route::get("/parenthome", [ParentController::class, "dashboard"])->name('parent.home');
        Route::get("/parent_student", [ParentController::class, "quizlist"])->name('parent.student');
        Route::get("/parent_pronounciation", [ParentController::class, "pronounciation"])->name('parent.voice');
        Route::get("/parent_addstudent", [ParentController::class, "addstudent"])->name('parent.addstudent');
        Route::post("/parent_store_student", [ParentController::class, "storestudent"])->name('parent.storestudent');
        Route::get("/parent_student_quiz/{id}", [ParentController::class, "quiz"])->name('parent.studentquiz');
        Route::get("/parent_viewquiz/{id}/{btntype}/{user_id}/{att}", [ParentController::class, "showquiz"])->name('parent.viewquiz');
        Route::get("/parent_viewstudent/{id}", [ParentController::class, "showstudent"])->name('parent.viewstudent');
        Route::get("/parent/editprofile", [ParentController::class, "profile"])->name('parent.profile');
        Route::post("/parent/storeprofile", [ParentController::class, "storeprofile"])->name('parent.profile.store');
        Route::post("/parent/storepass", [ParentController::class, "storepass"])->name('parent.profile.storepass');

    });
});

require __DIR__.'/auth.php';
