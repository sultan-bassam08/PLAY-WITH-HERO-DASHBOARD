@extends('theme.master')


@section('content')
    <!-- Custom CSS for background image and container styling -->
    <style>

        body{
            
            padding-right: 200px
        }
        /* Full-page background and centering */
        body.login-page {
            background-color: #1f2029;
            
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0 !important; /* Override any padding */
        }

        /* Ensure the layout takes full width */
        #layoutAuthentication {
            width: 100%;
            max-width: 800px; /* Increased container width */
            margin: auto;
        }

        /* Card styling */
        .card {
            background-color: #1f2029;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            padding: 2rem; /* Added padding inside the card */
        }

        .card-header {
            background-color: #1f2029;
            border-bottom: 2px solid #ffc619;
            padding: 1.5rem; /* Increased header padding */
        }

        .card-header h3 {
            color: #ffc619;
            font-weight: bold;
            font-size: 2rem; /* Increased font size for the title */
        }

        .form-control {
            background-color: #2a2b36;
            border: 1px solid #444;
            color: #fff;
            padding: 1rem; /* Increased input padding */
            font-size: 1rem; /* Increased font size for inputs */
        }

        .form-control:focus {
            border-color: #ffc619;
            box-shadow: 0 0 5px rgba(255, 198, 25, 0.5);
        }

        .btn-primary {
            background-color: #ffc619;
            border: none;
            color: #1f2029;
            font-weight: bold;
            padding: 0.75rem 1.5rem; /* Increased button padding */
            font-size: 1.1rem; /* Increased font size for the button */
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e0b015;
        }

        .form-floating label {
            color: #ffc619;
            font-size: 1rem; /* Increased font size for labels */
        }
    </style>

    <!-- Add a class to the body for the login page -->
    <body class="login-page">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10"> <!-- Further increased column width -->
                                <!-- Card with custom background and shadow -->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <!-- Card Header with yellow accent -->
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body" style="color: #fff;">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <!-- Email Input -->
                                            <div class="form-floating mb-4"> <!-- Increased margin-bottom -->
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required />
                                                <label for="email">Email address</label>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <!-- Password Input -->
                                            <div class="form-floating mb-4"> <!-- Increased margin-bottom -->
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required />
                                                <label for="password">Password</label>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <!-- Login Button -->
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection