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
              <form action="#" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </form>
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
              <li>
                <a href="football.html" class="category-item">
                  <figure>
                    <img src="./assets/images/Football category.webp" alt="Football" class="category-img">
                    <figcaption class="category-name">Football</figcaption>
                  </figure>
                </a>
              </li>
              <li>
                <a href="tennis.html" class="category-item">
                  <figure>
                    <img src="./assets/images/Tennis category.webp" alt="Tennis" class="category-img">
                    <figcaption class="category-name">Tennis</figcaption>
                  </figure>
                </a>
              </li>
              <li>
                <a href="basketball.html" class="category-item">
                  <figure>
                    <img src="./assets/images/Basketball category.webp" alt="Basketball" class="category-img">
                    <figcaption class="category-name">Basketball</figcaption>
                  </figure>
                </a>
              </li>
            </ul>
          </div>
        </section> 


        <!-- <section class="gallery">
          <div class="container">

            <ul class="gallery-list has-scrollbar">

              <li>
                <figure class="gallery-item">
                  <img src="./assets/images/Basketball category.webp" alt="Gallery image">
                </figure>
              </li>

              <li>
                <figure class="gallery-item">
                  <img src="./assets/images/Tennis category.webp" alt="Gallery image">
                </figure>
              </li>

              <li>
                <figure class="gallery-item">
                  <img src="./assets/images/Football category.webp" alt="Gallery image">
                </figure>
              </li>

              

            </ul>

          </div>
        </section> -->


        <!-- 
          - #stadiums 
        -->

        <section class="venues" id="venues">
          <div class="container">
        
            <h2 class="h2 section-title">Our Partner Stadiums</h2>
        
            <ul class="venues-list">
        
              <li>
                <a href="stadium-1.html" class="venue-item">
                  <figure>
                    <img src="./assets/images/BAKET BALL STADIUM.jpg" alt="Stadium 1">
                    <figcaption class="venue-name">King's Arena</figcaption>
                  </figure>
                </a>
              </li>
        
              <li>
                <a href="stadium-2.html" class="venue-item">
                  <figure>
                    <img src="./assets/images/BAKET BALL STADIUM.jpg" alt="Stadium 2">
                    <figcaption class="venue-name">Jordan Sports Hall</figcaption>
                  </figure>
                </a>
              </li>
        
              <li>
                <a href="stadium-3.html" class="venue-item">
                  <figure>
                    <img src="./assets/images/FOOTBALL STADIUM.jpg" alt="Stadium 3">
                    <figcaption class="venue-name">Olympic Field</figcaption>
                  </figure>
                </a>
              </li>
        
              <li>
                <a href="stadium-4.html" class="venue-item">
                  <figure>
                    <img src="./assets/images/FOOTBALL STADIUM.jpg" alt="Stadium 4">
                    <figcaption class="venue-name">Champion's Ground</figcaption>
                  </figure>
                </a>
              </li>
        
            </ul>
        
            <button class="btn btn-primary">View All Stadiums</button>
        
          </div>
        </section>
        
<!-- 
        <section class="team" id="team">
          <div class="container">

            <h2 class="h2 section-title">Active Team Members</h2>

            <ul class="team-list">

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-1.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-2.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-3.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-4.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-6.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-7.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-8.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-9.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-10.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-11.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="team-member">
                  <figure>
                    <img src="./assets/images/team-member-12.png" alt="Team member image">
                  </figure>

                  <ion-icon name="link-outline"></ion-icon>
                </a>
              </li>

            </ul>

            <button class="btn btn-primary">view all members</button>

          </div>
        </section>



 -->

        <!-- 
          - #GEARS
        -->

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
        
              <form action="" class="newsletter-form">
                <input type="email" name="email" required placeholder="Your Email Address" class="input-field">
        
                <button type="submit" class="btn btn-secondary">Subscribe</button>
              </form>
        
            </div>
        
          </div>
          <a href="#top" class="btn btn-primary go-top" data-go-top>
            <ion-icon name="chevron-up-outline"></ion-icon>
          </a>
        </section>
        


  @endsection