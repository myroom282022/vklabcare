@extends('franted.layout.app')
@section('content')

<section class="my-4">
    <div class="container">
        <header>
            <div class="d-flex justify-content-center align-items-center pb-3">
                <div class="px-sm-5 px-2 active heading-color">BILLING ADDRESH
                    <span class="fas fa-check"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                </div>
                <div class="px-sm-5 px-2 heading-color">PAYMENT</div>
                <div class="px-sm-5 px-2 heading-color">SUCCESS</div>
            </div>
            <div class="progress">
                <div class="progress-bar-billing btn-color" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </header>
        <div class="wrappermy-3">
            <div class="h5 large mt-3">Billing Address</div>
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1">
                    <div class="mobile h5">Billing Address</div>
                    <div id="details" class="bg-white rounded pb-5">
                        <form action="{{route('billing-address-create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="text-muted">Name</label>
                                <input type="text" value="{{$billing->billing_name ?? $userData->name ?? ''}}" name="billing_name" class="form-control">
                                @if ($errors->has('billing_name'))
                                    <span class="text-danger">{{ $errors->first('billing_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="text-muted">Email</label>
                                <input type="email" name="billing_email"  value="{{$billing->billing_email ?? $userData->email ?? ''}}" class="form-control">
                                @if ($errors->has('billing_email'))
                                    <span class="text-danger">{{ $errors->first('billing_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label class="text-muted">Phone Number</label>
                                <input type="text" value="{{$billing->billing_phone_number ?? $userData->phone_number ?? ''}}" maxlength="10" name="billing_phone_number"  class="form-control phone_number">
                                @if ($errors->has('billing_phone_number'))
                                    <span class="text-danger">{{ $errors->first('billing_phone_number') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">State</label>
                                        <input type="text" value="{{$billing->billing_state ?? $currentUserInfo->regionName}}" name="billing_state"  class="form-control ">
                                        @if ($errors->has('billing_state'))
                                            <span class="text-danger">{{ $errors->first('billing_state') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">City</label>
                                        <input type="text" value="{{$billing->billing_city ?? $currentUserInfo->cityName }}" name="billing_city"  class="form-control ">
                                        @if ($errors->has('billing_city'))
                                            <span class="text-danger">{{ $errors->first('billing_city') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">Address</label>
                                        <input type="text" value="{{$billing->billing_address ?? ''}}" name="billing_address"  class="form-control ">
                                        @if ($errors->has('billing_address'))
                                            <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">Zip Code</label>
                                        <input type="text" value="{{$billing->billing_zip_code ?? $currentUserInfo->zipCode}}" name="billing_zip_code" maxlength="6" class="form-control phone_number">
                                        @if ($errors->has('billing_zip_code'))
                                            <span class="text-danger">{{ $errors->first('billing_zip_code') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <label>Country</label>
                            <select name="billing_country" id="country">
                                <!-- <option value="usa">USA</option> -->
                                <option value="{{$billing->billing_country ?? $currentUserInfo->countryName}}">{{$billing->billing_country ?? $currentUserInfo->countryName }}</option>
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
                                <input type="text" value="{{$shipping->shipping_name ?? $userData->name ?? ''}}" name="shipping_name"  class="form-control">
                                @if ($errors->has('shipping_name'))
                                    <span class="text-danger">{{ $errors->first('shipping_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="text-muted">Email</label>
                                <input type="email" name="shipping_email"  value="{{$shipping->shipping_email ?? $userData->email ?? ''}}" class="form-control">
                                @if ($errors->has('shipping_email'))
                                    <span class="text-danger">{{ $errors->first('shipping_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label class="text-muted">Phone Number</label>
                                <input type="text"  value="{{$shipping->shipping_phone_number ?? $userData->phone_number ?? ''}}" maxlength="10" name="shipping_email"  class="form-control phone_number">
                                @if ($errors->has('shipping_email'))
                                    <span class="text-danger">{{ $errors->first('shipping_email') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">State</label>
                                        <input type="text" value="{{$shipping->shipping_state ?? $currentUserInfo->regionName}}" name="shipping_state"  class="form-control ">
                                        @if ($errors->has('shipping_state'))
                                            <span class="text-danger">{{ $errors->first('shipping_state') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">City</label>
                                        <input type="text" value="{{$shipping->shipping_city ?? $currentUserInfo->cityName}}" name="shipping_city"  class="form-control ">
                                        @if ($errors->has('shipping_city'))
                                            <span class="text-danger">{{ $errors->first('shipping_city') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">Address</label>
                                        <input type="text" value="{{$shipping->shipping_address ?? ''}}" name="shipping_address"  class="form-control ">
                                        @if ($errors->has('shipping_address'))
                                            <span class="text-danger">{{ $errors->first('shipping_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="text-muted">Zip Code</label>
                                        <input type="text" value="{{$shipping->shipping_zip_code ?? $currentUserInfo->zipCode}}" name="shipping_zip_code" maxlength="6" class="form-control phone_number">
                                        @if ($errors->has('shipping_zip_code'))
                                            <span class="text-danger">{{ $errors->first('shipping_zip_code') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <label>Country</label>
                            <select name="shipping_country" id="country">
                            <option value="{{$shipping->shipping_country ?? $currentUserInfo->countryName}}">{{$shipping->shipping_country ?? $currentUserInfo->countryName}}</option>
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
                                            <button class="btn btn-color text-uppercase">back to shopping</button>
                                        </a>
                                        </div>
                                    <div class="col-md-6 pt-md-0 pt-3" >
                                        <button type="submit" class="btn btn-color text-uppercase">
                                         CHECKOUT
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
                                    <b class="h5">₹{{$item['product_price']}}</b>
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
        $(".shiiping").hide();
        $(".checkbox").click(function() {
            if($(this).is(":checked")) {
                $(".shiiping").hide(200);
            } else {
                $(".shiiping").show(300);
            }
        });

        // validate phone number --------------------
      $('.phone_number').on('input', function() {
        var inputValue = $(this).val();
        var numericValue = inputValue.replace(/[^0-9]/g, '');
        $(this).val(numericValue);
      });

    });
</script>