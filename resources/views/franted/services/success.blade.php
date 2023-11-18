@extends('franted.layout.app')
@section('content')
<style>



.confetti {
  position: absolute;
  z-index: 1;
  top: -10px;
  border-radius: 0%;

  &--animation-slow {
    animation: confetti-slow 2.25s linear 1 forwards;
  }
  
  &--animation-medium {
    animation: confetti-medium 1.75s linear 1 forwards;
  }
  
  &--animation-fast {
    animation: confetti-fast 1.25s linear 1 forwards;
  }
}
/* Checkmark */
.checkmark-circle {
  width: 100px;
  height: 100px;
  position: relative;
  display: inline-block;
  vertical-align: top;
  margin-left: auto;
  margin-right: auto;
}
.checkmark-circle .background {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #4BC8F1;
  position: absolute;
}

.checkmark-circle .checkmark.draw:after {
  -webkit-animation-delay: 100ms;
  -moz-animation-delay: 100ms;
  animation-delay: 100ms;
  -webkit-animation-duration: 3s;
  -moz-animation-duration: 3s;
  animation-duration: 3s;
  -webkit-animation-timing-function: ease;
  -moz-animation-timing-function: ease;
  animation-timing-function: ease;
  -webkit-animation-name: checkmark;
  -moz-animation-name: checkmark;
  animation-name: checkmark;
  -webkit-transform: scaleX(-1) rotate(135deg);
  -moz-transform: scaleX(-1) rotate(135deg);
  -ms-transform: scaleX(-1) rotate(135deg);
  -o-transform: scaleX(-1) rotate(135deg);
  transform: scaleX(-1) rotate(135deg);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.checkmark-circle .checkmark:after {
  opacity: 1;
  height: 75px;
  width: 37.5px;
  -webkit-transform-origin: left top;
  -moz-transform-origin: left top;
  -ms-transform-origin: left top;
  -o-transform-origin: left top;
  transform-origin: left top;
  border-right: 15px solid white;
  border-top: 15px solid white;
  border-radius: 2.5px !important;
  content: '';
  left: 8%;
  top: 57%;
  position: absolute;
}

@-webkit-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@-moz-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}

header .active .fa-check {
    position: absolute;
    left: 37%;
    bottom: -44px !important;
    background-color: #fff;
    font-size: 30px;
    color: var(--skyblue);
}
</style>
<section>
    <div class="container py-5">
        <header>
            <div class="d-flex justify-content-center align-items-center pb-3">
                <div class="px-sm-5 px-2  heading-color">BILLING ADDRESH</div>
                <div class="px-sm-5 px-2  heading-color">PAYMENT</div>
                <div class="px-sm-5 px-2 active heading-color">SUCCESS
                  <span class="fas fa-check"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar-success btn-color" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">
                </div>
            </div>
        </header>

        <div class="wrappermy-5">
            <div class="container py-5">
            
            <div class="row">
                <div class="col-lg-6 card m-auto ">
                        <h3 class="text-center mt-5 heading-color">✨ Congratulations ! ✨</h3>
                        <div class="card-body text-center">
                        <div class="checkmark-circle">
                           <div class="background"></div>
                           <div class="checkmark draw"></div>
                        </div>
                        <h5 class="my-3 heading-color">Your payment successfully ! </h5>
                           <a href="{{route('user-orders')}}"><button type="submit" class="btn btn-color mb-5">My Orders</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
