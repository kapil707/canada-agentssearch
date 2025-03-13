<section id="aboutus" class="about_us_area   row">
    <div class="container">
        <div class="row about_row" style="padding-top:0;">
            <div class="tittle wow fadeInUpBig" style="visibility: visible;">
                <center> <h2 class="welc-text">  Instant Registration Form </h2></center>
                <br>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-div">
                <div class="form-inner">
                        <form class="text-left row-20 ng-pristine ng-valid" method="POST" action="{{route('quick-registration-form')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name-input">Name</label>
                                <input type="text" style="margin-bottom: 0px;"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name-input"
                                       placeholder="Enter your name"
                                       value="{{old('name','')}}"
                                >
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tel-input">Tel</label>
                                <input type="text"
                                       style="margin-bottom: 0px;"
                                       name="tel"
                                       class="form-control @error('tel') is-invalid @enderror"
                                       id="tel-input"
                                       value="{{old('tel','')}}"
                                       placeholder="Enter your telephone number">
                                @error('tel')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email-input">Email</label>
                                <input type="email"
                                       style="margin-bottom: 0px;"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email-input"
                                       value="{{old('email','')}}"
                                       placeholder="Enter your email address">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country-input">Country</label>
                                <input type="text"
                                       style="margin-bottom: 0px;"
                                       name="country"
                                       class="form-control @error('country') is-invalid @enderror"
                                       id="country-input"
                                       value="{{old('country','')}}"
                                       placeholder="Enter your country of residence">
                                @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

