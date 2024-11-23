@extends('theme.master')

    @section('content')

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="name" type="text" name="name"  placeholder="Enter your name" required />
                                                        <label for="name"> Name</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required />
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" required />
                                                        <label for="password">Password</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirm password" required />
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAddress" type="text" name="address" placeholder="Enter your address" />
                                                <label for="inputAddress">Address</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPhone" type="text" name="phone" placeholder="Enter your phone number" />
                                                <label for="inputPhone">Phone</label>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="inputGender" class="form-label">Gender</label>
                                                <select class="form-select" id="inputGender" name="gender">
                                                    <option value="" selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputDOB" type="date" name="date_of_birth" />
                                                <label for="inputDOB">Date of Birth</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="inputBio" name="bio" placeholder="Tell us about yourself"></textarea>
                                                <label for="inputBio">Bio</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="profilePicture" type="file" name="profile_picture" />
                                                <label for="profilePicture">Profile Picture</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary">Register</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>    
        </div>
    @endsection
