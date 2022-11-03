<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobcategoryController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\ApplicantcvController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\InvoiceController;


use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\ApplyController;



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



Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('aboutus',[FrontendController::class,'aboutus'])->name('frontend.aboutus');
Route::get('blog',[FrontendController::class,'blog'])->name('frontend.blog');
Route::get('job-details/{id}',[FrontendController::class,'jobDetails'])->name('frontend.job_details');



    //filter search
    Route::post('job_listing',[FrontendController::class,'job_listing'])->name('frontend.job_listing');
    Route::get('job_listing',[FrontendController::class,'job_listing'])->name('frontend.job_listing');
    Route::get('job_listingData/{id}',[FrontendController::class,'job_listing'])->name('frontend.job_listingData');

    Route::resource('invoice',InvoiceController::class);
    Route::post('invoicereportData',[InvoiceController::class,'index'])->name('invoicereportData.index');
    Route::get('invoice-data/{id}',[InvoiceController::class,'index'])->name('invoice-data.index');



Route::resource('apply', ApplyController::class);
Route::resource('about', AboutusController::class);
Route::resource('contact', ContactController::class);
Route::resource('contactinfo', ContactinfoController::class);


// Route::get('/', function () {
//     return view('auth.login');
// });

    Route::middleware('auth')->group(function () {

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('jobcategory',JobcategoryController::class);
    Route::resource('recruiter',RecruiterController::class);
    Route::resource('jobseeker',JobseekerController::class);
    Route::resource('job',JobController::class);
    Route::resource('jobpost',JobpostController::class);
    Route::resource('applicantcv',ApplicantcvController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('baner', BanerController::class);
    Route::resource('work', WorkController::class);



});

require __DIR__.'/auth.php';
