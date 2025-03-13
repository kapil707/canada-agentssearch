<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\BusinessApplicationCopyMail;
use App\Mail\BusinessApplicationMail;
use App\Models\Country;
use App\Models\FormSubmission;
use App\Models\FormType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BusinessImmigrationController extends Controller
{
    public function login() {
        if(Auth::guard('visitor')->check()) {
            return Response::redirectToRoute('business-immigration.form-1');
        }
        return view('frontend.business-immigration-login');
    }

    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required|exists:form_submissions',
            'dob' => 'required|date'
        ]);

        $form = FormSubmission::where('email',$request->input('email'))->where('dob',$request->input('dob'))->first();
        if($form) {
            Auth::guard('visitor')->loginUsingId($form->id);
            return Response::redirectToRoute('business-immigration.form-1');
        }
        return Redirect::back()->with('error','Credentials Mismatch');
    }
    public function form1(Request $request)
    {
        $form = NULL;
        if(Auth::guard('visitor')->check()) {
            /**
             * @var $form FormSubmission
             */
            $form = Auth::guard('visitor')->user();

            if($request->input('new')) {
                Auth::guard('visitor')->logout();
                \request()->session()->regenerate();
                $form = NULL;
            } else {
                if($form->steps == 4) {
                    return Response::redirectToRoute('business-immigration.init')->with('success','Your form is already complete. We will contact you soon');
                }
            }
        }
        return view('frontend.business-immigration-form-1',[
            'countries' => Country::select('name')->get(),
            'data' => $form ? $form->form_data : []
        ]);
    }

    public function form2()
    {
        /**
         * @var $form FormSubmission
         */
        $form = Auth::guard('visitor')->user();
        if($form) {
            return view('frontend.business-immigration-form-2',[
                'data' => $form->form_data
            ]);
        }
        return Response::redirectToRoute('business-immigration.init')->with('warning','Your session has timed out. Try again');
    }
    public function form3()
    {
        /**
         * @var $form FormSubmission
         */
        $form = Auth::guard('visitor')->user();
        if($form) {
            return view('frontend.business-immigration-form-3',[
                'data' => $form->form_data
            ]);
        }
        return Response::redirectToRoute('business-immigration.init')->with('warning','Your session has timed out. Try again');
    }
    public function form4()
    {
        /**
         * @var $form FormSubmission
         */
        $form = Auth::guard('visitor')->user();
        if($form) {
            return view('frontend.business-immigration-form-4',[
                'data' => $form->form_data
            ]);
        }
        return Response::redirectToRoute('business-immigration.init')->with('warning','Your session has timed out. Try again');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $lastModel = FormSubmission::where('form_type_id',2)->orderBy('id','DESC')->first();

        $formType = FormType::where('id',2)->first();

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
        $formSubmission->email = $request->input('email');
        $formSubmission->dob = Carbon::parse($request->input('dob'));
        $formSubmission->steps = 1;

        $formSubmission->save();

        Auth::guard('visitor')->loginUsingId($formSubmission->id);

        /* try {
            Mail::to($request->input('mail'))
                ->bcc([
                    'businessclient@just2canada.ca',
                    'info@tastechnologies.com',
                ])->send(new BusinessApplicationCopyMail($formSubmission));
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }*/

        return Response::redirectToRoute('business-immigration.form-2');
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        /**
         * @var $form FormSubmission
         */
        $form = Auth::guard('visitor')->user();
        $this->validateRequest($request,$form->id);

        $formData = $form->form_data;
        foreach ($request->except([
            '_token',
            'submitted',
            'g-recaptcha-response',
            'step'
        ]) as $key => $val)
        {
            $formData[$key] = $request->input($key);
        }
        $form->form_data = $formData;
        $form->steps = (int)$request->input('step');
        $form->save();

        if($form->steps == 1) {
            $form->email = $request->input('email');
            $form->dob = $request->input('dob');
        }

        if($form->steps != 4) {
            return Response::redirectToRoute('business-immigration.form-'.($form->steps + 1));
        }
        try {

            if($form->steps == 4)    {

                Mail::to($form->email)
                    ->bcc([
                        'businessclient@just2canada.ca',
                        'info@tastechnologies.com',
                    ])
                    ->send(new BusinessApplicationMail($form));

                Mail::to($request->input('mail'))
                    ->bcc([
                        'businessclient@just2canada.ca',
                        'info@tastechnologies.com',
                    ])->send(new BusinessApplicationCopyMail($form));

            }

        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }

        return Response::redirectToRoute('business-immigration.init')->with('success','Your form has been submitted successfully. We will contact you soon');
    }

    /**
     * @throws ValidationException
     */
    public function validateRequest(Request $request,$id = NULL)
    {
        $validator = Validator::make($request->all(),[
            // ============= Step 1 ===============
            'experience' => 'required_if:step,1',
            'name' => 'required_if:step,1',
            'email' => $id ? 'required_if:step,1|email|unique:form_submissions,email,'.$id : 'required_if:step,1|email|unique:form_submissions',
            'phone' => 'required_if:step,1',
            'country' => 'required_if:step,1',
            'city_of_residence' => 'required_if:step,1',
            'nationality' => 'required_if:step,1',
            'dob' => 'required_if:step,1',
            'marital_status' => 'required_if:step,1',
            'spouse_dob' => Rule::requiredIf($request->input('step') == '1' && $request->input('marital_status') == 'Married'),
            'no_of_children' =>  Rule::requiredIf($request->input('step') == '1' && $request->input('marital_status') !== 'Never Married'),
            'children_age' => Rule::requiredIf($request->input('step') == '1' && $request->input('no_of_children') && $request->input('no_of_children') >= 1),
            'is_children_on_study_permit' => Rule::requiredIf($request->input('step') == '1' && $request->input('no_of_children') && $request->input('no_of_children') >= 1),
            // ============= Step 2 ===============
            'in_canada' => 'required_if:step,2',
            'Did_you_ever_visit_Canada'=>'required_if:step,2',
            'if_yes_visited_canada_when' => Rule::requiredIf($request->input('step') == '2' && $request->input('Did_you_ever_visit_Canada') == 'Yes'),
            'is_currently_have_valid_visa' => Rule::requiredIf($request->input('step') == '2' && $request->input('in_canada') == 'Yes'),
            'your_current_visa_validity'=> Rule::requiredIf($request->input('step') == '2' && $request->input('is_currently_have_valid_visa') == 'Yes'),
            'area_of_business' => 'required_if:step,2',
            'product_description' => 'required_if:step,2',
            'intend_to_open_branch' => 'required_if:step,2',
            'how_many_employed' => Rule::requiredIf($request->input('step') == '2' && $request->input('intend_to_open_branch') == 'Yes'),
            'qualification' => 'required_if:step,2',
            // ============= Step 3 ===============
            'have_your_educational_documents_to_prove'=>'required_if:step,3',
            'leave_canada' => 'required_if:step,3',
            'arrested' => 'required_if:step,3',
            'in_military' => 'required_if:step,3',
            'employed_in_security' => 'required_if:step,3',
            'visited_in_10_years' => 'required_if:step,3',
            'spouse_have_relatives' => 'required_if:step,3',
            'spouse_relative_state' => Rule::requiredIf( $request->input('step')== '3' && $request->input('spouse_have_relatives') == 'Yes'),
            // ============= Step 4 ===============
            'visited_canada' => 'required_if:step,4',
            'visited_in_2' => Rule::requiredIf( $request->input('step')== '4' && $request->input('visited_canada') ==  'Yes'),
            'provinces_visited' => Rule::requiredIf( $request->input('step')== '4' && $request->input('visited_in_2') ==  'Yes'),
            'visa_refused' => 'required_if:step,4',
            'assets' => 'required_if:step,4',
            'taken_english_test' => 'required_if:step,4',
            'have_you_obtained_educational_credentials_assessment'=>'required_if:step,4',
            'interests' => 'required_if:step,4',
            //'apply_same' => 'required',
            'agree' => 'required_if:step,4',
            'g-recaptcha-response' => 'required',
        ],[
            // ============= Step 1 ===============
            'experience.required_if' => 'Please mention your experience',
            'name.required_if' => 'Name is required',
            'email.required_if' => 'Email is required',
            'phone.required_if' => 'Phone is required',
            'country.required_if' => 'Country is required',
            'city_of_residence.required_if' => 'City of residence is required',
            'nationality.required_if' => 'Nationality is required',
            'dob.required_if' => 'Date of birth is required',
            'marital_status.required_if' => 'Marital status is required',
            'spouse_dob.required' => 'Spouse\'s date of birth is required',
            'no_of_children.required' => 'Please select how many children you have.',
            'children_age.required' => 'Please enter your children age',
            'is_children_on_study_permit.required' =>'Please select whether your children studying on permit',
            // ============= Step 2 ===============
            'in_canada.required_if' => 'Please specify whether you are in canada or not',
            'Did_you_ever_visit_Canada.required_if' => 'Please specify whether you ever visited Canada?',
            'if_yes_visited_canada_when.required' => 'Please specify when you visited Canada?',
            'is_currently_have_valid_visa.required' => 'Please specify whether you have valid visa currently?',
            'your_current_visa_validity.required'=>'Please specify your current visa validity',
            'area_of_business.required_if' => 'Please select at least one of area of business or management experience',
            'product_description.required_if' => 'Please describe your product / commodity',
            'intend_to_open_branch.required_if' => 'Please specify whether you intend to open a branch / subsidiary office of your existing business in Canada',
            'how_many_employed.required' => 'Please specify how many people are employed in your business outside Canada',
            'qualification.required_if' => 'Please select your educational qualification',
            // ============= Step 3 ===============
            'have_your_educational_documents_to_prove.required_if'=>'Please specify whether you have your educational documents to prove',
            'leave_canada.required_if' => 'Please specify whether you have been ordered to leave Canada or any other country or not',
            'arrested.required_if' => 'Please specify whether you have been arrested or charged with any offence or not',
            'in_military.required_if' => 'Please specify whether you have ever been in the military (including mandatory service), a militia, or a civil defense unit or the police or not',
            'employed_in_security.required_if' => 'Please specify whether you have ever been employed by a government in a security-related capacity or not',
            'visited_in_10_years.required_if' => 'Please specify whether you have visited other countries within the last 10 years or not',
            'spouse_have_relatives.required_if' => 'Please specify whether you or your spouse have blood relatives in Canada or not',
            'spouse_relative_state.required' => 'Please select the provinces(s) where your or your spouse\'s relatives reside in',
            // ============= Step 4 ===============
            'visited_canada.required_if' => 'Please specify whether you have visited canada or not',
            'visited_in_2.required' => 'Please specify whether you visited Canada in the last 2 years',
            'provinces_visited.required' => 'Please select at least one province(s) you visited',
            'visa_refused.required_if' => 'Please specify whether your visa to Canada has ever been refused or not',
            'assets.required_if' => 'Please specify total value of assets between you and your spouse',
            'taken_english_test.required_if' => 'Please specify whether you have taken English proficiency test or not',
            'have_you_obtained_educational_credentials_assessment.required_if'=>'Please specify whether  you have obtained educational credentials assessment?',
            'interests.required_if' => 'Please select at least one of interests mentioned in the bottom of this form',
            'apply_same.required_if' => 'Please specify whether you consider two applicants to apply under the entrepreneur stream in the same application or not',
            'agree.required_if' => 'Please check the agreement at the bottom of questionnaire',
            'g-recaptcha-response.required' => 'Please check I\'m not robot box',
        ]);
        $validator->validate();
    }

}
