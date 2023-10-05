@extends('franted.layout.app')
@section('content')
@include('franted.Users.common.sidebar')

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              @if (auth()->user()->user_image ?? '')
              <img src="{{url('storage/users/img/'.auth()->user()->user_image)}}" alt="" class="user-image object-fit-sm-contain">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid object-fit-sm-contain" style="width: 150px;">
              @endif
              <h5 class="my-3">{{auth()->user()->name ?? ''}}</h5>
              <p class="text-muted mb-1">Referral code : <span class="text-info">{{auth()->user()->referral_code  ?? ''}}</span></p>
              <p class="text-muted mb-1">Wallet Amount : <span class="text-info">₹{{auth()->user()->bounce  ?? ''}}</span></p>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active profile-update" id="tab-login" data-mdb-toggle="pill" href="#pills-login"role="tab"aria-controls="pills-login" aria-selected="true">Profile Update</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a  class="nav-link change-pass" id="tab-register" data-mdb-toggle="pill" href="#pills-register"role="tab"
                    aria-controls="pills-register" aria-selected="false">Change Password</a>
                </li>
                </ul>
                <!-- Pills content -->
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="{{route('profile.update')}}" method="post" enctype= multipart/form-data>
                      @csrf
                        <!-- Name input -->
                        <input type="hidden" value="{{auth()->user()->id ?? ''}}" name="id">
                        <div class="form-outline mb-4">
                            <input type="text" id="registerName" class="form-control @error('name') is-invalid @enderror" autofocus name="name" value="{{auth()->user()->name}}"/>
                            <label class="form-label" for="registerName">Name</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control @error('email') is-invalid @enderror" autofocus name="email" value="{{auth()->user()->email}}"/>
                            <label class="form-label" for="registerEmail">Email</label>
                        </div>
                        
                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            <input type="text" maxlength="10" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" autofocus placeholder="Enter Your Registered Mobile Number"name="phone_number" value="{{auth()->user()->phone_number}}"/>
                            <label class="form-label" for="phone_number">Phone Number</label>
                        </div>
                        <div class="form-outline mb-4">
                          <label class="form-label" for="customFile">Profile Image</label>
                          <input type="file" name="user_image" value="{{auth()->user()->user_image ?? ''}}" class="form-control @error('user_image') is-invalid @enderror" autofocus id="customFile" />
                      </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form action="{{route('profile.update.password')}}" method="post">
                      @csrf
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control @error('current_password') is-invalid @enderror" autofocus name="current_password"/>
                            <label class="form-label" for="loginPassword"> Current Password</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control @error('new_password') is-invalid @enderror" autofocus name="new_password"/>
                            <label class="form-label" for="loginPassword"> New Password</label>
                            <i class="fa fa-eye-slash password-eyes" id="togglePassword" aria-hidden="true"></i>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control @error('confirm_password') is-invalid @enderror" autofocus name="confirm_password"/>
                            <label class="form-label" for="loginPassword"> Confirm Password</label>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 change-button">Submit</button>
                    </form>
                </div>
                </div>
                <!-- Pills content -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@include('franted.Users.common.footer')
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