


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
            <section class="tg-main-section tg-haslayout">
                <div class="container">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div id="tg-upcomingmatch-slider" class="tg-upcomingmatch-slider tg-upcomingmatch">
                            <div class="swiper-wrapper">
                                @foreach($category->venues as $venue)
                                <div class="swiper-slide">
                                    <div class="tg-match">
                                        <div class="tg-matchdetail">
                                            <div class="tg-box">
                                                <strong class="tg-teamlogo">
                                                    <img src="{{ $venue->venueInfo->img_venue ? asset('storage/' . $venue->venueInfo->img_venue) : asset('assets/images/default_logo.png') }}" 
                                                         alt="{{ $venue->venueInfo->name }}">
                                                </strong>
                                                <h3>{{ $venue->venueInfo->name }}</h3>
                                            </div>
                                            <div class="tg-box">
                                                <h3>Capacity</h3>
                                                <span>{{ $venue->max_spot }} players</span>
                                            </div>
                                            <div class="tg-box">
                                                @if(isset($venue->matches) && $venue->matches->isNotEmpty())
                                                <h3>Duration</h3>
                                                <span>{{ $venue->matches->first()->game_duration }} min</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tg-matchhover">
                                            <address>{{ $venue->venueInfo->address }}</address>
                                            <div class="tg-btnbox">
                                                <a class="tg-btn" href="{{ route('venues.view', $venue->venue_info_id) }}">
                                                    <span>View Details</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <!-- Navigation Buttons -->
                            <div class="tg-themebtnnext"><span class="fa fa-angle-down"></span></div>
                            <div class="tg-themebtnprev"><span class="fa fa-angle-up"></span></div>
                        </div>
                    </div>
                    
                    @if($category->venues->isEmpty())
                    <div class="col-xs-12">
                        <div class="tg-no-venues">
                            <p>No venues available for this category.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
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