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
                    <h1 class="welc-text"> BUSINESS IMMIGRATION ASSESSMENT FORM
                        <a href="obtain-free-assessment.html" class="backlink pull-right">
                            <i class="fa-chevron-left fa"></i> Back
                        </a>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="{{route('business-immigration.form-1').'?new=1'}}" class="btn">New Application</a>
                    <a href="{{route('business-immigration.login')}}" class="btn">Continue Old Application</a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
