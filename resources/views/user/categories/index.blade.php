


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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   
	<!-- Scripts -->
	<script src="{{ asset('assets/script/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <style>
        
        .creative-background {
            position: relative;
            width: 100%;
            height: 400px;
            margin: 0;
            overflow: hidden;
        }
        
        .animated-gradient {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('assets/images/bg-pattran.png') }}");
            animation: gradientAnimation 10s ease infinite;
        }
        
     
        
        .tg-contentbox {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }
        
        
        
        .tg-textcontent h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .animated-button {
            display: inline-block;
            padding: 12px 30px;
            background: rgba(187, 182, 182, 0.9);
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .animated-button span {
            color: #6574cd;
            font-weight: bold;
        }
        
        .animated-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }
        
        </style>
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
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div id="tg-upcomingmatch-slider" class="tg-upcomingmatch-slider tg-upcomingmatch">
                                <div class="swiper-wrapper">
                                    @foreach($category->venues as $venue)
                                    <div class="swiper-slide">
                                        <div class="tg-match" style="background-color: #f5f5f5; padding: 20px; border-radius: 8px;">
                                            <div class="tg-matchdetail" style="display: flex; justify-content: space-between; align-items: center;">
                                                <!-- Venue Image and Name -->
                                                <div class="tg-box" style="flex: 2;">
                                                    <strong class="tg-teamlogo">
                                                        <img src="{{ $venue->venueInfo->img_venue ? asset('storage/' . $venue->venueInfo->img_venue) : asset('assets/images/default_logo.png') }}" 
                                                             alt="{{ $venue->venueInfo->name }}"
                                                             style="max-width: 120px; height: auto;">
                                                    </strong>
                                                    <h3 style="font-size: 24px; margin-top: 15px; font-weight: bold;">{{ $venue->venueInfo->name }}</h3>
                                                </div>
                                                
                                                <!-- Capacity -->
                                                <div class="tg-box" style="flex: 1; text-align: center;">
                                                    <h3 style="font-size: 20px; color: #333; margin-bottom: 10px;">CAPACITY</h3>
                                                    <span style="display: block; font-size: 18px; color: #666;">{{ $venue->max_spot }} players</span>
                                                </div>
                                                
                                                <!-- Duration -->
                                                <div class="tg-box" style="flex: 1; text-align: center;">
                                                    @if(isset($venue->matches) && $venue->matches->isNotEmpty())
                                                    <h3 style="font-size: 20px; color: #333; margin-bottom: 10px;">DURATION</h3>
                                                    <span style="display: block; font-size: 18px; color: #666;">{{ $venue->matches->first()->game_duration }} min</span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="tg-matchhover">
                                                <address style="margin: 15px 0; font-size: 16px;">{{ $venue->venueInfo->address }}</address>
                                                <div class="tg-btnbox">
                                                    <a class="tg-btn" href="{{ route('venues.view', $venue->venue_info_id) }}"
                                                       style="background: #e5af26; padding: 10px 25px; border-radius: 5px; margin-right: 10px;">
                                                        <span>View Details</span>
                                                    </a>
                                                    <a class="tg-btn" href="#"
                                                       style="background: #e5af26; padding: 10px 25px; border-radius: 5px;">
                                                        <span>Join Match</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <!-- Navigation Buttons -->
                                <div style="text-align: center; margin-top: 20px;">
                                    <div style="display: inline-flex; gap: 10px;">
                                        <div class="tg-themebtnprev">
                                            <span class="fa fa-angle-up"></span>
                                        </div>
                                        <div class="tg-themebtnnext">
                                            <span class="fa fa-angle-down"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if($category->venues->isEmpty())
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="tg-no-venues" style="text-align: center; padding: 30px;">
                                <p>No venues available for this category.</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <section class="tg-videobox tg-haslayout">
                <figure class="creative-background">
                    <div class="animated-gradient">
                        <div class="floating-shapes">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="shape shape-{{ $i }}"></div>
                            @endfor
                        </div>
                        <figcaption class="tg-contentbox">
                            <div class="tg-textcontent">
                                <h2>{{ $category->description ?? 'Category description will appear here.' }}</h2>
                                <div class="tg-description">
                                    <div class="animated-button">
                                        <span>Explore Category</span>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </section>
         </main>
        
        
        <!--************************************
                Main End
        *************************************-->
    </div>
    
    
	
	<!--************************************
		LightBoxes End
	******************************<script src="{{ asset('assets/script/js/vendor/jquery-library.js') }}"></script>
<script src="{{ asset('assets/script/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/script/js/customScrollbar.min.js') }}"></script>
<script src="{{ asset('assets/script/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/script/js/isotope.pkgd.js') }}"></script>
<script src="{{ asset('assets/script/js/prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/script/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/script/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/script/js/countTo.js') }}"></script>
<script src="{{ asset('assets/script/js/appear.js') }}"></script>
<script src="{{ asset('assets/script/js/main.js') }}"></script>*******-->


</body>
</html>