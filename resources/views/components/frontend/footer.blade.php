<div
    class="moto-widget moto-widget-block footer row-fixed moto-bg-color2_3 moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
    data-widget="block" data-visible-on="" data-spacing="lala"
    style="background-image:url({{asset('mt-demo/93200/93283/mt-content/uploads/2020/01/mt-1952-contrent-bg07.jpg')}});background-position:center;background-repeat:no-repeat;background-size:cover;"
    data-bg-position="center" data-bg-image="2020/01/mt-1952-contrent-bg07.jpg/index.html">


    <div class="container-fluid">
        <div class="row">


            <div class="col-md-3">

                <img src="{{ asset('images/logo2.png') }}"><br>
                <br>

                <p><a href="https://www.mbot.com/" target="_blank" rel="noopener"> <img
                            class="mbot alignnone wp-image-2688 size-full" src="{{asset('images/mbot.jpg')}}" alt=""
                            style="float:left; width:36.5%">
                    </a></p>
                <p><a href="https://www.capic.ca/" target="_blank" rel="noopener">
                        <img class="capic alignnone wp-image-2687 size-medium" src="{{asset('images/capic-logo-300x75.jpg')}}" alt=""
                             style="float: left;
width: 61%;
margin: 0 0 2% 2%;" width="300" height="75"> </a></p>

                <p><a href="https://iccrc-crcic.ca/" target="_blank" rel="noopener">
                        <img class="iccrc alignnone wp-image-1601 size-full" style="float: left;
width: 61%;
margin: 0 0 0 2%;" src="{{asset('images/iccrc.png')}}" alt="" width="300" height="61"></a></p>
                <!--                <p><a href="study-university-canada.php"><img class="iccrc alignnone wp-image-1601 size-full" style="float: left;-->
                <!--width: 100%;-->
                <!--margin: 2% 0 0 0%;" src="{{asset('images/UCW-logo.png')}}" alt=""></a></p>-->
                <!--<div class="clearfix"></div>-->
                <!--<br>-->
                <!--<a href="https://just2canada.ca/product/make-payment/" target="_blank" class="btn">Make Payment</a> -->
            </div>
            <div class="col-md-3">
                <h2>Navigation</h2>
                <ul class="list inner clearfix">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="{{url('testimonials')}}">Testimonials</a></li>
                    <li><a href="{{url('services')}}">Services</a></li>
                    <li><a href="{{url('business-immigration')}}">Business Immigration</a></li>

                    <li><a href="business-exploratory-trip.php">Business Exploratory Trip</a></li>
                    <li>
                        <a href="{{url('personal-immigration')}}">Skilled Workers Immigration</a>
                    </li>
                    <!--<li><a href="{{url('contact-us')}}">Contact Us</a></li>-->
                    @auth('employer')
                        <li><a href="{{ route('employer.dashboard') }}">My Account</a></li>
                    @endauth
                    @guest('employer')
                        <li><a href="{{ route('employer.login') }}">Employer Login</a></li>
                    @endguest


                </ul>
            </div>
            <div class="col-md-3">
                <h2>Immigration</h2>
                <ul class="list inner clearfix">
                    <li><a href="{{url('skilled-worker')}}">Skilled Worker</a></li>
                    <li><a href="{{url('business-immigration')}}">Business Immigration</a></li>

                    <li><a href="business-exploratory-trip.php">Business Exploratory Trip</a></li>
                    <li><a href="{{url('business-provincial-nominee-immigration')}}">Senior Managers</a></li>
                    <li><a href="{{url('immigration-consultants-in-ncr')}}">Immigration Consultants NCR</a></li>
                    <li><a href="{{url('contact-us')}}">Contact Us</a></li>

                </ul>
            </div>
            <div class="col-md-3">
                <h2>Useful Links</h2>

                <ul class="list inner clearfix">
                    <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                    <li><a href="{{url('refund-policy')}}">Refund Policy</a></li>
                    <li><a href="https://ca.jooble.org/jobs-canada-jobs-for-immigrants" target="_blank" rel="nofollow">Jobs
                            for Canadian Immigrants/Residents</a></li>
                    <li>
                        <a href="https://www.canada.ca/en/immigration-refugees-citizenship/corporate/publications-manuals/operational-bulletins-manuals/updates.html"
                           target="_blank" rel="nofollow">Latest Immigration Updates</a></li>
                    <li><a href="{{url('existing-client-login')}}" target="_blank" rel="nofollow">Existing Client Login</a>
                    </li>
                </ul>
            </div>
            <div class="moto-cell col-sm-12" data-container="container">
                <div id="wid_1578904989_x05fo5w3o" data-widget-id="wid_1578904989_x05fo5w3o"
                     class="moto-widget moto-widget-social-links-extended moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto  "
                     data-widget="social_links_extended" data-preset="default">
                    <ul class="moto-widget-social-links-extended__list">
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-1">
                            <a href="https://www.facebook.com/Just2Canada"
                               class="moto-widget-social-links-extended__link" target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"></span>
                            </a>
                        </li>
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-2">
                            <a href="https://twitter.com/Just2Canada" class="moto-widget-social-links-extended__link"
                               target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"></span>
                            </a>
                        </li>
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-3">
                            <a href="https://www.instagram.com/just2canada/"
                               class="moto-widget-social-links-extended__link" target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"><i class="fa-instagram fa"></i></span>
                            </a>
                        </li>
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-4">
                            <a href="https://www.linkedin.com/company/just2canada"
                               class="moto-widget-social-links-extended__link" target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"></span>
                            </a>
                        </li>
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-5">
                            <a href="https://just2canada.ca/business-immigration-assessment-questionnaire/#"
                               class="moto-widget-social-links-extended__link" target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"></span>
                            </a>
                        </li>
                        <li class="moto-widget-social-links-extended__item moto-widget-social-links-extended__item-5">
                            <a href="https://ultramsg.com/m/3skrZPp" class="moto-widget-social-links-extended__link"
                               target="_blank">
                                <span class="moto-widget-social-links-extended__icon fa"><i class="fa-whatsapp fa"></i></span>
                            </a>

                        </li>
                    </ul>
                    <style type="text/css">
                    </style>
                </div>
                <div
                    class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-medium moto-spacing-bottom-auto moto-spacing-left-medium"
                    data-widget="text" data-preset="default" data-spacing="amam" data-visible-on="-" data-animation="">
                    <div class="moto-widget-text-content moto-widget-text-editable"><p class="moto-text_system_10"
                                                                                       style="text-align: center;"><span
                                class="moto-color5_5">©Copyright | Just To Canada 2022. All Right Reserved</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Mobile Icons -->

