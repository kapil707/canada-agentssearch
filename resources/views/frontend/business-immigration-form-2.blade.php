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
                        <input type="hidden" name="step" id="submitted" value="2">
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
                            <div class="col-md-6"><strong>5.</strong> Are you currently in Canada ?<span class="spanHighlight">*</span>
                                <br>
                                <input name="in_canada" class="radAre_you_Currently_In_Canada" type="radio" value="Yes" @if(old('in_canada',$data['in_canada'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radAre_you_Currently_In_Canada" name="in_canada" type="radio" value="No" @if(old('in_canada',$data['in_canada'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <!-- changes done 23-08-2022 -->
                            <br>
                            <div class="col-md-6"><strong>6.</strong> Did you ever visit Canada?<span class="spanHighlight">*</span><br>
                                <input name="Did_you_ever_visit_Canada" @if(old('Did_you_ever_visit_Canada',$data['Did_you_ever_visit_Canada'] ?? '') == 'Yes') checked @endif  class="radDid_you_ever_visit_Canada" type="radio" value="Yes"> Yes
                                <span style="margin-right: 20px;"></span>
                                <input @if(old('Did_you_ever_visit_Canada',$data['Did_you_ever_visit_Canada'] ?? '') == 'No') checked @endif class="radDid_you_ever_visit_Canada" name="Did_you_ever_visit_Canada" type="radio" value="No"> No</div>
                            <div class="clearfix"></div>
                            <br>

                            <div id="divIfyesVisitinCanada" class="col-md-4">If Yes, when? <span class="spanHighlight">*</span>  <input  value="{{old('if_yes_visited_canada_when',$data['if_yes_visited_canada_when'] ?? '')}}" type="date" class="form-control col-12"  name="if_yes_visited_canada_when" /></div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-9"><strong>7.</strong> Is your Canadian Temporary Residence Visa or any other visa currently valid?<span class="spanHighlight">*</span><br>
                                <input name="is_currently_have_valid_visa"  @if(old('is_currently_have_valid_visa',$data['is_currently_have_valid_visa'] ?? '') == 'Yes') checked @endif  class="Txtis_currently_have_valid_visa" type="radio" value="Yes"> Yes
                                <span style="margin-right: 20px;"></span>
                                <input @if(old('is_currently_have_valid_visa',$data['is_currently_have_valid_visa'] ?? '') == 'No') checked @endif  class="Txtis_currently_have_valid_visa" name="is_currently_have_valid_visa" type="radio" value="No"> No</div>
                            <div class="clearfix"></div>
                            <br>

                            <div id="divIfyesis_currently_have_valid_visa" class="col-md-4">If yes, till when? <span class="spanHighlight">*</span>  <input  value="{{old('your_current_visa_validity',$data['your_current_visa_validity'] ?? '')}}"  type="date" class="form-control col-12"  maxlength="40" name="your_current_visa_validity" /></div>
                            <div class="clearfix"></div>
                            <br>
                            <!-- end changes -->
                            <div class="col-md-12"><strong>8.</strong> What area of business or management experience have you acquired in the past 10 years (you can select more than one option)<span class="spanHighlight">*</span><br>
                                <input class="radArea_of_business" name="area_of_business[]" type="checkbox" value="Manufacturing / trading"  @if(in_array('Manufacturing / trading',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Manufacturing / trading <br>
                                <input name="area_of_business[]" type="checkbox" class="radArea_of_business" value="Only trading / Import / Export" @if(in_array('Only trading / Import / Export',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Only trading / Import / Export <br>
                                <input name="area_of_business[]" type="checkbox" class="radArea_of_business" value="Project work (builder / Construction etc)" @if(in_array('Project work (builder / Construction etc)',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Project work (builder / Construction etc) <br>
                                <input name="area_of_business[]" type="checkbox" class="radArea_of_business" value="Wholesale / Retail establishment" @if(in_array('Wholesale / Retail establishment',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Wholesale / Retail establishment <br>
                                <input name="area_of_business[]" class="radArea_of_business" type="checkbox" value="Information Technology" @if(in_array('Information Technology',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Information Techlology <br>
                                <input name="area_of_business[]" type="checkbox" class="radArea_of_business" value="Consulting" @if(in_array('Consulting',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Consulting <br>
                                <input name="area_of_business[]" class="radArea_of_business" type="checkbox" value="Other" @if(in_array('Other',old('area_of_business',$data['area_of_business'] ?? []))) checked @endif> Other <br>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12">Briefly describe product/commodity you deal in your business<span class="spanHighlight">*</span>
                                <textarea id="texProduct_Description" name="product_description" cols="" rows="4" class="form-control">{{ old('product_description', $data['product_description'] ?? '') }}</textarea>
                            </div>

                            <div class="clearfix"></div>
                            <br>
                            <!--
                            <div class="col-md-12"><strong>9.</strong> Certain business immigration programs allow two applicants to apply for permanent residence in Canada for the same project as long as both of the respective applicants meet the qualifying criteria of the program. Would you consider two applicants to apply under the entrepreneur stream in the same application?
                                <br>
                                <input class="" name="apply_same" type="radio" value="Yes" @if(old('apply_same', $data['apply_same'] ?? '') == 'Yes') checked @endif> Yes &nbsp;&nbsp;&nbsp;
                                <input class="" name="apply_same" type="radio" value="No, not applicable to me" @if(old('apply_same', $data['apply_same'] ?? '') == 'No, not applicable to me') checked @endif> No, not applicable to me
                            </div>
                            -->
                            <div class="col-md-12"><strong>9.</strong> Please enter your business website address<span class="spanHighlight">*</span>
                                <input id="" type="text" class="form-control col-12" maxlength="200" name="website_address" value="{{ old('website_address', $data['website_address'] ?? '') }}">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12">Do you intend to open a branch / subsidiary office of your existing business in Canada and would you or key personnel from your office transfer to Canada under the Intra Company Transfer (ICT)  program?<span
                                    class="spanHighlight">*</span><br>
                                <input class="radHave_you_been_ordered_to_leave_Canada_or_any_other_country"
                                       name="intend_to_open_branch" type="radio" value="Yes" @if(old('intend_to_open_branch', $data['intend_to_open_branch'] ?? '') == 'Yes') checked @endif> Yes
                                <span style="margin-right: 20px;"></span>
                                <input class="radHave_you_been_ordered_to_leave_Canada_or_any_other_country"
                                       name="intend_to_open_branch" type="radio" value="No" @if(old('intend_to_open_branch', $data['intend_to_open_branch'] ?? '') == 'No') checked @endif> No
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-4">
                                If yes, how many people are employed in your business outside Canada
                                <input id=""
                                       name="how_many_employed" type="text"
                                       class="form-control" value="{{ old('how_many_employed', $data['how_many_employed'] ?? '') }}">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12"><strong>10.</strong> What is your education qualification?<span class="spanHighlight">*</span><br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Post graduate" @if(old('qualification',$data['qualification'] ?? '') == 'Post graduate') checked @endif> Post graduate <br>
                                <input name="qualification" class="radEducational_Qualification" type="radio" value="Bachelors degree (15 years of education)" @if(old('qualification',$data['qualification'] ?? '') == 'Bachelors degree (15 years of education)') checked @endif> Bachelors degree (15 years of education) <br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Did not complete Bachelors degree" @if(old('qualification',$data['qualification'] ?? '') == 'Did not complete Bachelors degree') checked @endif> Did not complete Bachelors degree <br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Grade 12 education with at least one year diploma / certificate" @if(old('qualification',$data['qualification'] ?? '') == 'Grade 12 education with at least one year diploma / certificate') checked @endif> Grade 12 education with at least one year diploma / certificate <br>
                                <input name="qualification" class="radEducational_Qualification" type="radio" value="Grade 12 (Secondary school) completed" @if(old('qualification',$data['qualification'] ?? '') == 'Grade 12 (Secondary school) completed') checked @endif> Grade 12 (Secondary school) completed <br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Grade 10 completed" @if(old('qualification',$data['qualification'] ?? '') == 'Grade 10 completed') checked @endif> Grade 10 completed <br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Grade 10 not completed" @if(old('qualification',$data['qualification'] ?? '') == 'Grade 10 not completed') checked @endif> Grade 10 not completed <br>
                                <input class="radEducational_Qualification" name="qualification" type="radio" value="Other" @if(old('qualification',$data['qualification'] ?? '') == 'Other') checked @endif> Other &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>

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
