@extends('franted.layout.app')
<style>
	body{background-color:red}.height-100{height:100vh}.card{width:500px;border:none;height:500px;box-shadow: 0px 5px 20px 0px #d2dae3;z-index:1;display:flex;justify-content:center;align-items:center}.card h6{color:red;font-size:20px}.inputs input{width:40px;height:40px}input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button{-webkit-appearance: none;-moz-appearance: none;appearance: none;margin: 0}.card-2{background-color:#fff;padding:10px;width:350px;height:100px;bottom:-50px;left:20px;position:absolute;border-radius:5px}.card-2 .content{margin-top:50px}.card-2 .content a{color:red}.form-control:focus{box-shadow:none;border:2px solid red}.validate{border-radius:20px;height:40px;background-color:red;border:1px solid red;width:140px}
 </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="container d-flex justify-content-center">
		<div class="container height-100 d-flex justify-content-center align-items-center"> 
			<div class="position-relative"> <div class="card p-2 text-center"> 
				<h6>Please enter the one time password <br> to verify your account</h6> 
				
				@php 
				$phoneNumberDeegits=substr($user->phone_number, -4);
				@endphp
				<div> <span>A code has been sent to</span> <small>*******{{$phoneNumberDeegits}}</small> </div> 
				<form method="post" action="{{ route('otp.getlogin') }}" >
                @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <input type="hidden" name="otp" id="twilio_otp" value="">
					<div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
						<input class="m-2 text-center form-control rounded" type="text" name="first" id="first" maxlength="1" />
						 <input class="m-2 text-center form-control rounded" type="text" name="second" id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" name="third" id="third" maxlength="1" /> 
						 <input class="m-2 text-center form-control rounded" type="text" name="fourth" id="fourth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" name="fifth" id="fifth" maxlength="1" /> 
						 <input class="m-2 text-center form-control rounded" type="text" name="sixth" id="sixth" maxlength="1" />
					</div> 
					<div class="mt-4"> <button type="submit" class="btn btn-danger px-4 veryfy-form validate">Verify OTP</button> </div>
				</form>
					
					
				 </div>
				<div class="card-2">
					<div class="content d-flex justify-content-center align-items-center">
						<form  method="post" action="{{route('otp.resend')}}">
							@csrf
							<input type="hidden" name="user_id" value="{{$user->id}}" />
							<button class="btn btn-success">Resend OTP</button> 
						</form>
						
					</div>
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
for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput();
    
});


$(".veryfy-form").click(function(){
let first=$('#first').val();
let second=$('#second').val();
let third=$('#third').val();
let fourth=$('#fourth').val();
let fifth=$('#fifth').val();
let sixth=$('#sixth').val();
let twilio_otp=first +second+third +fourth+ fifth+sixth;
    // let keyword= $(this).find("input").val();
	$('#twilio_otp').val(twilio_otp);
   
});
</script>

@endpush