<div class="mobile-icon-box">


    <a href="book-appointment.html">
        <div class="mobile-icons">
            <i class="fa-calendar fa"></i><br>

            Appointment
        </div>
    </a>

    <a href="https://ultramsg.com/m/3skrZPp" target="_blank">
        <div class="mobile-icons">
            <i class="fa-whatsapp fa"></i><br>

            WhatsApp
        </div>
    </a>
    <div class="clearfix"></div>

</div>


<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" src="{{asset('js/jquery.ripple.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('#ripple').ripple();
    })
</script>


<!-- jquery latest version -->
<script src="js/jquery.min.js"></script>
<!-- bootstrap js -->


<!-- jQuery JS -->
<!--<script src="js/jquery-1.12.0.min.js"></script> -->


<!--<script src="js/jquery.min.js"></script> -->
<script src="{{asset('js/jquery.ripples.js')}}"></script>
<script>
    $(document).ready(function () {
        try {
            $('.a,.b,.c').ripples({
                resolution: 256,
                perturbance: 0.04
            });
        } catch (e) {
            $('.error').show().text(e);
        }
    });
</script>

<style>

    .water {
        position: fixed;

        font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
        z-index: 999999999;
    }

    .a {
        left: 0;
        top: 0;
        right: 51%;
        bottom: 51%;
        background-size: cover;
    }

    .b {
        left: 51%;
        top: 25.5%;
        right: 0;
        bottom: 25.5%;
        background-attachment: fixed;
    }

    .c {
        left: 0;
        top: 51%;
        right: 51%;
        bottom: 0;
        background-size: cover;
    }

    .error {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.8);
        color: #eee;
        padding: 20px;
        display: none;
    }
    /* Makes the animation pause on hover */
    .marquee {
        height: 25px;
        width: 100%;
        background: #c4171e;
        overflow: hidden;
        position: relative;
    }

    .marquee div {
        display: block;
        width: 200%;
        height: 30px;

        position: absolute;
        overflow: hidden;

        animation: marquee 15s linear infinite;
    }
    .marquee div:hover {
        animation-play-state: paused;
    }

    .marquee a {
        color: white;
        float: left;
        width: 50%;
    }

    @keyframes marquee {
        0% { left: 0; }
        100% { left: -100%; }
    }

    .form-control.is-invalid~.invalid-feedback{
        display: block;
    }
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
    .moving-text-container {
        padding: 10px 0;
        width: 100%;
        background: #c4171e;
    }

</style>


<!-- Bootstrap JS -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Animate JS -->
<script src="{{asset('vendors/animate/wow.min.js')}}"></script>
<!-- Camera Slider -->
<script src="{{asset('vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('vendors/camera-slider/camera.min.js')}}"></script>
<!-- Isotope JS -->
<script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('vendors/isotope/isotope.pkgd.min.js')}}"></script>
<!-- Progress JS -->
<script src="{{asset('vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('vendors/Counter-Up/waypoints.min.js')}}"></script>
<!-- Owlcarousel JS -->
<script src="{{asset('vendors/owl_carousel/owl.carousel.min.js')}}"></script>
<!-- Stellar JS -->
<script src="{{asset('vendors/stellar/jquery.stellar.js')}}"></script>
<!-- Theme JS -->
<script src="{{asset('js/theme.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#firstpane p.menu_head").click(function()
        {
            $(this).css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
            $(this).siblings().css({backgroundImage:"url(left.png)"});

        });

    });
</script>

<script>
    $(document).ready(function(){

        var vValueinCanada=$('.radDid_you_ever_visit_Canada:checked').val();

        if(vValueinCanada=='Yes')
            $('#divIfyesVisitinCanada').show();
        else
            $('#divIfyesVisitinCanada').hide();


        var vValueVisa=$('.Txtis_currently_have_valid_visa:checked').val();

        if(vValueVisa=='Yes')
            $('#divIfyesis_currently_have_valid_visa').show();
        else
            $('#divIfyesis_currently_have_valid_visa').hide();



        $('.radDid_you_ever_visit_Canada').on('click',function(){

            var vValue=$('.radDid_you_ever_visit_Canada:checked').val();

            //console.log(vValue);
            if(vValue=='Yes')
                $('#divIfyesVisitinCanada').show();
            else
                $('#divIfyesVisitinCanada').hide();
            //divIfyesCurrentlyinCanada
        });


        $('.Txtis_currently_have_valid_visa').on('click',function(){

            var vValue=$('.Txtis_currently_have_valid_visa:checked').val();

            //console.log(vValue);
            if(vValue=='Yes')
                $('#divIfyesis_currently_have_valid_visa').show();
            else
                $('#divIfyesis_currently_have_valid_visa').hide();
            //divIfyesCurrentlyinCanada
        });

    });

</script>
</body>
</html>
