@extends('franted.layout.app')
@section('content')
<section class="section">
	<div class="container">
		<div class="row">
      <div class="col-sm-md-8 col-lg-7 col-xl-6 d-none d-lg-block">
        <img src="{{asset('/public/front_assets/images/logRegImage/login.png')}}" class="img-fluid" alt="Phone image"> 
      </div>
      <div class="col-sm-md-7 col-lg-5 col-xl-5 offset-xl-1">
       <h5 class="heading-color">Sign Up</h5>
       <p>Sign up or Sign in to access your orders, special offers, health tips and more!</p>
       
        <form method="POST" action="{{ route('user-register-post') }}">
            @csrf
          <!-- Password input -->
          <div class="form-outline mb-1">
            <label class="form-label" for="phone_number">Name</label>
            <input type="text" id="name" name="name" class="form-control form-control-lg  @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus placeholder="Enter Name"/>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="form-outline mb-1">
            <label class="form-label" for="phone_number">Email</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" value="{{$email ?? old('email') }}" autofocus placeholder="Enter Email"/>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="form-outline mb-1">
              <label class="form-label" for="phone_number">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" value="{{ old('password') }}" autofocus placeholder="************"/>
              <i class="fa fa-eye-slash password-eyes" id="togglePassword" aria-hidden="true"></i>
              @if ($errors->has('password'))
                  <span class="text-danger text-left">{{ $errors->first('password') }}</span>
              @endif
          </div>

          <div class="form-outline mb-1">
            <label class="form-label" for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" maxlength="10" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" value="{{$phone_number ?? old('phone_number') }}"autofocus placeholder="Enter Your Registered Mobile Number"/>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('phone_number') }}</span>
            @endif
          </div>
          @if($referral_code)
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Referral code (optional)</label>
            <input type="text"  name="referral_code"  class="form-control form-control-lg " readonly value="{{$referral_code }}"/>
          </div>
          @endif
          <!-- Submit button -->
          <button type="submit" class="btn btn-color btn-lg btn-block mt-3">Submit</button>
            @if (Route::has('login'))
                <a class="btn btn-link heading-color" href="{{ route('user-login') }}">
                    {{ __('Login With Email') }}
                </a>
            @endif
            @if (Route::has('otp.login'))
                <a class="btn btn-link heading-color" href="{{route('otp.login')}}">
                    {{ __('Login With Phone') }}
                </a>
            @endif
           <!-- Register buttons -->
           <div class="text-center">
              <p>or sign up with:</p>
              <ul class="list-inline footer-socials mt-4">
                  
                  <li class="list-inline-item">
                      <a href="#"><i class="icofont-google-plus"></i></a>
                  </li>
                  <li class="list-inline-item">
                      <a href="#"><i class="icofont-facebook"></i></a>
                  </li>
                  <li class="list-inline-item">
                      <a href="#"><i class="icofont-twitter"></i></a>
                  </li>
                  <li class="list-inline-item">
                      <a href=""><i class="icofont-linkedin"></i></a>
                  </li>
              </ul>
            </div>  
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#phone_number').on('input', function() {
        var inputValue = $(this).val();
        var numericValue = inputValue.replace(/[^0-9]/g, '');
        $(this).val(numericValue);
      });

      $("#togglePassword").click(function() {
            var passwordInput = $("#password");
            var icon = $(this);
            
            if (passwordInput.attr("type") === "password") {
                passwordInput.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    });
  </script>
