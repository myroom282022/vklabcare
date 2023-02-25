
@extends('franted.layout.app')
  @section('content')
    <main class="main-content  my-4">
      <section>
        <div class="page-header min-vh-75">
          <div class="container">
            <div class="row">
               <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                  
                  <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6">
                  <img src="{{asset('/front_assets/images/logRegImage/login.png')}}" alt="">
                </div>

                </div>
              </div>
              <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                    <p class="mb-0">Enter your email and password to sign in</p>
                  </div>
                  <div class="card-body">
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
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                          @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                      </div>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                      </div>
                      


                      <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                               
                                OR
  
                                <a class="btn btn-success" href="{{ route('otp.login') }}">
                                    Login with OTP
                                </a>
  
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>



                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Don't have an account?
                      <a href="{{route('user-register')}}" class="text-info text-gradient font-weight-bold">Sign up</a>
                    </p>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </section>
    </main>
  @endsection