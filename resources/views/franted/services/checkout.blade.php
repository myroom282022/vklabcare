@extends('franted.layout.app')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-color: #eee;
}
nav,.wrapper{
    padding: 10px 50px;
}
nav .logo a{
    color: #000;
    font-size: 1.2rem;
    font-weight: bold;
    text-decoration: none;
}
nav div.ml-auto a{
    text-decoration: none;
    font-weight: 600;
    font-size: 0.8rem;
}
header{
    padding: 20px 0px;
}
header .active{
    font-weight: 700;
    position: relative;
}
header .active .fa-check{
    position: absolute;
    left: 50%;
    bottom: -27px;
    background-color: #fff;
    font-size: 0.7rem;
    padding: 5px;
    border: 1px solid #008000;
    border-radius: 50%;
    color: #008000;
}
.progress{
    height: 2px;
    background-color: #ccc;
}
.progress div{
    display: flex;
    align-items: center;
    justify-content: center;
}
.progress .progress-bar{
    width: 40%;
}
#details{
    padding: 30px 50px;
    min-height: 300px;
}
input{
    border: none;
    outline: none;
}
.form-group .d-flex{
    border: 1px solid #ddd;
}
.form-group .d-flex input{
    width: 95%;
}
.form-group .d-flex:hover{
    color: #000;
    cursor: pointer;
    border: 1px solid #008000;
}
select{
    width: 100%;
    padding: 8px 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
input[type="checkbox"] + label{
    font-size: 0.85rem;
    font-weight: 600;
}
#address,#cart,#summary{
    padding: 20px 50px;

}
#address .d-md-flex p.text-justify,#register p.text-muted{
    margin: 0;
}
#register{
    background-color: #d9ecf2;
}
#register a{
    text-decoration: none;
    color: #333;
}
#cart,#summary{
    max-width: 500px;
}
.h6{
    font-size: 1.2rem;
    font-weight: 700;
}
.h6 a{
    text-decoration: none;
    font-size: 1rem;
}
.item img{
    object-fit: cover;
    border-radius: 5px;
}
.item{
    position: relative;
}
.number{
    position: absolute;
    font-weight: 800;
    color: #fff;
    background-color: #0033ff;
    padding-left: 7px;
    border-radius: 50%;
    border: 1px solid #fff;
    width: 25px;
    height: 25px;
    top: -5px;
    right: -5px;
}
.display-5{
    font-size: 1.2rem;
}
#cart ~ p.text-muted{
    margin: 0;
    font-size: 0.9rem;
}
tr.text-muted td{
    border: none;
}
.fa-minus,.fa-plus{
    font-size: 0.7rem;
}
.table td{
    padding: 0.3rem;
}
.btn.text-uppercase{
    border: 1px solid #333;
    font-weight: 600;
    border-radius: 0px;
}
.btn.text-uppercase:hover{
    background-color: #333;
    color: #eee;
}
.btn.text-white{
    background-color: #66cdaa;
    border-radius: 0px;
}
.btn.text-white:hover{
    background-color: #3cb371;
}
.wrapper .row + div.text-muted{
    font-size: 0.9rem;
}
.mobile,#mobile{
    display: none;
}
.buttons{
    vertical-align: text-bottom;
}
#register{
    width: 50%;
}
@media(min-width:768px) and (max-width: 991px){
    .progress .progress-bar{
        width: 33%;
    }
    #cart,#summary{
        max-width: 100%;
    }
    .wrapper div.h5.large,.wrapper .row + div.text-muted{
        display: none;
    }
    .mobile.h5,#mobile{
        display: block;
    }
}
@media(min-width: 576px) and (max-width: 767px){
    .progress .progress-bar{
        width: 29%;
    }
    #cart,#summary{
        max-width: 100%;
    }
    .wrapper div.h5.large,.wrapper .row + div.text-muted{
        display: none;
    }
    .mobile.h5,#mobile{
        display: block;
    }
    .buttons{
        width: 100%;
    }
}
@media(max-width: 575px){
    .progress .progress-bar{
        width: 38%;
    }
    #cart,#summary{
        max-width: 100%;
    }
    nav,.wrapper{
        padding: 10px 30px;
    }
    #register{
        width: 100%;
    }
}
@media(max-width: 424px){
    body{
        width: fit-content;
    }
}
@media(max-width: 375px){
    .progress .progress-bar{
        width: 35%;
    }
    body{
        width: fit-content;
    }
}
.razorpay-payment-button{
    margin-left: -252px;
    padding: 12px;
}
</style>

