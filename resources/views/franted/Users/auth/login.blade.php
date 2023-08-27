
@extends('franted.layout.app')
  @section('content')
    <section>
      <div class="container">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <img src="{{asset('/front_assets/images/logRegImage/login.png')}}" class="img-fluid" alt="Phone image">
            </div>
          <div class="col-lg-6 ">
            <div class=" pb-0 text-left d-flex flex-column mx-auto">
              <h3 class="font-weight-bolder heading-color text-gradient">Welcome back</h3>
              <p class="mb-0">Enter your email and password to sign in</p>
            </div>
            <form role="form" action="{{ route('user-login-post') }}" method="POST">
              @csrf
              <label>Email</label>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" required autofocus>
                  @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
              </div>
              <label>Password</label>
              <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                <i class="fa fa-eye-slash password-eyes" id="togglePassword" aria-hidden="true"></i>
                @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
              
               <!-- Submit button -->
              <button type="submit" class="btn btn-color btn-lg btn-block my-3">Sign In</button>
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