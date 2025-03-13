<x-layouts.frontend>
    <div id="slider">
        <div id="first-slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade">
                <div class="carousel-inner" role="listbox">
                    <div class="item active slide1"><img src="{{asset('images/banner/form2.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                    <h1 class="welc-text"> BUSINESS IMMIGRATION ASSESSMENT FORM
                        <a href="obtain-free-assessment" class="backlink pull-right">
                            <i class="fa-chevron-left fa"></i> Back
                        </a>
                    </h1>
                    <!-- <br> -->
                    <p style="font-style:italic;color:red;font-weight:bold;">The best 5 minutes you would have ever invested in obtaining an accurate assessment of your Canadian immigration qualifications!</p>
                </div>
                <div class="form-div" x-data="businessform">
                    <form class="text-left   row-20 ng-pristine ng-valid" action="{{ route('business-immigration.update') }}" method="POST" enctype="multipart/form-data" id="contactus"  accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="submitted" id="submitted" value="1">
                        <input type="hidden" name="step" id="submitted" value="4">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4>CONFIDENTIAL WHEN COMPLETED.</h4>
                        Just To Canada case assessment specialists will use the collected information from this form to
                        assess all Canadian immigration possibilities. None of the information will be shared with any
                        third parties for any purposes whatsoever.
                        <br>
                        <br>
                        <div class="form-inner">
                            <br>
                            <div class="col-md-12" style="margin-bottom: 20px;"><strong>18.</strong> Have you ever visited Canada ?<span
                                    class="spanHighlight">*</span><br>
                                <input x-model="visited_canada" name="visited_canada" type="radio" value="Yes" @if(old('visited_canada',$data['visited_canada'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input x-model="visited_canada" name="visited_canada" type="radio" value="No" @if(old('visited_canada',$data['visited_canada'] ?? '') == 'No') checked @endif> No
                            </div>
                            <template x-if="visited_canada == 'Yes'">
                                <div class="col-md-12 divVisitedLast2years" style="margin-bottom: 20px;">Did you visit Canada in
                                    the last 2 years?<span class="spanHighlight">*</span><br>
                                    <input class="txtHave_you_Visited_Canada_in_last_2_years" x-model="visited_in_2" name="visited_in_2" type="radio" value="Yes" @if(old('visited_in_2',$data['visited_in_2'] ?? '') == 'Yes') checked @endif> Yes
                                    <span style="margin-right: 20px;"></span>
                                    <input class="txtHave_you_Visited_Canada_in_last_2_years" x-model="visited_in_2" name="visited_in_2" type="radio" value="No" @if(old('visited_in_2',$data['visited_in_2'] ?? '') == 'No') checked @endif> No
                                </div>
                            </template>
                            <template x-if="visited_in_2 == 'Yes'">
                                <div class="col-md-12 divProvincesVisitedlast2years"  style="margin-bottom: 20px;">If yes, please
                                    state the provinces visited (you can select more than one)<br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('British Columbia', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="British Columbia"> British Columbia <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Alberta', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Alberta"> Alberta <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Saskatchewan', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Saskatchewan"> Saskatchewan <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Manitoba', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Manitoba"> Manitoba <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Ontario', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Ontario"> Ontario <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Quebec', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Quebec"> Quebec <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Nova Scotia', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Nova Scotia"> Nova Scotia <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('New Brunswick', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="New Brunswick"> New Brunswick <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Prince Edward Island', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Prince Edward Island"> Prince Edward Island <br>
                                    <input class="chkif_yes_last_visted_Provinces" name="provinces_visited[]"
                                           @if(in_array('Newfoundland', old('provinces_visited',$data['provinces_visited'] ?? []))) checked @endif
                                           type="checkbox" value="Newfoundland &amp; Labrador"> Newfoundland &amp; Labrador
                                </div>
                            </template>
                            <br>
                            <div class="clearfix"></div>
                            <div class="col-md-12 divParentVisatoCanadarefusedDetail" style="margin-bottom: 20px;"><strong>19.</strong> Has your visa to Canada ever been refused?<span class="spanHighlight"></span><br>
                                <input class="radHas_your_Visa_to_Canada_ever_been_refused"
                                       name="visa_refused" x-model="visa_refused" type="radio" value="Yes" @if(old('visa_refused',$data['visa_refused'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHas_your_Visa_to_Canada_ever_been_refused"
                                       name="visa_refused" x-model="visa_refused" type="radio" value="No" @if(old('visa_refused',$data['visa_refused'] ?? '') == 'No') checked @endif> No <br>
                                <template x-if="visa_refused == 'Yes'">
                                    <div class="divVisatoCanadarefusedDetail">
                                        If Yes, please provide when and related details
                                        <input id="txtVisa_to_Canada_ever_been_refused_detail"
                                               name="visa_refused_details" type="text"
                                               class="form-control" value="{{ old('visa_refused_details',$data['visa_refused_details'] ?? '') }}">
                                    </div>
                                </template>
                            </div>
                            <div class="col-md-12"><strong>20.</strong> Between you and your spouse, please calculate the total value of your
                                assets, including movable, immovable property/properties, cash in the bank, mutual
                                funds, fixed deposits, etc. Please calculate in Canadian dollars. If you wish to convert
                                from any currency to Canadian dollars, please visit www.xe.com. Please remember to
                                include and assess only those assets that are in your and your spouse’s name.
                                <span class="spanHighlight">*</span><br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       name="assets" type="radio"
                                       @if(old('assets',$data['assets'] ?? '') == '$100,000 to $150,000') checked @endif
                                       value="$100,000 to $150,000"> $100,000 to $150,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$150,000 to $200,000') checked @endif
                                       name="assets" type="radio"
                                       value="$150,000 to $200,000"> $150,000 to $200,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$200,000 to $250,000') checked @endif
                                       name="assets" type="radio"
                                       value="$200,000 to $250,000"> $200,000 to $250,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$250,000 to $300,000') checked @endif
                                       name="assets" type="radio"
                                       value="$250,000 to $300,000"> $250,000 to $300,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$300,000 to $350,000') checked @endif
                                       name="assets" type="radio"
                                       value="$300,000 to $350,000"> $300,000 to $350,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$350,000 to $400,000') checked @endif
                                       name="assets" type="radio"
                                       value="$350,000 to $400,000"> $350,000 to $400,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$400,000 to $450,000') checked @endif
                                       name="Bassets" type="radio"
                                       value="$400,000 to $450,000"> $400,000 to $450,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$450,000 to $500,000') checked @endif
                                       name="assets" type="radio"
                                       value="$450,000 to $500,000"> $450,000 to $500,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$500,000 to $550,000') checked @endif
                                       name="assets" type="radio"
                                       value="$500,000 to $550,000"> $500,000 to $550,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$550,000 to $600,000') checked @endif
                                       name="assets" type="radio"
                                       value="$550,000 to $600,000"> $550,000 to $600,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$650,000 to $700,000') checked @endif
                                       name="assets" type="radio"
                                       value="$650,000 to $700,000"> $650,000 to $700,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$700,000 to $750,000') checked @endif
                                       name="assets" type="radio"
                                       value="$700,000 to $750,000"> $700,000 to $750,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$750,000 to $800,000') checked @endif
                                       name="assets" type="radio"
                                       value="$750,000 to $800,000"> $750,000 to $800,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$800,000 to $850,000') checked @endif
                                       name="assets" type="radio"
                                       value="$800,000 to $850,000"> $800,000 to $850,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$850,000 to $900,000') checked @endif
                                       name="assets" type="radio"
                                       value="$850,000 to $900,000"> $850,000 to $900,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$900,000 to $950,000') checked @endif
                                       name="assets" type="radio"
                                       value="$900,000 to $950,000"> $900,000 to $950,000 <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$950,000 to $1 million') checked @endif
                                       name="assets" type="radio"
                                       value="$950,000 to $1 million"> $950,000 to $1 million <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$1 million to $2 million') checked @endif
                                       name="assets" type="radio"
                                       value="$1 million to $2 million"> $1 million to $2 million <br>
                                <input class="radTotal_value_of_you_and_your_spouse_assets"
                                       @if(old('assets',$data['assets'] ?? '') == '$2 million and up') checked @endif
                                       name="assets" type="radio"
                                       value="$2 million and up"> $2 million and up
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12"><strong>21.</strong> Funds available to invest in Canada from the total net-worth you reported above. Generally, your total net worth between your spouse and yourself must exceed the funds you will make available to invest in a business in Canada. However, please note that your net worth does not count under the Canada Startup Visa or under the C11 Entrepreneur visa. It is generally required under all provincial nominee programs for entrepreneurs.:<span class="spanHighlight">*</span><br>
                                <input class="radEducational_Qualification" name="funds_available" type="radio" value="$150,000 - $250,000" @if(old('funds_available',$data['funds_available'] ?? '') == '$150,000 - $250,000') checked @endif> $150,000 - $250,000 <br>
                                <input name="funds_available" class="radEducational_Qualification" type="radio" value="$250,000 - $300,000" @if(old('funds_available',$data['funds_available'] ?? '') == '$250,000 - $300,000') checked @endif> $250,000 - $300,000 <br>
                                <input class="radEducational_Qualification" name="funds_available" type="radio" value="$300,000 - $350,000" @if(old('funds_available',$data['funds_available'] ?? '') == '$300,000 - $350,000') checked @endif> $300,000 - $350,000 <br>
                                <input class="radEducational_Qualification" name="funds_available" type="radio" value="$500,000 to $1 million" @if(old('funds_available',$data['funds_available'] ?? '') == '$500,000 to $1 million') checked @endif> $500,000 to $1 million <br>
                                <input name="funds_available" class="radEducational_Qualification" type="radio" value="Above $1 million" @if(old('funds_available',$data['funds_available'] ?? '') == 'Above $1 million') checked @endif> Above $1 million <br>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>22.</strong> Have you taken English proficiency test (IELTS or CELPIP) ?<span
                                    class="spanHighlight">*</span><br>
                                <input class="radHave_you_taken_English_Proficiency_test" x-model="taken_english_test" name="taken_english_test" type="radio" value="Yes" @if(old('taken_english_test',$data['taken_english_test'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_taken_English_Proficiency_test" x-model="taken_english_test" name="taken_english_test" type="radio" value="No" @if(old('taken_english_test',$data['taken_english_test'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <template x-if="taken_english_test == 'Yes'">
                                <div class="col-md-12 divEnglishproficiencyTesttaken">If yes, what is
                                    your score in <br>
                                    <div class="col-md-6">
                                        Reading
                                        <input type="text"
                                               id="txtIf_yes_what_is_your_score_in_Reading" class="form-control col-12"
                                               value="{{ old('reading',$data['reading'] ?? '') }}"
                                               name="reading">
                                        Writing
                                        <input type="text"
                                               id="txtIf_yes_what_is_your_score_in_Writing" class="form-control col-12"
                                               value="{{ old('writing',$data['writing'] ?? '') }}"
                                               name="writing">
                                    </div>
                                    <div class="col-md-6">
                                        Speaking
                                        <input type="text"
                                               id="txtIf_yes_what_is_your_score_in_Speaking" class="form-control col-12"
                                               value="{{ old('speaking',$data['speaking'] ?? '') }}"
                                               name="speaking">
                                        Listening
                                        <input type="text"
                                               id="txtIf_yes_what_is_your_score_in_Listening" class="form-control col-12"
                                               value="{{ old('listening',$data['listening'] ?? '') }}"
                                               name="listening">
                                    </div>
                                </div>
                            </template>
                            <div class="clearfix"></div>
                            <div class="col-md-12 divEnglishtestnotTaken">If you have not taken an English proficiency
                                test, how do you rate your English language proficiency?<br>
                                <input class="radIf_not_taken_proficiency_test_rate_your_English_language_proficiency"
                                       name="language_proficiency" type="radio" value="Very Good / Fluent" @if(old('language_proficiency',$data['language_proficiency'] ?? '') == 'Very Good / Fluent') checked @endif> Very
                                Good / Fluent <br>
                                <input name="language_proficiency"
                                       class="radIf_not_taken_proficiency_test_rate_your_English_language_proficiency"
                                       type="radio" value="Moderate to Good" @if(old('language_proficiency',$data['language_proficiency'] ?? '') == 'Moderate to Good') checked @endif> Moderate to Good <br>
                                <input class="radIf_not_taken_proficiency_test_rate_your_English_language_proficiency"
                                       name="language_proficiency" type="radio" value="With difficulty" @if(old('language_proficiency',$data['language_proficiency'] ?? '') == 'With difficulty') checked @endif> With
                                difficulty
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>Do you have any queries ?</strong><br>
                                <textarea id="texComments_and_Questions" name="queries" cols="" rows="4"
                                          class="form-control col-12">{{ old('queries',$data['queries'] ?? '') }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12">I understand that immigration regulations may change at any time. My assessment by the licensed immigration professional will be based on current and prevailing immigration regulations. I wish to start the process of my immigration file:<span class="spanHighlight">*</span><br>
                                <input name="planning_to_start" class="radEducational_Qualification" type="radio" value="Immediately" @if(old('planning_to_start',$data['planning_to_start'] ?? '') == 'Immediately') checked @endif> Immediately after my consultation with the licensed immigration practitioner, if I meet the criteria <br>
                                <input class="radEducational_Qualification" name="planning_to_start" type="radio" value="Not decided yet" @if(old('planning_to_start',$data['planning_to_start'] ?? '') == 'Not decided yet') checked @endif> I have not decided yet and may decide later. <br>
                            </div>
                            <div class="clearfix"></div>

                            <!-- changes done 23-08-2022 -->
                            <br>
                            <div class="col-md-6"><strong>23.</strong> Have you obtained an official assessment of your education by applying for an Education Credentials Assessment (ECA)?<span class="spanHighlight">*</span><br>
                                <input @if(old('have_you_obtained_educational_credentials_assessment',$data['have_you_obtained_educational_credentials_assessment'] ?? '') == 'Yes') checked @endif name="have_you_obtained_educational_credentials_assessment"  class="radAre_you_Currently_In_Canada" type="radio" value="Yes"> Yes
                                <span style="margin-right: 20px;"></span>
                                <input @if(old('have_you_obtained_educational_credentials_assessment',$data['have_you_obtained_educational_credentials_assessment'] ?? '') == 'No') checked @endif class="radAre_you_Currently_In_Canada" name="have_you_obtained_educational_credentials_assessment" type="radio" value="No"> No
                            </div>
                            <div class="clearfix"></div>
                            <br>

                            <!-- end changes -->


                            <br>
                            <div class="col-md-12"><strong>24. I am interested in the following Canada's business immigration / business work permit programs (you can select one or more options)<span class="spanHighlight">*</span></strong><br>
                                <!-- changes done 04-02-2022 -->
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('I have experience in operating my business / have experience as a Senior Manager in a company and wish to start a business in Canada under ‘C-11’ Entrepreneur stream which is LMIA exempt.', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="I have experience in operating my business / have experience as a Senior Manager in a company and wish to start a business in Canada under ‘C-11’ Entrepreneur stream which is LMIA exempt.">
                                I have experience in operating my business / have experience as a Senior Manager in a company and wish to start a business in Canada under ‘C-11’ Entrepreneur stream which is LMIA exempt.<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('My current company is well established outside of Canada and intends to transfer me to Canada by setting up its branch / subsidiary in Canada', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="My current company is well established outside of Canada and intends to transfer me to Canada by setting up its branch / subsidiary in Canada">
                                My current company is well established outside of Canada and intends to transfer me to
                                Canada by setting up its branch / subsidiary in Canada<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('My business, if established in Canada,  can bring economic / social / cultural benefits to Canada and create jobs and economic stimulus.', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="My business, if established in Canada,  can bring economic / social / cultural benefits to Canada and create jobs and economic stimulus.">
                                My business, if established in Canada, can bring economic / social / cultural benefits
                                to Canada and create jobs and economic stimulus.<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('Buy a running business in Canada', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox" value="Buy a running business in Canada"> Buy a running business
                                in Canada<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('Canada Star-Up Visa leading to permanent residence in Canada by bringing  introducing a unique business idea', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="Canada Star-Up Visa leading to permanent residence in Canada by bringing  introducing a unique business idea">
                                Canada Star-Up Visa leading to permanent residence in Canada by bringing introducing a
                                unique business idea<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('I also acknowledge this is not an employment visa or I am not applying for a job based LMIA as a skilled worker.', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="I also acknowledge this is not an employment visa or I am not applying for a job based LMIA as a skilled worker.">
                                I also acknowledge this is not an employment visa or I am not applying for a job based
                                LMIA as a skilled worker.<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('I fully understand that by completing this questionnaire, I am not applying for a job or skilled workers-related LMIA in Canada. I very well understand that this is a Business Immigration / Business related Work Permit assessment form and not for assessing my application as a skilled worker.', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="I fully understand that by completing this questionnaire, I am not applying for a job or skilled workers-related LMIA in Canada. I very well understand that this is a Business Immigration / Business related Work Permit assessment form and not for assessing my application as a skilled worker.">
                                I fully understand that by completing this questionnaire, I am not applying for a job or skilled workers-related LMIA in Canada. I very well understand that this is a Business Immigration / Business related Work Permit assessment form and not for assessing my application as a skilled worker.<br>
                                <br>
                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('My inquiry is serious and pertains to setting up a business through investment in Canada and by completing this questionnaire I  wish to explore business options and opportunities only.', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox"
                                       value="My inquiry is serious and pertains to setting up a business through investment in Canada and by completing this questionnaire I  wish to explore business options and opportunities only.">
                                My inquiry is serious and pertains to setting up a business through investment in Canada
                                and by completing this questionnaire I wish to explore business options and
                                opportunities only.<br>
                                <br>

                                <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('Please ensure to retain the services of a legal Practitioner who is a licensed and accredited member in good standing of the CICC (College of Immigration & Citizenship Consultants, Canada) or an accredited Member of the Canadian Bar Association.
                                ', old('interests',$data['interests'] ?? []))) checked @endif
                                       type="checkbox" value="Please ensure to retain the services of a legal Practitioner who is a licensed and accredited member in good standing of the CICC (College of Immigration & Citizenship Consultants, Canada) or an accredited Member of the Canadian Bar Association.
                                ">
                                Please ensure to retain the services of a legal Practitioner who is a licensed and accredited member in good standing of the CICC (College of Immigration & Citizenship Consultants, Canada) or an accredited Member of the Canadian Bar Association.
                                <br>
                                <br>
                                <p>
                                    Upon reviewing your Business Immigration form and assessing your eligibility under one of Canada’s business immigration programs, if we feel that you qualify under one of them,  our office will invite you for a ‘No-charge’ detailed one-to-one Zoom video discussion with Mr. Anoo Lal, RCIC, a Certified Canadian Immigration Practitioner. This meeting may last between 30 to 60 minutes.
                                    </br></br>
                                    If you would like to proceed further with your application after the discussion, you will be required to pay a File Admin fee of Cad$150. This fee will be fully adjusted in your first installment if you decide to retain services of Just To Canada Immigration Services Group within 30 days from the date of consultation. Please tick the box below that you acknowledge and understand these obligations
                                    </br></br>
                                    <input type="checkbox" name="agree"/> By clicking this box, I acknowledge that a fee of Cad $150 or equivalent towards the File Administration fee shall apply to me if I wish to proceed with my application based on my assessment and interaction with Mr. Lal.
                                </p>
                                <span class="spanHighlight">NOTE:
IT IS ILLEGAL TO HIRE SERVICES OF A NON-LICENSED REPRESENTATIVE WHO POSES TO REPRESENT YOU WITH THE GOVERNMENT OF CANADA.</span>
                                <br>
                                <!-- <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('I would like to consider a Business Franchise in Canada', old('interests',$data['interests'] ?? []))) checked @endif
                                type="checkbox" value="I would like to consider a Business Franchise in Canada">
                         I would like to consider a Business Franchise in Canada<br>
                         <br> -->
                                <!-- <input class="chkCanada_business_immigration_Type" name="interests[]"
                                       @if(in_array('I am open to discuss all the possible options', old('interests',$data['interests'] ?? []))) checked @endif
                                type="checkbox" value="I am open to discuss all the possible options"> I am open
                         to discuss all the possible options.<br>
                         <br>-->
                                <!-- end changes -->

                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <center>
                                <div class="g-recaptcha" data-sitekey="{{config('app.recaptcha_key')}}"></div>
                                <br>
                                <input type="submit" value="Submit" class="btn">
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('businessform', () => ({
                marital_status: '{{ old('marital_status',$data['marital_status'] ?? '') }}',
                visited_in_10_years: '{{ old('visited_in_10_years',$data['visited_in_10_years'] ?? '') }}',
                spouse_have_relatives: '{{ old('spouse_have_relatives',$data['spouse_have_relatives'] ?? '') }}',
                visited_canada: '{{ old('visited_canada',$data['visited_canada'] ?? '') }}',
                visited_in_2: '{{ old('visited_in_2',$data['visited_in_2'] ?? '') }}',
                taken_english_test: '{{ old('taken_english_test',$data['taken_english_test'] ?? '') }}',
                visa_refused: '{{ old('visa_refused',$data['visa_refused'] ?? '') }}',
                init() {
                    this.$watch('visited_canada', value => {
                        if(value === 'No') {
                            this.visited_in_2 = null
                        }
                    })
                }
            }))
        })
    </script>

</x-layouts.frontend>
