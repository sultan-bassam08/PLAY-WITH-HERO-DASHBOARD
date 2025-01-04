<link rel="stylesheet" href="{{ asset('assets/css/loginauth.css') }}">
<main class="main">
    <div class="container">
        <div class="forms">
            <div class="sign__blog">
                <!-- Sign-in Form -->
                <form method="POST" action="{{ route('login') }}" class="signin">
                    @csrf
                    <div class="profile__img__blog">
                        <img src="{{ asset('assets/img/undraw_profile_pic_ic5t.svg') }}" alt="" class="profile">
                    </div>
                    <h2 class="form_title">Sign in</h2>
                    <div class="input_item">
                        <input name="email" type="email" class="form_input" required value="{{ old('email') }}">
                        <label for="email" class="form_label"><i class="fas fa-envelope"></i> Email</label>
                    </div>
                    <div class="input_item">
                        <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                        <input name="password" type="password" class="form_input form_pass" required>
                        <label for="password" class="form_label"><i class="fas fa-lock"></i> Password</label>
                    </div>
                    <button type="submit" class="btn btn-primry">Sign in</button>
                </form>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="register">
                    @csrf
                    <h2 class="form_title">Register</h2>

                    <div class="form_steps">
                        <div class="steps">
                            <p class="steps_title">Name</p>
                            <span class="steps_numb">1</span>
                        </div>
                        <div class="steps">
                            <p class="steps_title">Password</p>
                            <span class="steps_numb">2</span>
                        </div>
                        <div class="steps">
                            <p class="steps_title">Avatar</p>
                            <span class="steps_numb step_end">3</span>
                        </div>
                    </div>

                    <div class="register_content">
                        <div class="form_pages">
                            <!-- Step 1: Name and Email -->
                            <div class="form_page page_1">
                                <!-- Name Field -->
                                <div class="input_item">
                                    <input name="name" type="text" class="form_input" required value="{{ old('name') }}">
                                    <label for="name" class="form_label"><i class="fas fa-user"></i> Name</label>
                                </div>

                                <!-- Email Field -->
                                <div class="input_item">
                                    <input name="email" type="email" class="form_input form_email" required value="{{ old('email') }}">
                                    <label for="email" class="form_label"><i class="fas fa-envelope"></i> Email</label>
                                </div>

                                <!-- Phone Field -->
                                <div class="input_item">
                                    <input name="phone" type="number" class="form_input" required value="{{ old('phone') }}">
                                    <label for="phone" class="form_label"><i class="fas fa-phone"></i> Phone number</label>
                                </div>
                                <button type="button" class="btn nextBtn">Next</button>
                            </div>

                            <!-- Step 2: Password -->
                            <div class="form_page page_2 page_password">
                                <!-- Password Field -->
                                <div class="input_item password_item">
                                    <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                                    <input name="password" type="password" class="form_input form_pass form_password" required>
                                    <label for="password" class="form_label"><i class="fas fa-lock"></i> Password</label>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="input_item password_item">
                                    <span class="passwordEye"><i class="fas fa-eye-slash"></i></span>
                                    <input name="password_confirmation" type="password" class="form_input form_pass form_password" required>
                                    <label for="password_confirmation" class="form_label"><i class="fas fa-lock"></i> Confirm Password</label>
                                </div>

                                <div class="register_buttons">
                                    <button type="button" class="btn backBtn">Back</button>
                                    <button type="button" class="btn nextBtn">Next</button>
                                </div>
                            </div>

                            <!-- Step 3: Avatar -->
                            <div class="form_page page_3">
                                <div class="input_item input_uploader">
                                    <div class="form__imgUploader">
                                        <div class="form__wrapper">
                                            <div class="form__image">
                                                <img src="{{ asset('assets/img/undraw_authentication_fsn5.svg') }}" alt="" class="form__img">
                                            </div>
                                            <div class="formUploader__content">
                                                <div class="formUploader__icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                <div class="formUploader__text">No photo chosen, yet!</div>
                                            </div>
                                        </div>
                                        <input name="photo" type="file" class="imgUploader" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="register_buttons">
                                    <button type="button" class="btn backBtn">Back</button>
                                    <button type="submit" class="btn register_button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Panels for Switching Between Sign-in and Register -->
        <div class="panels__blog">
            <div class="panel left__panel">
                <div class="content">
                    <h3 class="panel__title">New here?</h3>
                    <p class="panel__text">Please Sign up from here</p>
                    <button class="button transparent" id="register__btn">Register</button>
                </div>
                <img src="{{ asset('assets/img/junior-player-login-page.svg') }}" alt="" class="panel__img">
            </div>

            <div class="panel right__panel">
                <div class="content">
                    <h3 class="panel__title">Already have an account?</h3>
                    <p class="panel__text">Please Sign in from here</p>
                    <button class="button transparent" id="signin__btn">Sign in</button>
                </div>
                <img src="{{ asset('assets/img/goal-auth.svg') }}" alt="" class="panel__img">
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('assets/script/scriptsauth.js') }}"></script>