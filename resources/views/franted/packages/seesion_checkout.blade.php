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
                <div class="card-body text-center col-sm-6">
                    <h3 class="text-center mt-3 heading-color m-auto">Payment Method</h3>
                    <form action="{{ route('payment.store') }}" method="POST" >
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
                        </div>
                        @csrf
                        @foreach($cart as $key => $item)
                            <input type="hidden" name="product_image"value="{{$item['product_image']}}">
                            <input type="hidden" name="product_name"value="{{$item['product_name']}}">
                            <input type="hidden" name="product_description"value="{{$item['product_description']}}">
                            <input type="hidden" name="product_price"value="{{$item['product_price']}}">
                        @endforeach 
                        @php
                            $Subtotal = 0 ;
                            $shipping=20 ;
                        @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $Subtotal += $details['product_price'] * $details['quantity'] @endphp
                            <input type="hidden" name="quantity"value="{{$details['quantity']}}">
                        @endforeach
                        @php
                            $totalPrice= ($Subtotal+$shipping)*100;
                            $api = new Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                            $order = $api->order->create(array(
                                'amount'  =>  $totalPrice,
                                'currency' =>"INR"
                            )); 
                        @endphp
                        <input type="hidden" name="total_price"value="{{$totalPrice}}">
                        <input type="hidden" name="delivery_charge"value="{{$shipping}}">
                        <input type="hidden" name="discount_price"value="0">
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
                    <button type="submit" class="btn  payment-button online-btn">Proceed to payment</button>
                    </form>
                    <form class="cash-btn" action="{{ route('payment.store') }}" method="POST" >
                        @csrf
                        @foreach($cart as $key => $item)
                        <input type="hidden" name="product_image"value="{{$item['product_image']}}">
                        <input type="hidden" name="product_name"value="{{$item['product_name']}}">
                        <input type="hidden" name="product_description"value="{{$item['product_description']}}">
                        <input type="hidden" name="product_price"value="{{$item['product_price']}}">
                    @endforeach 
                    <input type="hidden" name="total_price"value="{{$totalPrice}}">
                    <input type="hidden" name="delivery_charge"value="{{$shipping}}">
                    <input type="hidden" name="discount_price"value="0">
                    <button type="submit" class="btn  payment-button cash-btn " style="display:none">Proceed to payment</button>
                    </form>
                </div>

                <div class=" col-lg-5">
                    <div id="cart" class="bg-white rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h6 heading-color">Booking Details</div>
                        </div>
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                        @foreach($cart as $key => $item)
                            <div class="item pr-2">
                                    <img src="{{url('storage/product/img/'.$item['product_image'])}}"
                                        alt="" width="80" height="80">
                                </div>
                                <div class="d-flex flex-column px-3">
                                    <b class="h5">{{$item['product_name']}}</b>
                                    <a href="#" class="h5 text-primary">{{$item['product_description']}}</a>
                                </div>
                                <div class="ml-auto">
                                    <b class="h5">${{$item['product_price']}}</b>
                                </div>
                            </div>
                        @endforeach 
                        @php
                            $Subtotal = 0 ;
                            $shipping=20 ;
                            @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $Subtotal += $details['product_price'] * $details['quantity'] @endphp
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
                                <div class="text-primary text-uppercase px-3">usd</div>
                                <div class="font-weight-bold">₹{{$Subtotal>0 ? $Subtotal :'00.00'}}</div>
                            </div>
                        </div>

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