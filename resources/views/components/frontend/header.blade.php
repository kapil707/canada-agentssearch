<html lang="en" data-ng-app="website">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta_tags')

    <!-- Favicon -->
    <link rel="icon"
          href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAXJJREFUOE9jZMAJQpk17fSUrh+qvQ1S8p+BgfGDg6k+iC1w4PRFRrAQAwMjsn5956b9MP7//wzMjIz/lRkYGG8FM9wXT/5/Q5WL4S8LVP49E+P/XP69p5eiGwA2FRnMvjRZUlVX8RoDA4MgmtR7gX2nhAkaMO/OggdKyiIKWH36778hQQPm3lnAoKwsgj2kiDFg6pU5DBoaYgzMzEzohhDnBZABAgIcDJKS/H+ZmBiZiQ7EX7//MDhYqjNEL6gE62H7zaDzRkyszVKCsR5fNMJj4fefPwz2FlAD/v//B4nz/0yM/xgcrN48OQjzD8FABHkBGfz//3+H7avHnmQb8O/PXxe7t0/3km7Av/8R8+SdEpIe7C6wefPsJvEGXJ4VzMDA1MbA8P99tk7qjYv76hKRvUQwDLr2TuURFP3HK/j69fsQp6YZeA0Amazn1DSbkZFBBWqLOgMDA9y5ILGLe+sccboAPanpOTarX9pfi2IAuhoAtpOeOf02YIAAAAAASUVORK5CYII="
          type="image/x-icon" hrefbak="images/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{asset('vendors/animate/animate.css')}}" rel="stylesheet">
    <!-- Icon CSS-->
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="{{asset('vendors/camera-slider/camera.css')}}">
    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/owl_carousel/owl.carousel.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('vendors/owl_carousel/owl.theme.min.css')}}" media="all">

    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all">

    <link rel="stylesheet" href="{{asset('mt-includes/css/assets.min513c.css?_build=1633339793')}}">
    <link rel="stylesheet" href="{{asset('mt-demo/93200/93283/mt-content/assets/stylesdd7d.css?_build=1632936756')}}"
          id="moto-website-style">
    <script type="text/javascript" async=""
            src="https://www.gstatic.com/recaptcha/releases/81cz2KigKZoE-gRplogO8692/recaptcha__en.js"
            crossorigin="anonymous"
            integrity="sha384-ChoQTNOOzOCXO6DTby1mHaC5TIg752BzBXFlYVusgc3aPsuwXbyFTr/fXAQAm2Yp"></script>
    <script src="{{asset('mt-includes/js/website.assets.minc8df.js')}}" type="text/javascript"
            data-cfasync="false"></script>

    <script src="{{asset('mt-includes/js/website.min7b53.js')}}" type="text/javascript"
            data-cfasync="false"></script>


    <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--ACCORDIAN MENU -->
    <!--<script src="{{ asset('js/jquery-1.10.2.min.js') }}" ></script>  -->
    <link href="{{ asset('css/accordian.css') }}" rel="stylesheet" type="text/css" />
    <!--<script type="text/javascript" language="javascript" src="js/jquery.js"></script> -->
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2204332279752101');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2204332279752101&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->
</head>
<body id="home">

@if(session('success'))
    <script>
        swal("Good job!", "{{session('success')}}", "success");
    </script>
@endif
@if(session('warning'))
    <script>
        swal("Warning!", "{{session('warning')}}", "warning");
    </script>
@endif
@if($errors->any())
    <script>
        swal("Invalid data given!", 'Please check the form before submit', "error");
    </script>
@endif
@if(session('error'))
    <script>
        swal("Oops!", "{{session('error')}}", "error");
    </script>
@endif
<!-- Preloader -->
<!--<div class="preloader"></div> -->
<!-- Header_Area -->
<nav class="navbar navbar-default header_aera affix-top" id="main_navbar"><!-- Top Header_Area -->
    <div class="top_header_area">
        <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="tel:9055860440"><i class="fa fa-phone"></i> 905.586.0440 </a></li>
                <li><a href="mailto:info@just2canada.ca"><i class="fa fa-envelope"></i> info@just2canada.ca</a></li>
            </ul>
            <a href="https://iccrc-crcic.ca/" target="_blank" rel="noopener">
                <img class="iccrc alignnone wp-image-1601 size-full top-icc" src="{{asset('images/iccrc.png')}}" alt="" width="300"
                     height="50"></a>
            <!-- <a href="{{ route('skilled-worker-assessment') }}" class="btn navbar-right" data-animation="animated fadeInUp">Skilled
                Worker Assessment </a> -->
            <a href="https://secure.officio.ca/qnr?id=444&hash=47bed91fa2b13689fe43b986e75566b3" class="btn navbar-right" data-animation="animated fadeInUp">Skilled Worker Assessment Form </a>
            <a href="{{ route('business-immigration.init') }}" class="btn navbar-right" data-animation="animated fadeInUp">Business Assessment Form </a>
        </div>
    </div>
    <!-- End Top Header_Area -->
    <div class="container">
        <!-- searchForm -->
        <div class="searchForm">
            <form action="#" class="row m0">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="search" name="search" class="form-control" placeholder="Type &amp; Hit Enter">
                    <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div><!-- End searchForm -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-3 p0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('') }}"><img src="{{asset('images/logo.png')}}" alt="" class="img-fluid"></a>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-9 p0">
            <div class="collapse navbar-collapse" id="min_navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('') }}">Home</a>
                    </li>
                    <li>
                        <a class="js-scroll-trigger" href="{{url('about-us')}}">About Us</a>
                    </li>
                    <li>
                        <a class="js-scroll-trigger" href="{{url('testimonials')}}">Testimonials</a>
                    </li>
                    <li>
                        <a class="js-scroll-trigger" href="{{url('personal-immigration')}}">SKILLED WORKERS IMMIGRATION</a>
                    </li>
                    <li>
                        <a href="{{url('business-immigration')}}">Business Immigration</a>
                    </li>

                    <!--<li><a href="contact-us.php">Contact Us</a></li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</nav>
<!-- End Header_Area -->
