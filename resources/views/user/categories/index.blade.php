

       @include('user.partials.head-2')
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
                                            <div class="tg-match">
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
                                                    <a class="btn" href="{{ route('venues.view', $venue->venue_info_id) }}"
                                                        >
                                                        <span>View Details</span>
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
        </div>
        @include('user.partials.scripts-2')
          
    </body>
