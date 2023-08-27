@extends('franted.layout.app')
@section('content')
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="container d-flex justify-content-center col-sm-6 my-4">
            <div class="container height-100 d-flex justify-content-center align-items-center"> 
                <div class="position-relative"> 
                    <div class="card p-2 text-center"> 
                        <h5 class="heading-color mt-4">Please enter the one time password <br> to verify your account</h5> 
                        @php 
                        $phoneNumberDeegits=substr($user->phone_number, -4);
                        @endphp
                    <div>
                        <span class="text-justify">A code has been sent to phone</span> <small class="heading-color">*******{{$phoneNumberDeegits}}</small>
                        <br/> 
                        <span class="text-justify">A code has been sent to email </span> <small class="heading-color">{{$user->email}}</small> 
                    </div> 
                    <form method="post" action="{{ route('otp.getlogin') }}" >
                    @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}" />
                            <input type="hidden" name="otp" id="twilio_otp" value="">
                            <div class="row">
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2 col-sm-8 m-auto">
                                    <input class="m-2 text-center form-control rounded" type="text" name="first" id="first" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" name="second" id="second" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" name="third" id="third" maxlength="1" /> 
                                    <input class="m-2 text-center form-control rounded" type="text" name="fourth" id="fourth" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" name="fifth" id="fifth" maxlength="1" /> 
                                    <input class="m-2 text-center form-control rounded" type="text" name="sixth" id="sixth" maxlength="1" />
                                </div> 
                            </div>
                        <div class="mt-4"> <button type="submit" class="btn btn-success veryfy-form ">Verify OTP</button> </div>
                    </form>
                    <form  method="post" action="{{route('otp.resend')}}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <button class="btn btn-color my-3">Resend OTP</button> 
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('input', function(event) {
                    if (event.target.value.length === 1) {
                        if (i < inputs.length - 1) {
                            inputs[i + 1].focus();
                        } else {
                            inputs[i].blur(); // Move focus away from the last input
                        }
                    } else if (event.target.value.length === 0) {
                        if (i > 0) {
                            inputs[i - 1].focus();
                        }
                    }
                });

                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        if (i > 0) {
                            inputs[i - 1].focus();
                        }
                    }
                });
            }
        }
        OTPInput();

        $(".veryfy-form").click(function() {
            let twilio_otp = '';
            const inputs = document.querySelectorAll('#otp > *[id]');
            inputs.forEach(function(input) {
                twilio_otp += input.value;
            });
            document.getElementById('twilio_otp').value = twilio_otp;
        });
    });
</script>
@endpush
