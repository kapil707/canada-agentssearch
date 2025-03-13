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
                    <form class="text-left   row-20 ng-pristine ng-valid" action="{{ Auth::guard('visitor')->check() ? route('business-immigration.update') : route('business-immigration.store') }}" method="POST" enctype="multipart/form-data" id="contactus"  accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="submitted" id="submitted" value="1">
                        <input type="hidden" name="step" value="1">
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
                            <div class="col-md-8"><strong>1.</strong> Please select which experience pertains to you? You may select more than one selection if it pertains to you<span class="spanHighlight">*</span><br>
                                <input class="chkExperience" name="experience[]" type="checkbox" value="Business Person" @if(in_array('Business Person',old('experience',$data['experience'] ?? []))) checked @endif> Business Person <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="Senior Manager" @if(in_array('Senior Manager',old('experience',$data['experience'] ?? []))) checked @endif> Senior Manager <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="Self Employed / Art and Entertainment Professional" @if(in_array('Self Employed / Art and Entertainment Professional',old('experience',$data['experience'] ?? []))) checked @endif> Self Employed / Art and Entertainment Professional <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="I am a professional and am willing to invest in a business in Canada" @if(in_array('I am a professional and am willing to invest in a business in Canada',old('experience',$data['experience'] ?? []))) checked @endif> I am a professional and am willing to invest in a business in Canada <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="Skilled Work" @if(in_array('Skilled Work',old('experience',$data['experience'] ?? []))) checked @endif> Skilled Work <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="Student" @if(in_array('Student',old('experience',$data['experience'] ?? []))) checked @endif> Student <br>
                                <input name="experience[]" class="chkExperience" type="checkbox" value="Other" @if(in_array('Other',old('experience',$data['experience'] ?? []))) checked @endif> Other <br>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-6"><strong>2.</strong> Full Name
                                <span class="spanHighlight">*</span> (As per your Passport)
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="name" value="{{ old('name',$data['name'] ?? '') }}">
                            </div>
                            <div class="col-md-6">E-mail<span class="spanHighlight">*</span>
                                <input id="txtEmail" type="email" class="form-control col-12" maxlength="40" name="email" value="{{ old('email',$data['email'] ?? '') }}"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">Phone Number (with country and area code)<span class="spanHighlight">*</span> <br>
                                <input id="txtTelephone" type="text" class="form-control col-12" style="" placeholder="000-000-0000" maxlength="40" name="phone" value="{{ old('phone',$data['phone'] ?? '') }}">
                            </div>
                            <div class="col-md-6">What is your current country of residence?<span class="spanHighlight">*</span>
                                <select id="txtCountry" class="form-control col-12" name="country">
                                    <option value="0">--Select--</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->name}}" @if(old('country',$data['country'] ?? '') == $country->name) selected @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">What is your current city of residence?<span class="spanHighlight">*</span>
                                <input id="txtNationality" type="text" class="form-control col-12" maxlength="40" name="city_of_residence" value="{{ old('city_of_residence',$data['city_of_residence'] ?? '') }}">
                            </div>
                            <div class="col-md-6">What is your nationality?<span class="spanHighlight">*</span>
                                <input id="txtNationality" type="text" class="form-control col-12" maxlength="40" name="nationality" value="{{ old('nationality',$data['nationality'] ?? '') }}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">How did you obtain our reference? (optional)<span class="spanHighlight"></span>
                                <input id="txtReference" type="text" class="form-control col-12" maxlength="40"  name="reference" value="{{ old('reference',$data['reference'] ?? '') }}"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-4"><strong>3.</strong> Date of Birth of Principal Applicant<span class="spanHighlight">*</span>
                                <input id="txtDate_of_birth_of_Principal_Applicant" type="date" class="form-control col-12" maxlength="40" name="dob" value="{{ old('dob',$data['dob'] ?? '') }}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12"><strong>4.</strong> Marital Status<span class="spanHighlight">*</span><br>
                                <input class="radMarital_status" name="marital_status" x-model="marital_status" type="radio" value="Married" @if(old('marital_status',$data['marital_status'] ?? '') == 'Married') checked @endif> Married <br>
                                <input class="radMarital_status" name="marital_status" x-model="marital_status" type="radio" value="Divorced" @if(old('marital_status',$data['marital_status'] ?? '') == 'Divorced') checked @endif> Divorced <br>
                                <input class="radMarital_status" name="marital_status" x-model="marital_status" type="radio" value="Legally Separated" @if(old('marital_status',$data['marital_status'] ?? '') == 'Legally Separated') checked @endif> Legally Separated <br>
                                <input class="radMarital_status" name="marital_status" x-model="marital_status" type="radio" value="Never Married"  @if(old('marital_status',$data['marital_status'] ?? '') == 'Never Married') checked @endif> Never Married
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <template x-if="marital_status && marital_status == 'Married'">
                                <div>
                                    <div class="col-md-4 divIfmarried">Your Spouse's Date of Birth
                                        <input id="txtSpouse_Date_Of_Birth" type="date" class="form-control col-12" maxlength="40" name="spouse_dob" value="{{ old('spouse_dob',$data['spouse_dob'] ?? '') }}">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 divIfmarried">Your spouse’s experience?<br>
                                        <input name="spouse_experience" class="radSpouse_Experience" type="radio" value="Work Experience as a Business person" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'Work Experience as a Business person') checked @endif> Work Experience as a Business person <br>
                                        <input class="radSpouse_Experience" name="spouse_experience" type="radio" value="Work Experience as a Skilled Worker" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'Work Experience as a Skilled Worker') checked @endif> Work Experience as a Skilled Worker
                                        <input class="radSpouse_Experience" name="spouse_experience" type="radio" value="Not employed currently" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'Not employed currently') checked @endif> Not employed currently <br>
                                        <input class="radSpouse_Experience" name="spouse_experience" type="radio" value="Never employed" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'Never employed') checked @endif> Never employed <br>
                                        <input class="radSpouse_Experience" name="spouse_experience" type="radio" value="Homemaker" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'Homemaker') checked @endif> Homemaker <br>
                                        <input name="spouse_experience" class="radSpouse_Experience" type="radio" value="NA" @if(old('spouse_experience',$data['spouse_experience'] ?? '') == 'NA') checked @endif> NA
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </template>
                            <template x-if="marital_status && marital_status !== 'Never Married'">
                                <div class="col-md-4 divIfmarried divChildren">How many children do you have?<span class="spanHighlight">*</span>
                                    <select id="txtHow_many_Children" class="form-control col-12" name="no_of_children">
                                        <option value="0"  @if(old('no_of_children',$data['no_of_children'] ?? '') == '0') selected @endif>0</option>
                                        <option value="1" @if(old('no_of_children',$data['no_of_children'] ?? '') == '1') selected @endif>1</option>
                                        <option value="2" @if(old('no_of_children',$data['no_of_children'] ?? '') == '2') selected @endif>2</option>
                                        <option value="3" @if(old('no_of_children',$data['no_of_children'] ?? '') == '3') selected @endif>3</option>
                                        <option value="4" @if(old('no_of_children',$data['no_of_children'] ?? '') == '4') selected @endif>4</option>
                                        <option value="5" @if(old('no_of_children',$data['no_of_children'] ?? '') == '5') selected @endif>5</option>
                                        <option value="6" @if(old('no_of_children',$data['no_of_children'] ?? '') == '6') selected @endif>6</option>
                                        <option value="7" @if(old('no_of_children',$data['no_of_children'] ?? '') == '7') selected @endif>7</option>
                                        <option value="8" @if(old('no_of_children',$data['no_of_children'] ?? '') == '8') selected @endif>8</option>
                                        <option value="9" @if(old('no_of_children',$data['no_of_children'] ?? '') == '9') selected @endif>9</option>
                                        <option value="10" @if(old('no_of_children',$data['no_of_children'] ?? '') == '10') selected @endif>10</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>




                                <div class="col-md-12 divIfmarried divChildren">Do you have children less than 22 years of age? You can include them in your PR application<span class="spanHighlight">*</span><br>
                                    <input class="radDo_you_have_Children_less_than_22_years_of_age " name="children_lt_20" type="radio" value="Yes" @if(old('children_lt_20',$data['children_lt_20'] ?? '') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                    <input class="radDo_you_have_Children_less_than_22_years_of_age" name="children_lt_20" type="radio" value="No" @if(old('children_lt_20',$data['children_lt_20'] ?? '') == 'No') checked @endif> No &nbsp;&nbsp;
                                    <br><br>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 divIfmarried divChildren">Do you have children enrolled in accredited Canadian education institution/s and are actively pursuing academic, professional or vocational training on a full-time basis? <span class="spanHighlight">*</span><br>
                                    <input
                                        class="radDo_you_have_children_enrolled_in_accredited_Canadian_education_institutions"
                                        name="children_enrolled" type="radio"
                                        value="Yes" @if(old('children_enrolled',$data['children_enrolled'] ?? '') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                    <input
                                        class="radDo_you_have_children_enrolled_in_accredited_Canadian_education_institutions"
                                        name="children_enrolled" type="radio"
                                        value="No" @if(old('children_enrolled',$data['children_enrolled'] ?? '') == 'No') checked @endif> No &nbsp;&nbsp; <br> <br></div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 divIfmarried divChildren">Do you have any of your children who are Canadian citizens or permanent residents of Canada? <span class="spanHighlight">*</span><br>
                                    <input class="radDo_you_have_any_of_your_children_who_are_Canadian_citizens_or_permanent_residents_of_Canada"
                                           name="children_canadian" type="radio"
                                           value="Yes" @if(old('children_canadian',$data['children_canadian'] ?? '') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                    <input class="radDo_you_have_any_of_your_children_who_are_Canadian_citizens_or_permanent_residents_of_Canada"
                                           name="children_canadian" type="radio"
                                           value="No" @if(old('children_canadian',$data['children_canadian'] ?? '') == 'No') checked @endif> No &nbsp;&nbsp; <br> <br></div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 divIfmarried divChildren">Do you, your spouse
                                    or your children have a physical or mental disorder that requires medical
                                    attention?<span class="spanHighlight">*</span><br>
                                    <input class="radDo_you_your_spouse_or_your_children_have_a_physical_or_mental_disorder"
                                           name="spouse_children_mental"
                                           type="radio" value="Yes" @if(old('spouse_children_mental',$data['spouse_children_mental'] ?? '') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                    <input class="radDo_you_your_spouse_or_your_children_have_a_physical_or_mental_disorder"
                                           name="spouse_children_mental"
                                           type="radio" value="No" @if(old('spouse_children_mental',$data['spouse_children_mental'] ?? '') == 'No') checked @endif> No &nbsp;&nbsp; <br> <br>
                                </div>
                            </template>
                            <div class="clearfix"></div>

                            <template x-if="marital_status && marital_status !== 'Never Married'">
                                <!-- changes done 23-08-2022 -->
                                <div id="txtChildrenage" class="col-md-4">How old are your children? <span class="spanHighlight">*</span>  <input value="{{old('children_age',$data['children_age'] ?? '')}}"  type="text" class="form-control col-12"  name="children_age" /></div>
                            </template>

                            <div class="clearfix"></div>
                            <template x-if="marital_status && marital_status !== 'Never Married'">
                                <div id="is_children_on_study_permit" class="col-md-6"> Are any of your children studying in Canada at this time on a study permit?<span class="spanHighlight">*</span><br>
                                    <input  name="is_children_on_study_permit" @if(old('is_children_on_study_permit',$data['is_children_on_study_permit'] ?? '') == 'Yes') checked @endif class="radAre_you_Currently_In_Canada" type="radio" value="Yes">Yes
                                    <input @if(old('is_children_on_study_permit',$data['is_children_on_study_permit'] ?? '') == 'No') checked @endif  name="is_children_on_study_permit"  class="radAre_you_Currently_In_Canada" name=" " type="radio" value="No">No &nbsp;&nbsp; </div>
                            </template>
                            <div class="clearfix"></div>

                            <!-- end changes -->
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
