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
                        <input type="hidden" name="step" id="submitted" value="3">
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
                            <div class="col-md-12"><strong>11.</strong> Do you have your educational documents to prove your education identified above?<span class="spanHighlight">*</span><br>
                                <input @if(old('have_your_educational_documents_to_prove',$data['have_your_educational_documents_to_prove'] ?? '') == 'Yes') checked @endif name="have_your_educational_documents_to_prove" type="radio" value="Yes"> Yes
                                <span style="margin-right: 20px;"></span>
                                <input @if(old('have_your_educational_documents_to_prove',$data['have_your_educational_documents_to_prove'] ?? '') == 'No') checked @endif name="have_your_educational_documents_to_prove" type="radio" value="No"> No </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>12.</strong> Have you been ordered to leave Canada or any other country?<span
                                    class="spanHighlight">*</span><br>
                                <input class="radHave_you_been_ordered_to_leave_Canada_or_any_other_country"
                                       name="leave_canada" type="radio" value="Yes" @if(old('leave_canada',$data['leave_canada'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_been_ordered_to_leave_Canada_or_any_other_country"
                                       name="leave_canada" type="radio" value="No" @if(old('leave_canada',$data['leave_canada'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>13.</strong> Have you ever committed, been arrested for, or been charged with any
                                offense in any country, including driving under the influence of alcohol or drugs?<span
                                    class="spanHighlight">*</span><br>
                                <input
                                    class="radHave_you_ever_committed_been_arrested_for_or_been_charged_with_any_offense_in_any_country"
                                    name="arrested" type="radio" value="Yes" @if(old('arrested',$data['arrested'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input
                                    class="radHave_you_ever_committed_been_arrested_for_or_been_charged_with_any_offense_in_any_country"
                                    name="arrested" type="radio" value="No" @if(old('arrested',$data['arrested'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>14.</strong> Have you ever been in the military (including mandatory service), a
                                militia, or a civil defense unit or the police?<span class="spanHighlight">*</span><br>
                                <input class="radHave_you_ever_been_in_the_military_including_mandatory_service_a_militia_or_a_civil_defense_unit_or_the_police"
                                       name="in_military"
                                       type="radio" value="Yes" @if(old('in_military',$data['in_military'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_ever_been_in_the_military_including_mandatory_service_a_militia_or_a_civil_defense_unit_or_the_police"
                                       name="in_military"
                                       type="radio" value="No" @if(old('in_military',$data['in_military'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>15.</strong> Have you ever been employed by a government in a security-related
                                capacity?<span class="spanHighlight">*</span><br>
                                <input class="radHave_you_ever_been_employed_by_a_government_in_a_security_related_capacity"
                                       name="employed_in_security" type="radio" value="Yes" @if(old('employed_in_security',$data['employed_in_security'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_ever_been_employed_by_a_government_in_a_security_related_capacity"
                                       name="employed_in_security" type="radio" value="No" @if(old('employed_in_security',$data['employed_in_security'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>16.</strong> Have you visited other countries within the last 10 years?<span
                                    class="spanHighlight">*</span><br>
                                <input class="radHave_you_visited_other_countries_within_the_last_10_years"
                                       name="visited_in_10_years" type="radio" x-model="visited_in_10_years" value="Yes" @if(old('visited_in_10_years',$data['visited_in_10_years'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_visited_other_countries_within_the_last_10_years"
                                       name="visited_in_10_years" type="radio" x-model="visited_in_10_years" value="No" @if(old('visited_in_10_years',$data['visited_in_10_years'] ?? '') == 'No') checked @endif> No
                            </div>
                            <template x-if="visited_in_10_years == 'Yes'">
                                <div class="col-md-12 divListofcountriesvisited">
                                    If Yes, please type the countries below (comma separated)
                                    <textarea id="txtlist_of_countries_visited" name="visited_countries" cols="" rows="4" class="form-control col-12">{{ old('visited_countries',$data['visited_countries'] ?? '') }}</textarea>
                                </div>
                            </template>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>17.</strong> Do you or your spouse have blood relatives in Canada<span
                                    class="spanHighlight">*</span><br>
                                <input x-model="spouse_have_relatives" name="spouse_have_relatives" type="radio" value="Yes" @if(old('spouse_have_relatives',$data['spouse_have_relatives'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input x-model="spouse_have_relatives" name="spouse_have_relatives" type="radio" value="No" @if(old('spouse_have_relatives',$data['spouse_have_relatives'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <template x-if="spouse_have_relatives == 'Yes'">
                                <div class="col-md-12 divProvincerelativesReside">If yes, please state the province they reside in (you can select more than one)<span class="spanHighlight">*</span><br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state[]" type="checkbox"
                                           @if(in_array('British Columbia', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="British Columbia"> British Columbia <br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state[]" type="checkbox"
                                           @if(in_array('Alberta', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Alberta"> Alberta <br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state[]" type="checkbox"
                                           @if(in_array('Saskatchewan', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Saskatchewan"> Saskatchewan <br>
                                    <input name="spouse_relative_state[]"
                                           class="radIf_yes_State_the_province_they_reside" type="checkbox"
                                           @if(in_array('Manitoba', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Manitoba"> Manitoba <br>
                                    <input name="spouse_relative_state[]"
                                           class="radIf_yes_State_the_province_they_reside" type="checkbox"
                                           @if(in_array('Ontario', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Ontario"> Ontario <br>
                                    <input name="spouse_relative_state[]"
                                           class="radIf_yes_State_the_province_they_reside" type="checkbox"
                                           @if(in_array('Quebec', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Quebec"> Quebec <br>
                                    <input name="spouse_relative_state[]"
                                           class="radIf_yes_State_the_province_they_reside" type="checkbox"
                                           @if(in_array('Nova Scotia', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Nova Scotia"> Nova Scotia <br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state[]" type="checkbox"
                                           @if(in_array('New Brunswick', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="New Brunswick"> New Brunswick <br>
                                    <input name="spouse_relative_state[]"
                                           class="radIf_yes_State_the_province_they_reside" type="checkbox"
                                           @if(in_array('Prince Edward Island', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Prince Edward Island"> Prince Edward Island <br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state[]" type="checkbox"
                                           @if(in_array('Newfoundland', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="Newfoundland &amp; Labrador"> Newfoundland &amp; Labrador <br>
                                    <input class="radIf_yes_State_the_province_they_reside"
                                           name="spouse_relative_state]" type="checkbox"
                                           @if(in_array('My spouse or myself do not have any blood relatives residing in Canada', old('spouse_relative_state',$data['spouse_relative_state'] ?? []))) checked @endif
                                           value="My spouse or myself do not have any blood relatives residing in Canada"> My spouse or myself do not have any blood relatives residing in Canada
                                </div>
                            </template>
                            <div class="clearfix"></div>
                            <br>
                            <center>
                                <div class="g-recaptcha" data-sitekey="{{config('app.recaptcha_key')}}"></div>
                                <br>
                                <input type="submit" value="Continue" class="btn">
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
