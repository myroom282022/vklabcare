
@extends('franted.layout.app')

<style>
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
</style>
@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
      
        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" -->
        <img src="{{asset('/front_assets/images/logRegImage/login.png')}}" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
       <h5>Sign In / Sign Up</h5>
       <p>Sign up or Sign in to access your orders, special offers, health tips and more!</p>
        @if (session('error'))
            <div class="alert alert-danger" role="alert"> {{session('error')}} 
            </div>
        @endif
        <form method="POST" action="{{ route('user-login-post') }}">
            @csrf
  
          <!-- Password input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form1Example23">PHONE NUMBER</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"autofocus placeholder="Enter Your Registered Mobile Number"/>
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
            @if (Route::has('user-login'))
                <a class="btn btn-link" href="{{ route('user-login') }}">
                    {{ __('Login With Email') }}
                </a>
            @endif
            @if (Route::has('register'))
                <a class="btn btn-link" href="{{route('user-register')}}">
                    {{ __('Sign up') }}
                </a>
            @endif
           <!-- Register buttons -->
           <div class="text-center">
                  <p>or sign up with:</p>
          
                <ul class="list-inline footer-socials mt-4">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/themefisher"><i class="icofont-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a>
                    </li>
                </ul>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection