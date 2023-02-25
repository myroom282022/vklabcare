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
</style>

<header>
    <div class="d-flex justify-content-center align-items-center pb-3">
        <div class="px-sm-5 px-2 active">SHOPPING CART
            <span class="fas fa-check"></span>
        </div>
        <div class="px-sm-5 px-2">CHECKOUT</div>
        <div class="px-sm-5 px-2">FINISH</div>
    </div>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>
</header>
<div class="wrapper">
    <div class="h5 large">Billing Address</div>
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
            <div class="mobile h5">Billing Address</div>
            <div id="details" class="bg-white rounded pb-5">
                <form action="{{route('billing-address-create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="text-muted">Name</label>
                        <input type="text" value="{{old('billing_name')}}" name="billing_name" placeholder="Name" class="form-control">
                        @if ($errors->has('billing_name'))
                            <span class="text-danger">{{ $errors->first('billing_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Email</label>
                        <input type="email" name="billing_email" placeholder="a@gmail.com" value="{{old('billing_email')}}" class="form-control">
                        @if ($errors->has('billing_email'))
                            <span class="text-danger">{{ $errors->first('billing_email') }}</span>
                        @endif
                    </div>
                    <div class="form-group ">
                        <label class="text-muted">Phone Number</label>
                        <input type="text" value="{{old('billing_phone_number')}}" name="billing_phone_number" placeholder="1234567890" class="form-control ">
                        @if ($errors->has('billing_phone_number'))
                            <span class="text-danger">{{ $errors->first('billing_phone_number') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">City</label>
                                <input type="text" value="{{old('billing_city')}}" name="billing_city" placeholder="Delhi" class="form-control ">
                                @if ($errors->has('billing_city'))
                                    <span class="text-danger">{{ $errors->first('billing_city') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">Zip Code</label>
                                <input type="text" value="{{old('billing_zip_code')}}" name="billing_zip_code" placeholder="212401" class="form-control ">
                                @if ($errors->has('billing_zip_code'))
                                    <span class="text-danger">{{ $errors->first('billing_zip_code') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">Address</label>
                                <input type="text" value="{{old('billing_address')}}" name="billing_address" placeholder="address" class="form-control ">
                                @if ($errors->has('billing_address'))
                                    <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">State</label>
                                <input type="text" value="{{old('billing_state')}}" name="billing_state" placeholder="Delhi" class="form-control ">
                                @if ($errors->has('billing_state'))
                                    <span class="text-danger">{{ $errors->first('billing_state') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <label>Country</label>
                    <select name="billing_country" id="country">
                        <!-- <option value="usa">USA</option> -->
                        <option value="ind">INDIA</option>
                    </select>
                    @if ($errors->has('billing_country'))
                        <span class="text-danger">{{ $errors->first('billing_country') }}</span>
                    @endif
                    <input class="checkbox" type="checkbox" class="my-3" checked name="is_same_shipping" value="yes">
                    <label class="my-3">Shipping address is same as billing</label>

                <!-- shipping details start -->

                    <div class="shiiping">
                    <div class="h5 large">Shpping Address</div>
                    <div class="form-group">
                        <label class="text-muted">Name</label>
                        <input type="text" value="{{old('shipping_name')}}" name="shipping_name" placeholder="Name" class="form-control">
                        @if ($errors->has('shipping_name'))
                            <span class="text-danger">{{ $errors->first('shipping_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Email</label>
                        <input type="email" name="shipping_email" placeholder="a@gmail.com" value="{{old('shipping_email')}}" class="form-control">
                        @if ($errors->has('shipping_email'))
                            <span class="text-danger">{{ $errors->first('shipping_email') }}</span>
                        @endif
                    </div>
                    <div class="form-group ">
                        <label class="text-muted">Phone Number</label>
                        <input type="text" value="{{old('shipping_phone_number')}}" name="shipping_phone_number" placeholder="1234567890" class="form-control ">
                        @if ($errors->has('shipping_phone_number'))
                            <span class="text-danger">{{ $errors->first('shipping_phone_number') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">City</label>
                                <input type="text" value="{{old('shipping_city')}}" name="shipping_city" placeholder="Delhi" class="form-control ">
                                @if ($errors->has('shipping_city'))
                                    <span class="text-danger">{{ $errors->first('shipping_city') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">Zip Code</label>
                                <input type="text" value="{{old('shipping_zip_code')}}" name="shipping_zip_code" placeholder="212401" class="form-control ">
                                @if ($errors->has('shipping_zip_code'))
                                    <span class="text-danger">{{ $errors->first('shipping_zip_code') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">Address</label>
                                <input type="text" value="{{old('shipping_address')}}" name="shipping_address" placeholder="address" class="form-control ">
                                @if ($errors->has('shipping_address'))
                                    <span class="text-danger">{{ $errors->first('shipping_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label class="text-muted">State</label>
                                <input type="text" value="{{old('shipping_state')}}" name="shipping_state" placeholder="Delhi" class="form-control ">
                                @if ($errors->has('billing_state'))
                                    <span class="text-danger">{{ $errors->first('shipping_state') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <label>Country</label>
                    <select name="shipping_country" id="country">
                        <option value="usa">USA</option>
                        <option value="ind">INDIA</option>
                    </select>
                    @if ($errors->has('shipping_country'))
                        <span class="text-danger">{{ $errors->first('shipping_country') }}</span>
                    @endif
                </div>

                <!-- shipping details end -->


                    <div id="" class=" rounded mt-3">
                        <div class="row pt-lg-3 pt-2 buttons mb-sm-0 mb-2">
                                <div class="col-md-6">
                                <a href="{{route('cart-item')}}">
                                    <div class="btn text-uppercase">back to shopping</div>
                                </a>
                                </div>
                            <div class="col-md-6 pt-md-0 pt-3" >
                                <button type="submit">
                                    <div class="btn text-white ml-auto">
                                        <span class="fas fa-lock">Continue to CHECKOUT</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
    $(document).ready(function(){
        $(".shiiping").hide();
        $(".checkbox").click(function() {
            if($(this).is(":checked")) {
                $(".shiiping").hide(200);
            } else {
                $(".shiiping").show(300);
            }
        });
    });
</script>