<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\JobSeekerCopyMail;
use App\Mail\JobSeekerMail;
use App\Models\FormSubmission;
use App\Models\FormType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobSeekerController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->toArray(),
            [
                'full_name' => 'required',
                'short_name' => 'required',
                'citizen' => 'required',
                'current_residence' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'current_occupation' => 'required',
                'current_years_of_experience' => 'required',
                'country' => 'required',
                'previous_occupation' => 'required',
                'previous_years_of_experience' => 'required',
                'taken_proficiency_test' => 'required',
                'score_card' => 'required_if:taken_proficiency_test,Yes',
                'rate_english' => 'required_if:taken_proficiency_test,No',
                'obtained_eca' => 'required',
                'eca_report' => 'required_if:obtained_eca,Yes',
                'countries_served' => 'required',
                'reference' => 'required',
                'describe' => 'required',
                'resume' => 'required',
                'profile_pic' => 'required',
                'intro_video' => 'required',
                // 'g-recaptcha-response' => 'required',
            ],[
                'g-recaptcha-response.required' => 'Please check I\'m not robot box',
            ]
        )->validate();
        $lastModel = FormSubmission::where('form_type_id',3)->orderBy('id','DESC')->first();

        $formType = FormType::where('id',3)->first();

        if($lastModel) {
            $client_id = $formType->shortname.str_pad(($lastModel->id + 1),4,'0',STR_PAD_LEFT);
        } else {
            $client_id = $formType->shortname.'0001';
        }
        $formSubmission = new FormSubmission();

        $formSubmission->client_id = $client_id;

        $formSubmission->form_type_id = $formType->id;

        $formData = $request->except([
            '_token',
            'submitted',
            'g-recaptcha-response',
            'score_card',
            'eca_report',
            'resume',
            'profile_pic',
            'intro_video'
        ]);

        if($request->hasFile('score_card')) {
            $score_card = $request->file('score_card')->store('job-seekers'.DIRECTORY_SEPARATOR.'score_cards','public');
            $formData['score_card'] = $score_card;
        }
        if($request->hasFile('eca_report')) {
            $score_card = $request->file('eca_report')->store('job-seekers'.DIRECTORY_SEPARATOR.'eca_reports','public');
            $formData['eca_report'] = $score_card;
        }

        if($request->hasFile('resume')) {
            $score_card = $request->file('resume')->store('job-seekers'.DIRECTORY_SEPARATOR.'resumes','public');
            $formData['resume'] = $score_card;
        }

        if($request->hasFile('profile_pic')) {
            $score_card = $request->file('profile_pic')->store('job-seekers'.DIRECTORY_SEPARATOR.'profile_pics','public');
            $formData['profile_pic'] = $score_card;
        }
        if($request->hasFile('intro_video')) {
            $score_card = $request->file('intro_video')->store('job-seekers'.DIRECTORY_SEPARATOR.'intro_videos','public');
            $formData['intro_video'] = $score_card;
        }

        $formSubmission->form_data = $formData;

        $formSubmission->save();

        Mail::to($request->input('mail'))
            ->bcc([
                'businessclient@just2canada.ca',
                'info@tastechnologies.com',
                'testing0415048@gmail.com'
            ])
            ->send(new JobSeekerMail($formSubmission));

        Mail::to($request->input('mail'))
            ->bcc([
                'businessclient@just2canada.ca',
                'info@tastechnologies.com',
                'testing0415048@gmail.com'
            ])
            ->send(new JobSeekerCopyMail($formSubmission));
        return Response::redirectToRoute('job-seeker')->with('success','Your form has been submitted successfully. We will contact you soon');
    }
}