<header>
    <div class="d-flex justify-content-center align-items-center pb-3">
        <div class="px-sm-5 px-2 ">SHOPPING CART
        </div>
        <div class="px-sm-5 px-2 active">CHECKOUT
        <span class="fas fa-check"></span>
        </div>
        <div class="px-sm-5 px-2">FINISH</div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>
</header>
<div class="wrapper">
    <div class="h5 large">Billing Address</div>
    <div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6"> Payment </h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <!-- Credit card form content -->
                    <div class="tab-content">
                    <div class="col-sm">
  
                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
  
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif
  
                        <div class="card card-default">
                            <div class="card-header">
                                Laravel - Razorpay Payment Gateway Integration
                            </div>
                            
                            <div class="card-body text-center">
                                <form action="{{ route('payment.store') }}" method="POST" >
                                    <div class="pb-3 mx-5 mt-3">
                                        <div class="d-flex flex-row pb-3">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1"
                                            value="" aria-label="..." checked />
                                        </div>
                                        <div class="rounded border d-flex w-100 p-3 align-items-center">
                                            <p class="mb-0">
                                            <i class="fab fa-cc-visa fa-lg text-primary pe-2"></i>Visa Debit
                                            Card
                                            </p>
                                            <div class="ms-auto">************3456</div>
                                        </div>
                                        </div>

                                        <div class="d-flex flex-row">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2"
                                            value="" aria-label="..." />
                                        </div>
                                        <div class="rounded border d-flex w-100 p-3 align-items-center">
                                            <p class="mb-0">
                                            <i class="fab fa-cc-mastercard fa-lg text-dark pe-2"></i>Mastercard
                                            Office
                                            </p>
                                            <div class="ms-auto">************1038</div>
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
                                            data-buttontext="Add New Card"
                                            data-name="vk a3healthcare"
                                            data-description="Test Transation"
                                            data-order_id="{{$order->id}}"
                                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                            data-prefill.name="{{auth()->user()->name ?? ''}}"
                                            data-prefill.email="{{auth()->user()->email ?? ''}}"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                            <input type="button" value="Proceed to payment" class="btn btn-primary btn-block btn-lg" />
                        </div>
  
                    </div>
                   
                  
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
            <div id="cart" class="bg-white rounded">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="h6">Cart Summary</div>
                </div>
                <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                @foreach($cart as $key => $item)
                   
                    <div class="item pr-2">
                            <img src="{{url('storage/product/img/'.$item['product_image'])}}"
                                alt="" width="80" height="80">
                            <!-- <div class="number">1</div> -->
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

                <div class="my-3">
                    <input type="text" class="w-100 form-control text-center" placeholder="Gift Card or Promo Card">
                </div>
                @php
                     $Subtotal = 0 ;
                     $shipping=20 ;
                    @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $Subtotal += $details['product_price'] * $details['quantity'] @endphp
                    @endforeach
                <div class="d-flex align-items-center">
                    <div class="display-5">Subtotal</div>
                    <div class="ml-auto font-weight-bold">${{$Subtotal>0 ? $Subtotal :'00.00'}}</div>
                </div>
                <div class="d-flex align-items-center py-2 border-bottom">
                    <div class="display-5">Shipping</div>
                    <div class="ml-auto font-weight-bold">+ ${{$shipping<$Subtotal ? $shipping : '00.00'}}</div>
                </div>
                @php 
                    $Subtotal=$Subtotal+$shipping;
                    @endphp
                <div class="d-flex align-items-center py-2">
                    <div class="display-5">Total</div>
                    <div class="ml-auto d-flex">
                        <div class="text-primary text-uppercase px-3">usd</div>
                        <div class="font-weight-bold">${{$Subtotal>0 ? $Subtotal :'00.00'}}</div>
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

@endsection
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    // $(document).ready(function(){
    //     $(".shiiping").hide();
    //     $(".checkbox").click(function() {
    //         if($(this).is(":checked")) {
    //             $(".shiiping").hide(200);
    //         } else {
    //             $(".shiiping").show(300);
    //         }
    //     });
    // });
</script>