<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BusinessApplicationController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\JobSeekerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\QuickRegistrationController;
use App\Http\Controllers\Admin\SkilledWorkerApplicationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FormRemarkController;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function() {
    Route::get('/',[AuthController::class,'login'])->name('admin.auth.login');
    Route::get('login',[AuthController::class,'login'])->name('admin.auth.login');
    Route::post('login',[AuthController::class,'doLogin'])->name('admin.auth.login');
});

Route::middleware(['auth:web','role:admin|super_admin'])->name('admin.')->group(function() {
    Route::resource('quick-registrations', QuickRegistrationController::class)->only('index','destroy');
    Route::resource('form-remarks', FormRemarkController::class)->only('edit','update','store');
    Route::post('business-applications/{id}/agreement-download', [BusinessApplicationController::class,'agreementDownload'])->name('ba.agreement.download');
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('home');
    Route::resource('testimonials',TestimonialController::class);
    Route::post('users/{id}/change-password',[UserController::class,'changePassword'])->name('users.change-password');
    Route::resource('users', UserController::class);
    Route::resource('pages',PageController::class);
    Route::post('business-applications/{id}/upload-contract',[BusinessApplicationController::class,'uploadSignedContract'])
        ->name('business-applications.upload-contract');
    Route::get('business-applications/{id}/download', function ($id) {
        /**
         * @var $model FormSubmission
         */
        $model = FormSubmission::find($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdfs.ba-copy',[
            'data' => $model
        ]);
        return $pdf->download($model->client_id.'.pdf');
    })->name('business-applications.download');
    Route::resource('business-applications', BusinessApplicationController::class);
    Route::get('job-seekers/{id}/download', function ($id) {
        /**
         * @var $model FormSubmission
         */
        $model = FormSubmission::find($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdfs.js-copy',[
            'data' => $model
        ]);
        return $pdf->download($model->client_id.'.pdf');
    })->name('job-seekers.download');
    Route::resource('job-seekers', JobSeekerController::class);
    Route::get('employers/{id}/download', function ($id) {
        /**
         * @var $model FormSubmission
         */
        $model = FormSubmission::find($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdfs.ed-copy',[
            'data' => $model
        ]);
        return $pdf->download($model->client_id.'.pdf');
    })->name('employers.download');
    Route::resource('employers', EmployerController::class);
    Route::resource('skilled-worker-applications', SkilledWorkerApplicationController::class);
    Route::post('settings/assessment-options', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'name' => 'required'
        ]);
        $assessmentSettingsModel = \App\Models\Setting::where('key','assessment_options')->first();
        if($assessmentSettingsModel) {
            $options = $assessmentSettingsModel->value;
            if($request->input('is_edit')) {
                $options[$request->input('edit_index')] = $request->input('name');
            } else {
                $options[] = $request->input('name');
            }
        } else {
            $assessmentSettingsModel = new \App\Models\Setting();
            $assessmentSettingsModel->key = 'assessment_options';
            $options = [$request->input('name')];
        }
        $assessmentSettingsModel->value = $options;
        $assessmentSettingsModel->save();
        Session::flash('success', 'Update Success');
        return Response::json([
            'message' => 'success'
        ]);

    })->name('settings.assessment-options');
    Route::post('settings/assessment-options/delete', function (\Illuminate\Http\Request $request) {
        $assessmentSettingsModel = \App\Models\Setting::where('key','assessment_options')->first();
        $options = $assessmentSettingsModel->value;
        unset($options[$request->input('index')]);
        $options = array_values($options);
        $assessmentSettingsModel->value = $options;
        $assessmentSettingsModel->save();
        Session::flash('success', 'Delete Success');
        return Response::json([
            'message' => 'success'
        ]);
    })->name('settings.assessment-options.delete');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('profile',[\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    Route::post('profile/change-password',[\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('profile.change-password');
});
