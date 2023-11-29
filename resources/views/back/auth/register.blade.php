@extends('layouts.front.master')

@section('title')
    Register
@endsection
@section('content')
    <!-- Info Section -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('front_assets/images/background/12.jpg') }});"></div>
        <div class="outer-box">
            <!-- Login Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Create An Account</h3>
                    <!--Login Form-->
                    <x-jet-validation-errors class="mb-4 text-danger" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                    <form method="post" action="/student/register">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile_number" placeholder="Mobile Number" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Education</label>
                            <input type="text" name="education" placeholder="Education" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" placeholder="Email" required>
                           
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password-field" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-field" type="password" name="confirm_password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <div class="field-outer">
                                <div class="input-group checkboxes square">
                                    <input type="checkbox" name="remember-me" value="" id="remember">
                                    <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember
                                        me</label>
                                </div>
                                <a href="#" class="pwd">Forgot password?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="log-in">Register</button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Don't have an account? <a href="/student/register">Signup</a></div>
                       
                    </div>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
    <!-- End Info Section -->
@endsection
