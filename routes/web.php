<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamResultsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController ;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CertificateIdController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\TrainerController as AdminTrainerController;
use App\Http\Controllers\Admin\ExamController as AdminExamController; 
use App\Http\Controllers\Admin\ExamQuestionController; 
use App\Http\Controllers\Admin\StudentController; 
use App\Http\Controllers\Admin\ScoreResultController as AdminScoreResultController; 
use App\Http\Controllers\Admin\CertificateIdController as AdminCertificateIdController; 
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;



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
Route::get('sendMail',[HomeController::class,'sendExamMail']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/',[HomeController::class,'index'])->name('home');
        Route::get('/about',[HomeController::class,'about'])->name('about');
        Route::get('/contact',[HomeController::class,'contact'])->name('contact');
        Route::get('/category/{slug}',[CategoryController::class,'show'])->name('main.category.show');
        Route::get('/course/{slug}',[CourseController::class,'show'])->name('main.course.show');

        // Trainsers Routes
        Route::get('/trainers/{slug}',[TrainerController::class,'show'])->name('main.trainer.show');
        Route::get('/trainers',[TrainerController::class,'index'])->name('main.trainer.index');

        // news routes
        Route::get('/news/{slug}',[NewsController::class,'show'])->name('main.news.show');
        Route::get('/news',[NewsController::class,'index'])->name('main.news.index');


        // exam Route
        Route::get('/exam',[ExamController::class,'index'])->name('main.exam.index');
        Route::get('/exam/{exam}',[ExamController::class,'show'])->name('main.exam.show');

        // Certification Route
        Route::get('/cert',[CertificateIdController::class,'index'])->name('main.cert.index');
        Route::get('/cert/search',[CertificateIdController::class,'search'])->name('main.cert.search');
        Route::get('/cert/{id}',[CertificateIdController::class,'download'])->name('main.cert.download');
       
        require __DIR__.'/auth.php';
    });

    Route::post('examResult',[ExamResultsController::class,'store'])->name('store.exam.result');
    Route::get('/test-mail',[SubscriptionController::class,'testMail']);
    Route::get('/scoremail',[SubscriptionController::class,'scoremail']);
    Route::get('/sitemap',[HomeController::class,'sitemap']);


     





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/admin-auth.php';

/*  ------- Admin Route ---------   */
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class,'showLoginForm'])->name('admin.showLoginForm');
    Route::post('/login',[AdminController::class,'login'])->name('admin.login');
    Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');
   

    Route::group(['middleware' => 'admin'],function (){
        Route::get('/',[AdminController::class,'index'])->name('admin.dashboard');
        Route::resource('/category',AdminCategoryController::class,['as' => 'admin']);
        Route::resource('/course',AdminCourseController::class,['as' => 'admin']);
        Route::resource('/trainer',AdminTrainerController::class,['as' => 'admin']);
        Route::resource('/exam',AdminExamController::class,['as' => 'admin']);
        Route::resource('/question',ExamQuestionController::class,['as' => 'admin']);
        Route::resource('/scoreResult',AdminScoreResultController::class,['as' => 'admin']);
        Route::get('/country/create',[CountryController::class,'create'])->name('admin.country.create');
        Route::post('/country',[CountryController::class,'store'])->name('admin.country.store');
        Route::resource('/certificateId',AdminCertificateIdController::class,['as' => 'admin']);
        Route::resource('/slider',AdminSliderController::class,['as' => 'admin']);
        Route::resource('/user',StudentController::class,['as' => 'admin']);
        Route::resource('/news',AdminNewsController::class,['as' => 'admin']);
        
        
    });
   
});
    

/* ---------- END ---------------   */
