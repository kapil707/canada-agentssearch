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
    <section id="aboutus" class="row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                    <h1 class="welc-text"> BUSINESS IMMIGRATION ASSESSMENT FORM - LOGIN</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <form method="POST" action="{{route('business-immigration.do-login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email-input" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{old('dob')}}" id="dob-input">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4"></div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
