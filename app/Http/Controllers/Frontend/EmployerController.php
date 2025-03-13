<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmployerCopyMail;
use App\Mail\EmployerMail;
use App\Models\Employer;
use App\Models\FormSubmission;
use App\Models\FormType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmployerController extends Controller
{
    public function dashboard()
    {
        return view('frontend.employer.dashboard');
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = Employer::where('email',$request->input('email'))->first();

        if($user) {
            $authenticated = Hash::check($request->input('password'),$user->password);
            if($authenticated) {
                Auth::guard('employer')->login($user, $request->has('remember'));
                return Response::redirectToIntended(route('employer.dashboard'));
            } else {
                throw ValidationException::withMessages([
                    'Credential Mismatch'
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'Account does not exist'
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('employer')->logout();
        request()->session()->regenerate();
        return redirect(route('employer.login'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:employers',
            'password' => 'required|confirmed',
        ]);
        $employer = new Employer();
        $employer->email = $request->input('email');
        $employer->password = Hash::make($request->input('password'));
        $employer->save();

        Auth::guard('employer')->loginUsingId($employer->id);

        event(new Registered($employer));

        return redirect(route('employer.dashboard'))->with('success','A validation email has been sent to your email id. Please validate by clicking the link in your email.');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->toArray(),[
            'crapdpan' => 'required',
            'business_legal_name' => 'required',
            'business_address' => 'required',
            'principle_contact_info' => 'required',
            'name' => 'required',
            'job_title' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'no_of_employees' => 'required',
            'more_than_5_million' => 'required',
            'lay_off_last_12' => 'required',
            'no_of_canadians' => 'required_if:lay_off_last_12,Yes',
            'g-recaptcha-response' => 'required',
        ],[
            'crapdpan.required' => 'Canada Revenue Agency Payroll deductions program account number is required',
            'principle_contact_info.required' => 'Principle Employer Contact Information is required',
            'no_of_employees.required' => 'No of employees employed nationally under the employer’s 9-digit CRA business number is required',
            'more_than_5_million.required' => 'Please mention whether the business report more than $5 million (CAD) in annual gross revenue to CRA during its last tax year or not',
            'lay_off_last_12.required' => 'Please mention whether In the last 12 months, did the employer lay off any employees working in the position(s) being requested in this application or not',
            'no_of_canadians.required_if' => 'Please mention how many Canadians/permanent residents laid off',
            'g-recaptcha-response.required' => 'Please check I\'m not robot box',
        ]);
        $validator->validate();

        /**
         * @var Employer $user
         */
        $user = Auth::user();
        if($user->form_submission){
            return Redirect::route('employer.dashboard');
        }

        $employer = Employer::find(Auth::user()->id);
        $formData = $request->except([
            '_token',
            'submitted',
            'g-recaptcha-response'
        ]);
        $lastModel = FormSubmission::where('form_type_id',4)->orderBy('id','DESC')->first();

        $formType = FormType::where('id',4)->first();

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
            'g-recaptcha-response'
        ]);

        $formSubmission->form_data = $formData;

        $formSubmission->save();

        $employer = Employer::find(Auth::user()->id);
        $employer->form_submission()->associate($formSubmission);
        $employer->save();

        Mail::to($employer->email)
            ->bcc([
                'businessclient@just2canada.ca',
                'info@tastechnologies.com',
                'testing0415048@gmail.com'
            ])
            ->send(new EmployerMail($formSubmission));

        Mail::to($employer->email)
            ->bcc([
                'businessclient@just2canada.ca',
                'info@tastechnologies.com',
                'testing0415048@gmail.com'
            ])
            ->send(new EmployerCopyMail($formSubmission));

        return Response::redirectToRoute('employer.dashboard')->with('success','Your form has been submitted successfully. We will contact you soon');
    }
}
