<x-layouts.frontend>
    <div id="slider">
        <div id="first-slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <!-- Item 1 -->
                    <div class="item active slide1"> <img src="{{asset('images/banner/seeker.jpg')}}" alt=""> </div>
                </div>
            </div>
        </div>
    </div>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                    <h1 class="welc-text"> Job Seeker  </h1>
                    <br>
                </div>
                <div class="form-div">
                    <form class="text-left row-20 ng-pristine ng-valid" action="{{ route('job-seeker.store') }}" method="post" enctype="multipart/form-data" name="contactus" id="contactus" accept-charset="UTF-8">
                        <input type="hidden" name="submitted" id="submitted" value="1">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4>Job Seeker – Profile Input Screen</h4>
                        <br>
                        <div class="form-inner">
                            <div class="col-md-6">Full Name<span class="spanHighlight">*</span>   <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="full_name" value="{{ old('full_name') }}"></div>
                            <div class="col-md-6">Short Name <span class="spanHighlight">*</span> (Initials in 2 letters)  <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="short_name" value="{{ old('short_name') }}"></div>
                            <div class="col-md-6">Citizen of: <span class="spanHighlight">*</span>   <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="citizen" value="{{ old('citizen') }}"></div>
                            <div class="col-md-6">Currently residing in  <span class="spanHighlight">*</span>   <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="current_residence" value="{{ old('current_residence') }}"></div>
                            <div class="col-md-6">E-mail<span class="spanHighlight">*</span> <input id="txtEmail" type="email" class="form-control col-12" maxlength="40" name="email" value="{{ old('email') }}"></div>
                            <div class="col-md-6">Tel # <span class="spanHighlight">*</span> <br>
                                <!-- <input id="txtTelephone" type="text" class="form-control col-12" style="width:20%; margin-right:5%; float:left;" placeholder="+91"  maxlength="40" name="country and area code" /> -->
                                <input id="txtTelephone" type="text" class="form-control col-12" style="" placeholder="000-000-0000" maxlength="40" name="phone" value="{{ old('phone') }}"></div>
                            <div class="col-md-4">Current Occupation:  <span class="spanHighlight">*</span>   <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="current_occupation" value="{{ old('current_occupation') }}"></div>
                            <div class="col-md-4">Years of experience:   <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="current_years_of_experience" value="{{ old('current_years_of_experience') }}">
                            </div>
                            <div class="col-md-4">In (country)  <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="country" value="{{ old('country') }}">
                            </div>
                            <div class="col-md-6">Previous Occupation: <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="previous_occupation" value="{{ old('previous_occupation') }}">
                            </div>
                            <div class="col-md-6">Years of experience:  <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="previous_years_of_experience" value="{{ old('previous_years_of_experience') }}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">Have you taken IELTS / CELPIP English proficiency test? <span class="spanHighlight">*</span><br>
                                <input name="taken_proficiency_test" class="" type="radio" value="Yes" @if(old('taken_proficiency_test') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                <input class="" name="taken_proficiency_test" type="radio" value="No" @if(old('taken_proficiency_test') == 'No') checked @endif> No &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">If yes, please upload your latest scorecard here  <span class="spanHighlight">*</span>
                                <input type="file" name="score_card"></div>
                            <div class="col-md-6">If Not, how do you rate your English language proficiency: <br>
                                <input name="rate_english" class=" " type="radio" value="Good" @if(old('rate_english') == 'Good') checked @endif> Good  &nbsp;&nbsp;
                                <input class=" " name="rate_english" type="radio" value="Fair" @if(old('rate_english') == 'Fair') checked @endif> Fair &nbsp;&nbsp;
                                <input class=" " name="rate_english" type="radio" value="With Difficulty" @if(old('rate_english') == 'With Difficulty') checked @endif> With Difficulty &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-6">Have you obtained Education Credentials Assessment (ECA) for Canada?  <span class="spanHighlight">*</span><br>
                                <input name="obtained_eca" class=" " type="radio" value="Yes" @if(old('obtained_eca') == 'Yes') checked @endif> Yes &nbsp;&nbsp;
                                <input class=" " name="obtained_eca" type="radio" value="No" @if(old('obtained_eca') == 'No') checked @endif> No &nbsp;&nbsp; </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">If Yes, please upload your ECA report here  <span class="spanHighlight">*</span>
                                <input type="file" name="eca_report">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-6">Which countries have you served in  <span class="spanHighlight">*</span>
                                <input id="" type="text" class="form-control col-12" maxlength="40" name="countries_served" value="{{old('countries_served')}}">
                            </div>
                            <div class="col-md-6">How did you obtain our reference?  <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="reference" value="{{old('reference')}}">
                            </div>
                            <div class="col-md-12">Describe about yourself in 100 words: <span class="spanHighlight">*</span>
                                <textarea id=" " name="describe" cols="" rows="4" class="form-control">{{old('describe')}}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">Upload your resume here:   <span class="spanHighlight">*</span> (word / pdf/ jpg)
                                <input name="resume" type="file">
                            </div>
                            <div class="col-md-6">Upload your current picture here:   <span class="spanHighlight">*</span>
                                <input name="profile_pic" type="file">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-6">Upload your 30 secs introduction video shot on a cell phone.<span class="spanHighlight">*</span>
                                <input name="intro_video" type="file">
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="col-md-12">Please introduce yourself briefly in English, indicating your skills, experience, and accomplishments.</div>
                            <div class="clearfix"></div>
                            <br>
                            <center>
                                <div class="g-recaptcha" data-sitekey="6LdsV6wdAAAAAKDXPJl1NPRQmOhCzuGMWMEt50v7"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfdOBAdAAAAAJDLvl34HfmepwpwzrE-0wh09EFg&amp;co=aHR0cHM6Ly9qdXN0MmNhbmFkYS5jYTo0NDM.&amp;hl=en&amp;v=g8G8cw32bNQPGUVoDvt680GA&amp;size=normal&amp;cb=76y24hp75h73" width="304" height="78" role="presentation" name="a-fws6wlcjd6wl" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                                <br>
                                <input type="submit" value="Submit" class="btn">
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
