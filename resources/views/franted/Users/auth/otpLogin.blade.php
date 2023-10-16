
@extends('franted.layout.app')
@section('content')
<style>
 
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: green; */
    /* display: none; */
    z-index: 1000;
}

.spinner {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* display: none; */
    z-index: 1001;
}

</style>
<section class="section ">

<div class="overlay"></div>
    <div class="spinner">
        <div class="text-center my-5 " style="color:#0bb2f0">
          <div class="spinner-grow spinner-grow-sm" role="status"></div>
          <div class="spinner-grow spinner-grow-sm" role="status"></div>
          <div class="spinner-grow spinner-grow-sm" role="status"></div>
          <span class="visually-hidden mx-2">Loading........</span>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-none d-lg-block">
        <img src="{{asset('/public/front_assets/images/logRegImage/login.png')}}" class="img-fluid" alt="Phone image">
			</div>
		  <div class="col-lg-6 ">
        <h5>Sign In / Sign Up</h5>
        <p>Sign up or Sign in to access your orders, special offers, health tips and more!</p>
        <form method="POST" action="{{ route('user-login-post') }}">
          @csrf
          <input type="hidden" name="product"  value="{{ $product ?? '' }}"/>
          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">PHONE NUMBER</label>
            <input type="text" id="phone_number" name="phone_number" maxlength="10" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"autofocus placeholder="Enter Your Registered Mobile Number"/>
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block start-loader">Sign In</button>
            @if (Route::has('user-login'))
                <a class="btn btn-link start-loader" href="{{ route('user-login') }}">
                    {{ __('Login With Email') }}
                </a>
            @endif
            @if (Route::has('register'))
                <a class="btn btn-link start-loader" href="{{route('user-register')}}">
                    {{ __('Sign up') }}
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

        $('.overlay').hide();
        $('.spinner').hide();
        $('.start-loader').click(function () {
          $('.overlay').show();
          $('.spinner').show();
        });

      $('#phone_number').on('input', function() {
        var inputValue = $(this).val();
        var numericValue = inputValue.replace(/[^0-9]/g, '');
        $(this).val(numericValue);
      });
    });
  </script>