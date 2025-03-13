<?php

namespace App\Console\Commands;

use App\Models\FormSubmission;
use App\Models\FormType;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FormDataImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form:importer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rows = DB::table('trn_form_submission')->where('formTypeid',1)->get();
        FormSubmission::unguard();
        foreach ($rows as $row)
        {
            $formData = json_decode($row->formData, TRUE);
            $data = [];
            if(isset($formData['name'])) {
                $data['name'] = $formData['name'];
            }
            if(isset($formData['email'])) {
                $data['email'] = $formData['email'];
            }
            if(isset($formData['phone'])) {
                $data['phone'] = $formData['phone'];
            }
            if(isset($formData['Reading'])) {
                $data['reading'] = $formData['Reading'];
            }
            if(isset($formData['Writing'])) {
                $data['writing'] = $formData['Writing'];
            }
            if(isset($formData['country'])) {
                $data['country'] = $formData['country'];
            }
            if(isset($formData['Speaking'])) {
                $data['speaking'] = $formData['Speaking'];
            }
            if(isset($formData['Listening'])) {
                $data['listening'] = $formData['Listening'];
            }
            if(isset($formData['Reference'])) {
                $data['reference'] = $formData['Reference'];
            }
            if(isset($formData['Nationality'])) {
                $data['nationality'] = $formData['Nationality'];
            }
            if(isset($formData['Marital_Status'])) {
                $data['marital_status'] = $formData['Marital_Status'];
            }
            if(isset($formData['How_many_children'])) {
                $data['no_of_children'] = $formData['How_many_children'];
            }
            if(isset($formData['ever_visited_Canada'])) {
                $data['visited_canada'] = $formData['ever_visited_Canada'];
            }
            if(isset($formData['Do_you_have_any_queries'])) {
                $data['queries'] = $formData['Do_you_have_any_queries'];
            }
            if(isset($formData['Education_Qualification'])) {
                $data['qualification'] = $formData['Education_Qualification'];
            }
            if(isset($formData['English_proficiency_test'])) {
                $data['taken_english_test'] = $formData['English_proficiency_test'];
            }
            if(isset($formData['Your_Spouse_Date_of_Birth'])) {
                $data['spouse_dob'] = $formData['Your_Spouse_Date_of_Birth'];
            }
            if(isset($formData['blood_relatives_in_Canada'])) {
                $data['spouse_have_relatives'] = $formData['blood_relatives_in_Canada'];
            }
            if(isset($formData['rate_your_English_language'])) {
                $data['language_proficiency'] = $formData['rate_your_English_language'];
            }
            if(isset($formData['Are_you_currently_in_Canada'])) {
                $data['in_canada'] = $formData['Are_you_currently_in_Canada'];
            }
            if(isset($formData['Canada_business_immigration'])) {
                $data['interests'] = $formData['Canada_business_immigration'];
            }
            if(isset($formData['visa_to_Canada_ever_been_refused'])) {
                $data['visa_refused'] = $formData['visa_to_Canada_ever_been_refused'];
            }
            if(isset($formData['which_experience_pertains_to_you'])) {
                $data['experience'] = $formData['which_experience_pertains_to_you'];
            }
            if(isset($formData['Between_you_and_your_spouse_Assets'])) {
                $data['assets'] = $formData['Between_you_and_your_spouse_Assets'];
            }
            if(isset($formData['Date_of_Birth_of_Principal_Applicant'])) {
                $data['dob'] = $formData['Date_of_Birth_of_Principal_Applicant'];
            }
            if(isset($formData['Have_you_been_ordered_to_leave_Canada'])) {
                $data['leave_canada'] = $formData['Have_you_been_ordered_to_leave_Canada'];
            }
            if(isset($formData['visa_to_Canada_ever_been_refused_detail'])) {
                $data['refused_detail'] = $formData['visa_to_Canada_ever_been_refused_detail'];
            }
            if(isset($formData['Have_you_ever_committed,_been_arrested_for'])) {
                $data['arrested'] = $formData['Have_you_ever_committed,_been_arrested_for'];
            }
            if(isset($formData['Have_you_ever_been_employed_by_a_government'])) {
                $data['employed_in_security'] = $formData['Have_you_ever_been_employed_by_a_government'];
            }
            if(isset($formData['Have_you_visited_other_countries_last_10_years'])) {
                $data['visited_countries'] = $formData['Have_you_visited_other_countries_last_10_years'];
            }
            if(isset($formData['Have_you_visited_other_countries_within_the_last_10_years?'])) {
                $data['visited_in_10'] = $formData['Have_you_visited_other_countries_within_the_last_10_years?'];
            }
            if(isset($formData['Briefly_describe_product/commodity_you_deal_in_your_business'])) {
                $data['product_description'] = $formData['Briefly_describe_product/commodity_you_deal_in_your_business'];
            }
            if(isset($formData['children_less_than_22_years'])) {
                $data['children_lt_20'] = $formData['children_less_than_22_years'];
            }
            if(isset($formData['Do_you_have_any_of_your_children_who_are_Canadian_citizens'])) {
                $data['children_canadian'] = $formData['Do_you_have_any_of_your_children_who_are_Canadian_citizens'];
            }
            if(isset($formData['Your_spouse_experience'])) {
                $data['children_canadian'] = $formData['Your_spouse_experience'];
            }
            if(isset($formData['Do_you_have_children_enrolled_in_accredited_Canadian_education'])) {
                $data['children_enrolled'] = $formData['Do_you_have_children_enrolled_in_accredited_Canadian_education'];
            }
            if(isset($formData['Do_you,_your_spouse_or_your_children_have_a_physical_or_mental_disorder'])) {
                $data['spouse_children_mental'] = $formData['Do_you,_your_spouse_or_your_children_have_a_physical_or_mental_disorder'];
            }
            if(isset($formData['radHave_you_ever_been_in_the_military_including_mandatory_service_a__militia_or_a_civil_defense_unit_or_the_police'])) {
                $data['in_military'] = $formData['radHave_you_ever_been_in_the_military_including_mandatory_service_a__militia_or_a_civil_defense_unit_or_the_police'];
            }
            if(isset($formData['state_the_province_they_reside_in'])) {
                $data['spouse_relative_state'] = $formData['state_the_province_they_reside_in'];
            }
            if(isset($formData['visit_Canada_in_the_last_2_years'])) {
                $data['visited_in_2'] = $formData['visit_Canada_in_the_last_2_years'];
            }
            if(isset($formData['state_the_provinces_visited'])) {
                $data['provinces_visited'] = $formData['state_the_provinces_visited'];
            }

            $formType = FormType::where('id',2)->first();

            $client_id = $formType->shortname.str_pad(($row->id),4,'0',STR_PAD_LEFT);

            $formSubmission = new FormSubmission([
                'id' => $row->id
            ]);

            $formSubmission->client_id = $client_id;

            $formSubmission->form_type_id = $formType->id;

            $formSubmission->created_at = $row->created_at;

            $formSubmission->form_data = $data;

            $formSubmission->save();
        }
    }
}
