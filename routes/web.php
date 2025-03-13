<?php

use App\Http\Controllers\Frontend\BusinessImmigrationController;
use App\Http\Controllers\Frontend\EmployerController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\QuickRegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

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
Route::get('test/mail', function () {
    $model = \App\Models\FormSubmission::orderBy('id','DESC')->first();
    \Illuminate\Support\Facades\Mail::to('shabeeboali@gmail.com')->bcc(['shabeeboali@outlook.com'])->send(new \App\Mail\BusinessApplicationMail($model));
    \Illuminate\Support\Facades\Mail::to('shabeeboali@gmail.com')->bcc(['shabeeboali@outlook.com'])->send(new \App\Mail\BusinessApplicationCopyMail($model));
});

Route::get('/employer/email/verify', function () {
    return view('frontend.employer.verify-email');
})->middleware('auth:employer')->name('verification.notice');
Route::get('/employer/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(route('employer.dashboard'));
})->middleware(['auth:employer','signed'])->name('verification.verify');
Route::get('/employer/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth:employer', 'throttle:6,1'])->name('verification.send');

Route::prefix('employer')->name('employer.')->group(function(){
    Route::view('login','frontend.employer.login')->name('login')->middleware('guest:employer');
    Route::post('login', [EmployerController::class,'login'])->name('login.post');
    Route::view('register','frontend.employer.register')->name('register')->middleware('guest:employer');
    Route::post('register', [EmployerController::class,'register'])->name('register.post');
    Route::post('logout',[EmployerController::class,'logout'])->middleware(['auth:employer'])->name('logout');
    Route::middleware(['auth:employer','verified'])->group(function(){
        Route::get('document-form',function(){
            /**
             * @var Employer $user
             */
            $user = Auth::user();
            if($user->form_submission){
               return Redirect::route('employer.dashboard');
            }
            return view('frontend.employer.document-form');
        })->name('document-form');
        Route::post('document-form',[EmployerController::class,'store'])->name('document-form.post');
        Route::middleware('complete_registration')->group(function () {
            Route::get('dashboard',[EmployerController::class,'dashboard'] )->name('dashboard');
        });
    });
});
//Route::view('quick-registration-form','frontend.quick-registration-form')->name('quick-registration-form');
Route::post('quick-registration-form',[QuickRegistrationController::class,'store'])->name('quick-registration-form');
Route::view('job-seeker','frontend.job-seeker')->name('job-seeker');
Route::post('job-seeker',[\App\Http\Controllers\Frontend\JobSeekerController::class,'store'])->name('job-seeker.store');
Route::view('skilled-worker-assessment','frontend.skilled-worker-assessment')->name('skilled-worker-assessment');
Route::view('immigration-consultants-in-ncr','frontend.immigration-consultants-in-ncr');
//Route::view('contact-us', 'frontend.contact-us');
Route::redirect('business-immigration-assessment.php','business-immigration-assessment');
Route::view('business-immigration-assessment','frontend.business-immigration-init')->name('business-immigration.init');
Route::get('business-immigration-assessment/login',[BusinessImmigrationController::class,'login'])->name('business-immigration.login');
Route::post('business-immigration-assessment/login',[BusinessImmigrationController::class,'doLogin'])->name('business-immigration.do-login');
Route::get('business-immigration-assessment/form/1',[BusinessImmigrationController::class,'form1'])->name('business-immigration.form-1');
Route::post('business-immigration-assessment-store',[BusinessImmigrationController::class,'store'])->name('business-immigration.store');
Route::post('business-immigration-assessment-update',[BusinessImmigrationController::class,'update'])->name('business-immigration.update');
Route::middleware(['auth:visitor'])->group(function() {
    Route::get('business-immigration-assessment/form/2',[BusinessImmigrationController::class,'form2'])->name('business-immigration.form-2');
    Route::get('business-immigration-assessment/form/3',[BusinessImmigrationController::class,'form3'])->name('business-immigration.form-3');
    Route::get('business-immigration-assessment/form/4',[BusinessImmigrationController::class,'form4'])->name('business-immigration.form-4');
});

Route::get('/{any}', [PageController::class,'page'])->where('any', '.*');



