
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
      
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image"> 
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
       <h5>Sign Up</h5>
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
            <input type="email" id="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus placeholder="Enter Email"/>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="form-outline mb-1">
            <label class="form-label" for="phone_number">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" value="{{ old('password') }}" autofocus placeholder="************"/>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <div class="form-outline mb-1">
            <label class="form-label" for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"autofocus placeholder="Enter Your Registered Mobile Number"/>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('phone_number') }}</span>
            @endif
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Submit</button>
            @if (Route::has('login'))
                <a class="btn btn-link" href="{{ route('user-login') }}">
                    {{ __('Login With Email') }}
                </a>
            @endif
            @if (Route::has('otp.login'))
                <a class="btn btn-link" href="{{route('otp.login')}}">
                    {{ __('Login With Phone') }}
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