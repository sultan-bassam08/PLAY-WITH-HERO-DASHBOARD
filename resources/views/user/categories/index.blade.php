


<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Soccer BootStrap HTML5 CSS3 Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/customScrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

	<!-- Scripts -->
	<script src="{{ asset('assets/script/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>

<body>
	
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
                Banner Start
        *************************************-->
        <div class="tg-banner tg-haslayout">
            <div class="tg-imglayer">
                <img src="{{ asset('assets/images/bg-pattran.png') }}" alt="image description">
            </div>
            <div class="container">
                <div class="row">
                    <div class="tg-banner-content tg-haslayout">
                        <div class="tg-pagetitle">
                            <h1>{{ $category->name ?? 'Category Name' }}</h1>
                        </div>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">{{ $category->name ?? 'Category' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Banner End
        *************************************-->
        <!--************************************
                Main Start
        *************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <!--************************************
                    Fixtures Start
            *************************************-->
            
            <section class="tg-main-section tg-haslayout">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div id="tg-upcomingmatch-slider" class="tg-upcomingmatch-slider tg-upcomingmatch">
                        <div class="swiper-wrapper">
                            {{-- @forelse ($matches as $match) --}}
                                <div class="swiper-slide">
                                    <div class="tg-match">
                                        <div class="tg-matchdetail">
                                            <div class="tg-box">
                                                <strong class="tg-venuelogo">
                                                    {{-- <img src="{{ $match->venueDescription->venueInfo->logo ?? 'default_logo.png' }}" alt="Venue Logo"> --}}
                                                </strong>
                                                {{-- <h3>{{ $match->venueDescription->venueInfo->name }}</h3> --}}
                                            </div>
                                            <div class="tg-box">
                                                {{-- <p><strong>Description:</strong> {{ $match->venueDescription->playground_description }}</p> --}}
                                            </div>
                                            <div class="tg-box">
                                                {{-- <p><strong>Capacity:</strong> {{ $match->venueDescription->max_spot }} people</p> --}}
                                            </div>
                                        </div>
                                        <div class="tg-matchhover">
                                            {{-- <address>{{ $match->match_date_time }} at {{ $match->venueDescription->venueInfo->address }}</address> --}}
                                            <div class="tg-btnbox">
                                                {{-- <a class="tg-btn" href="{{ route('venues.view', $match->venueDescription->id) }}"><span>View Venue</span></a>
                                                <a class="tg-btn" href="{{ route('matches.join', $match->id) }}"><span>Join Match</span></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- @empty --}}
                                <div class="swiper-slide">
                                    <p>No matches available for this category.</p>
                                </div>
                            {{-- @endforelse --}}
                        </div>
                        <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
                        <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
                    </div>
                </div>
            </section>
            
            <!--************************************
                    Fixtures End
            *************************************-->
            <!--************************************
                    Video Start
            *************************************-->
            <section class="tg-videobox tg-haslayout">
                <figure>
                    <img src="{{ asset('assets/images/bg-video.jpg') }}" alt="image description">
                    <figcaption>
                        <a class="tg-playbtn" href="https://youtu.be/a0ksVaLlaIw?iframe=true" data-rel="prettyPhoto[iframe]"></a>
                        <h2>{{ $category->description ?? 'Category description will appear here.' }}</h2>
                    </figcaption>
                </figure>
            </section>
            <!--************************************
                    Video End
            *************************************-->
        </main>
        <!--************************************
                Main End
        *************************************-->
    </div>
    
    
	
	<!--************************************
		LightBoxes End
	*************************************-->
<script src="{{ asset('assets/script/js/vendor/jquery-library.js') }}"></script>
<script src="{{ asset('assets/script/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/script/js/customScrollbar.min.js') }}"></script>
<script src="{{ asset('assets/script/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/script/js/isotope.pkgd.js') }}"></script>
<script src="{{ asset('assets/script/js/prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/script/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/script/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/script/js/countTo.js') }}"></script>
<script src="{{ asset('assets/script/js/appear.js') }}"></script>
<script src="{{ asset('assets/script/js/main.js') }}"></script>

</body>
</html>