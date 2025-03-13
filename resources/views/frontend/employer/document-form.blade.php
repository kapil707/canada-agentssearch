<x-layouts.frontend>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                    <h1 class="welc-text"> Employer Document  Information   </h1>
                    <br>
                </div>
                <div class="form-div">
                    <form class="text-left   row-20 ng-pristine ng-valid" action="{{route('employer.document-form.post')}}" method="post" enctype="multipart/form-data" name="contactus" id="contactus" accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="submitted" id="submitted" value="1">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4>BUSINESS INFORMATION</h4>
                        <br>
                        <div class="form-inner">
                            <div class="col-md-12">1.Canada Revenue Agency Payroll deductions program account number (15 digits) **For employers with multiple locations please
                                confirm that the payroll number is applicable for the location where the TFW's will be located** <span class="spanHighlight">*</span>
                                <input type="text" class="form-control col-12" maxlength="40" name="crapdpan" value="{{old('crapdpan')}}">
                            </div>
                            <div class="col-md-12">2.Business Legal Name (as registered with CRA) <span class="spanHighlight">*</span>
                                <input id=" " type="text" class="form-control col-12" maxlength="40" name="business_legal_name" value="{{old('business_legal_name')}}">
                            </div>
                            <div class="col-md-12">3.Business Address (as registered with CRA) (Street Address, City, Province, Postal Code) <span class="spanHighlight">*</span>
                                <input id=" " type="text" class="form-control col-12" maxlength="250" name="business_address" value="{{old('business_address')}}">
                            </div>
                            <p class="clearfix"></p>
                        </div>
                        <h4>EMPLOYER CONTACT INFORMATION</h4>
                        <div class="form-inner">
                            <div class="col-md-12">1.Principle Employer Contact Information (This person must be the employer or been an employee of the employer) <span class="spanHighlight">*</span>
                                <input id=" " type="text" class="form-control col-12" maxlength="40" name="principle_contact_info" value="{{old('principle_contact_info')}}">
                            </div>
                            <div class="col-md-6">2. First Name, Middle Name, Last Name<span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="name" value="{{old('name')}}"></div>
                            <div class="col-md-6">3. Job Title<span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="job_title" value="{{old('job_title')}}">
                            </div>
                            <div class="col-md-6">4. Telephone Number<span class="spanHighlight">*</span> <br>
                                <!-- <input id="txtTelephone" type="text" class="form-control col-12" style="width:20%; margin-right:5%; float:left;" placeholder="+91"  maxlength="40" name="country and area code" /> -->
                                <input id="txtTelephone" type="text" class="form-control col-12" style="" placeholder="000-000-0000" maxlength="40" name="phone" value="{{old('phone')}}"></div>
                            <div class="col-md-6">5. Email Address<span class="spanHighlight">*</span> <input id="txtEmail" type="email" class="form-control col-12" maxlength="40" name="email" value="{{old('email')}}"></div>
                            <div class="clearfix"></div>
                        </div>


                        <h4>LABOUR MARKET IMPACTS</h4>
                        <div class="form-inner">
                            <div class="col-md-12">1.How many employees are employed nationally under the employer’s 9-digit CRA business number? <span class="spanHighlight">*</span>
                                <input id=" " type="text" class="form-control col-12" maxlength="40" name="no_of_employees" value="{{old('no_of_employees')}}">
                            </div>
                            <div class="col-md-12">2.Did the business report more than $5 million (CAD) in annual gross revenue to CRA during its last tax year? <span class="spanHighlight">*</span><br>
                                <input name="more_than_5_million" class=" " type="radio" value="Yes" @if(old('more_than_5_million') == 'Yes') selected @endif> Yes &nbsp;&nbsp;
                                <input class="" name="more_than_5_million" type="radio" value="No" @if(old('more_than_5_million') == 'No') selected @endif> No &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12">3.In the last 12 months, did the employer lay off any employees working in the position(s) being requested in this application? <span class="spanHighlight">*</span><br>
                                <input name="lay_off_last_12" class=" " type="radio" value="Yes" @if(old('lay_off_last_12') == 'Yes') selected @endif> Yes &nbsp;&nbsp;
                                <input class=" " name="lay_off_last_12" type="radio" value="No" @if(old('lay_off_last_12') == 'No') selected @endif> No &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12">4.If yes, how many Canadians/permanent residents? How many TFWs? Provide reason(s) for the layoff(s)  <span class="spanHighlight">*</span>
                                <input id="txtName" type="text" class="form-control col-12" maxlength="40" name="no_of_canadians" value="{{old('no_of_canadians')}}">
                            </div>
                            <p class="clearfix"></p>
                        </div>
                        <h4>DOCUMENTATION CHECKLIST - HIGH WAGE POSITION</h4>
                        <div class="form-inner">
                            The requirement for additional supporting documents to demonstrate that your business and job offer are legitimate is dependent on
                            your history with the Temporary Foreign Worker (TFW) Program and the type of LMIA application you are submitting.
                            <br>
                            <br>
                            To find out if you are required to submit business legitimacy documentation, please <strong>SELECT CONFIRM THE FOLLOWING:</strong>
                            <div class="col-md-8">I have received a positive LMIA decision in the past two years;  &nbsp;&nbsp;
                                <input name="positive_lmia_past_2" class=" " type="radio" value="Yes" @if(old('positive_lmia_past_2') == 'Yes') selected @endif> Yes  &nbsp;&nbsp;
                                <input class=" " name="positive_lmia_past_2" type="radio" value="No" @if(old('positive_lmia_past_2') == 'No') selected @endif> No &nbsp;&nbsp;
                            </div>

                            <div class="col-md-8">My most recent LMIA decision was positive &nbsp;&nbsp;
                                <input name="last_limia_positive" class=" " type="radio" value="Yes" @if(old('last_limia_positive') == 'Yes') selected @endif> Yes  &nbsp;&nbsp;
                                <input class=" " name="last_limia_positive" type="radio" value="No" @if(old('last_limia_positive') == 'No') selected @endif> No &nbsp;&nbsp;
                            </div>
                            <div class="clearfix"></div>

                            <br>
                            If you answer “no” to either of these statements, then you must supply supporting documents along with your application to
                            demonstrate that your business and job offer are legitimate.<br>
                            <br>

                            If you answer “YES” to either of these statements, then you must supply previously approved LMIA applications and decisions.
                            <div class="clearfix"></div>
                            <br>
                        </div>
                        <div class="form-inner">
                            <h4>FINANCIAL DOCUMENTATION REQUIRED</h4>
                            <ul class="inner2">
                                <li> T2 Schedule 100 Balance sheet information and T2 Schedule 125 Income statement information</li>
                                <li> T2125 Statement of business or professional activities (redact social insurance number)</li>
                                <li> T4 or payroll records for a minimum of 6 weeks immediately prior to the submission of this LMIA application, if the
                                    temporary foreign worker already works for you (redact social insurance number)</li>
                                <li> an attestation confirming that your business is in good financial standing and will be able to meet all financial
                                    obligations to any temporary foreign worker you hire for the entire duration of their employment*****</li>
                            </ul>
                            <br>
                            ***a lawyer or any other member in good standing with a law society a Chartered Professional Accountant in good standing with
                            the respective professional body (attestations from Chartered Accountants in Quebec are not authorized by the Ordre des
                            comptables professionnels agréés du Québec)
                            <br>
                            <br>
                            <h4>PROOF OF PROVIDING A GOOD OR SERVICE</h4>
                            All Other Employers: You must submit at least one of these documents to demonstrate that you have a legal business that
                            provides a good or a service in Canada:<br>
                            <ul class="inner2">
                                <li> municipal/provincial/territorial business license(valid, i.e. not expired)</li>
                                <li> T4 Summary of remuneration paid</li>
                                <li> PD7A Statement of account for current source deductions</li>
                            </ul>
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
</x-layouts.frontend>
