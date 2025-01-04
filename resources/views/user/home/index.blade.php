@extends('user.layouts.app')  <!-- assuming layouts.main is your base layout -->

@section('content')


<main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="hero">
        <div class="container"> 
          
           <p class="hero-subtitle">Whether for fun or skill, 'Play with Hero' connects you with players and venues to make every game memorable</p>

          <h3 class="h3 hero-title">Find Your Match, Elevate Your Game!</h3>

          <div class="btn-group">

            <button class="btn btn-primary">
              <span>Join with us</span>

              <ion-icon name="play-circle"></ion-icon>
            </button>

            

          </div>

        </div>
      </section>

      <div class="section-wrapper">

        <!-- 
          - #ABOUT
        -->

        <section class="about" id="about">
          
          <div class="container">
            
        
            <!-- Hero Image and Characters -->
            <figure class="about-banner">
              <img src="./assets/images/basketball aboutus2.jpg" alt="Play with Hero Banner" class="about-img">
        
              <!-- Characters appear from different angles -->
            </figure>
        
            <!-- About Content Section -->
            <div class="about-content">
              <p class="about-subtitle">Unite. Play. Win.</p>
              
              <h2 class="about-title">Your Ultimate Sports Experience with <strong>Play with Hero</strong></h2>
        
              <p class="about-text">
                Join a vibrant community of sports enthusiasts and gamers. Whether you're playing casually or training to become a pro, we’ve got the perfect match for you. Find local venues, meet new players, and book your next game in a few clicks. Your journey to play begins here.
              </p>
        
              <div class="cta">
                <p class="about-bottom-text">
                  <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                  <span>Find Your Next Match Now</span>
                </p>
                <a href="#match-booking" class="btn btn-primary">Book a Game</a>
              </div>
            </div>
        
          </div>
        </section>
        

        <!-- 
          - #Contact us 
        -->
        <section class="contact" id="contact">
          <div class="container">
      
              <div class="contact-content">
                  <p class="contact-subtitle">Get in touch with us</p>
                  <h2 class="h3 contact-title">Contact Us!</h2>
                  <p class="contact-text">
                      Have questions or want to book a match? Fill out the form or reach us through the contact details below.
                  </p>
              </div>
      
              <div class="contact-form">
                  <h2 class="h3 contact-form-title">Send Us a Message</h2>
                  <form action="{{ route('user.home.index') }}" method="POST">
                      @csrf
                      <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                      <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                      <textarea name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                      <button type="submit" class="btn btn-primary">Send Message</button>
                  </form>
      
                  @if(session('success'))
                      <p class="text-success">{{ session('success') }}</p>
                  @endif
      
                  @if($errors->any())
                      <ul>
                          @foreach($errors->all() as $error)
                              <li class="text-danger">{{ $error }}</li>
                          @endforeach
                      </ul>
                  @endif
              </div>
      
          </div>
      </section>
      
        

        <!-- 
          - #Categories
        -->

        
        <section class="about-categories">
          <div class="container">
              <h2 class="section-title">Explore Categories</h2>
              <ul class="categories-list has-scrollbar">
                @foreach (\App\Models\Category::all() as $category)
                      <li>
                          <a href="{{ route('categories.show', $category->id) }}" class="category-item">
                              <figure>
                                <img src="{{ asset('storage/' . $category->image_path) }}" class="category-img" alt="{{ $category->name }}">
                                  <figcaption class="category-name">{{ ucfirst($category->name) }}</figcaption>
                              </figure>
                          </a>
                      </li>
                  @endforeach
              </ul>
          </div>
      </section>


        


        <!-- 
          - #stadiums 
        -->

        <section class="venues" id="venues">
          <div class="container">
              <h2 class="h2 section-title">Our Partner Stadiums</h2>
      
              <ul class="venues-list">
                @foreach ($mostReservedVenues as $venue)
                    <li>
                        <a href="{{ route('categories.show', $footballCategory->id) }}" class="venue-item">
                            <figure>
                                <img src="{{ asset('storage/' . $venue->img_venue) }}" alt="{{ $venue->name }}">
                                <figcaption class="venue-name">{{ $venue->name }}</figcaption>
                            </figure>
                        </a>
                    </li>
                @endforeach
            </ul>
      
              @if($footballCategory)
              <button class="btn btn-primary"><a href="{{ route('categories.show', $footballCategory->id) }}" class=" btn">View All Stadiums</a></button>
              @else
              <button class="btn btn-primary">View All Stadiums</button>
              @endif
          </div>
      </section>
 

        <!-- 
          - #NEWSLETTER
        -->

        <section class="newsletter">
          <div class="container">
              <div class="newsletter-card">
                  <div class="newsletter-content">
                      <figure class="newsletter-img">
                          <img src="./assets/images/newletter image.png" alt="Join our community">
                      </figure>
                      <h2 class="h2 newsletter-title">Stay Updated on Sports Activities</h2>
                      <p class="newsletter-text">Get the latest updates on match schedules, venue deals, and tips to enhance your skills. Join our community of sports enthusiasts!</p>
                  </div>
      
                  <form id="newsletterForm" class="newsletter-form">
                      @csrf
                      <input type="email" name="email" required placeholder="Your Email Address" class="input-field">
                      <button type="submit" class="btn btn-secondary">Subscribe</button>
                      <div id="message"></div>
                  </form>
              </div>
          </div>
      </section>
      
      <a href="#top" class="btn btn-primary go-top" data-go-top>
          <ion-icon name="chevron-up-outline"></ion-icon>
      </a>

    


 
  @endsection