@extends('franted.layout.app')
@section('content')
<section>
    <div class="container py-5">
        <header>
            <div class="d-flex justify-content-center align-items-center pb-3">
                <div class="px-sm-5 px-2  heading-color">BILLING ADDRESH</div>
                <div class="px-sm-5 px-2 active heading-color">PAYMENT
                    <span class="fas fa-check"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                </div>
                <div class="px-sm-5 px-2 heading-color">SUCCESS</div>
            </div>
            <div class="progress">
                <div class="progress-bar-payment btn-color" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">
                </div>
            </div>
        </header>

        <div class="wrapper card my-5">
            <div class="container py-5">
            <div class="row ">
                <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
                    <div  class="bg-white rounded pb-5">
                        <h3 class="text-center mt-3 heading-color m-auto">Payment Method</h3>
                        <div class="pb-3 mx-5 mt-3">
                            <div class="d-flex flex-row  my-3 cash-on-booking">
                                <div class="rounded border d-flex w-100 p-3 align-items-center">
                                    <p class="mb-0"> Cash on booking</p>
                                    <div class="mx-3"><i class="fa fa-money" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row online-booking">
                                <div class="rounded border d-flex w-100 p-3 align-items-center">
                                    <p class="mb-0">Online Booking</p>
                                    <div class="mx-3">
                                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    <i class="fa fa-paypal" aria-hidden="true"></i>
                                    <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                                    <i class="fa fa-cc-visa" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('payment.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="payment_type" class="payment-type" value="online">
                                @php
                                $Subtotal = 0 ;
                                $shipping=0 ;
                                @endphp
                                @foreach($cart as $key => $packageData)
                                @foreach($packageData->getPackage as $key => $details)
                                    @php $Subtotal += $details['package_discount_price'] * 1 @endphp
                                @endforeach
                                @endforeach
                                @php
                                    $totalPrice= ($Subtotal+$shipping)*100;
                                    $api = new Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                                    $order = $api->order->create(array(
                                        'amount'  =>  $totalPrice,
                                        'currency' =>"INR"
                                    )); 
                                @endphp

                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount=" {{$totalPrice}}"
                                        data-currency="INR"
                                        {{-- data-buttontext="Add New Card" --}}
                                        data-name="vka3 healthcare"
                                        data-description="Test Transation"
                                        data-order_id="{{$order->id}}"
                                        data-image="https://vka3healthcare.com/public/front_assets/images/vka3logo.png"
                                        data-prefill.name="{{auth()->user()->name ?? ''}}"
                                        data-prefill.email="{{auth()->user()->email ?? ''}}"
                                        data-theme.color="#4ecef4">
                                </script>
                                <button type="submit" class="btn payment-button online-btn mt-3">Proceed to payment</button>
                            </form>
                            <form action="{{ route('payment.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="payment_type" class="payment-type" value="cash">
                                <button type="submit" class="btn payment-button cash-btn">Proceed to payment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
                    <div id="cart" class="bg-white rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h6">Bookings Details</div>
                        </div>
                            @foreach($cart as $key => $packageData)
                                @foreach($packageData->getPackage as $key => $item)
                                    <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">

                                        <div class="item">
                                            <img src="{{asset('public/storage/package/img/'.$item['package_image'])}}"
                                                alt="" width="80" height="80">
                                        </div>
                                        <div class="d-flex flex-column mx-1">
                                            <b class="h5">{{$item['package_name']}}</b>
                                            <a href="#" class=" text-info">{{ str_replace('\n', ',', trim($item['package_description'] ?? '')) }}</a>
                                            
                                        </div>
                                        <div class="ml-auto">
                                            <b class="h5">₹{{$item['package_discount_price'] ?? ''}}</b>
                                        </div>
                                    </div>
                                @endforeach 
                            @endforeach 
                    </div>
                        <div class="my-3">
                            <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card">
                        </div>
                        @php
                            $Subtotal = 0 ;
                            $shipping= 0.00 ;
                            @endphp
                                @foreach($cart as $key => $packageData)
                                    @foreach($packageData->getPackage as $key => $details)
                                        @php $Subtotal += $details['package_discount_price'] *  1 @endphp
                                    @endforeach
                                @endforeach
                        <div class="d-flex align-items-center">
                            <div class="display-5">Subtotal</div>
                            <div class="ml-auto font-weight-bold">₹{{$Subtotal>0 ? $Subtotal :'00.00'}}</div>
                        </div>
                        <div class="d-flex align-items-center py-2 border-bottom">
                            <div class="display-5">Shipping</div>
                            <div class="ml-auto font-weight-bold">+ ₹{{$shipping<$Subtotal ? $shipping : '00.00'}}</div>
                        </div>
                        @php 
                            $Subtotal=$Subtotal+$shipping;
                            @endphp
                        <div class="d-flex align-items-center py-2">
                            <div class="display-5">Total</div>
                            <div class="ml-auto d-flex">
                                <div class="text-primary text-uppercase px-3">inr</div>
                                <div class="font-weight-bold">₹{{$Subtotal>0 ? $Subtotal :'00.00'}}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-muted pt-3" id="mobile">
                        <span class="fas fa-lock"></span>
                        Your information is save
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".cash-btn").hide();
        $(".online-btn").show();
        $('.online-booking').addClass('checkout-box');

        $(".cash-on-booking").click(function() {
            $('.online-booking').removeClass('checkout-box');
            $(this).addClass('checkout-box');
            $(".online-btn").hide();
            $(".cash-btn").show();
        });

        $(".online-booking").click(function() {
            $('.cash-on-booking').removeClass('checkout-box');
            $(this).addClass('checkout-box');
            $(".cash-btn").hide();
            $(".online-btn").show();
        });

        
       
    });
</script>
