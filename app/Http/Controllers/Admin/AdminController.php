<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormRemark;
use App\Models\FormSubmission;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reminders = FormRemark::whereBetween('next_follow',[now()->startOfDay()->toDateTimeString(),now()->endOfDay()->toDateTimeString()])->with('form_submission')->get();
        $businessFormCount = FormSubmission::where('form_type_id',2)->count();
        $businessFormTodayCount = FormSubmission::whereBetween('created_at',[now()->startOfDay()->toDateTimeString(),now()->endOfDay()->toDateTimeString()])->where('form_type_id',2)->count();
        $latestBusinessForms = FormSubmission::select('id','client_id','form_data->name as name','form_data->email as email','form_data->country as country')->where('form_type_id',2)->orderBy('created_at','DESC')->limit(10)->get();
        return view('admin.home',[
            'title' => 'Dashboard',
            'reminders' => $reminders,
            'business_form_count' => $businessFormCount,
            'business_form_today_count' => $businessFormTodayCount,
            'lastest_business_forms' => $latestBusinessForms
        ]);
    }

    public function settings()
    {
        $assessmentOptions = Setting::where('key','assessment_options')->first();
        return view('admin.settings',[
            'title' => 'Settings',
            'breadcrumbs' => [
                ['label' => 'Settings', 'route_name' => 'admin.settings']
            ],
            'assessment_options' => $assessmentOptions ? $assessmentOptions->value : []
        ]);
    }
}
