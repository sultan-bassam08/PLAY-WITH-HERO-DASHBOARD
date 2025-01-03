<!-- resources/views/user/theme/partials/footer.blade.php -->

<footer>
    <div class="footer-top">
        <div class="container">

            <!-- Footer Logo and Menu -->
            <div class="footer-brand-wrapper">

                <!-- Logo -->
                <a href="#" class="logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Play With Hero logo">
                </a>

                <!-- Footer Menu -->
                <div class="footer-menu-wrapper">
                    <ul class="footer-menu-list">
                        <li><a href="#hero" class="footer-menu-link">Home</a></li>
                        <li><a href="#hero" class="footer-menu-link">Category</a></li>
                        <li><a href="#contact" class="footer-menu-link">Contact</a></li>
                        <li><a href="#about" class="footer-menu-link">About</a></li>
                    </ul>

                    <!-- Search Input -->
                    <div class="footer-input-wrapper">
                        <input type="text" name="message" required placeholder="Find Here Now" class="footer-input">
                        <button class="btn btn-primary">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Links and Social Media -->
            <div class="footer-quicklinks">
                <ul class="quicklink-list">
                    <li><a href="#hero" class="quicklink-item">Faq</a></li>
                    <li><a href="#hero" class="quicklink-item">Help center</a></li>
                    <li><a href="#hero" class="quicklink-item">Terms of use</a></li>
                    <li><a href="#hero" class="quicklink-item">Privacy</a></li>
                </ul>

                <!-- Social Links -->
                <ul class="footer-social-list">
                    <li><a href="#hero" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#hero" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
