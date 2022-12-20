@extends('franted.layout.app')
@section('content')
<style>


.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}

.card-registration .select-arrow {
top: 13px;
}

.bg-grey {
background-color: #eae8e8;
}

@media (min-width: 992px) {
.card-registration-2 .bg-grey {
border-top-right-radius: 16px;
border-bottom-right-radius: 16px;
}
}

@media (max-width: 991px) {
.card-registration-2 .bg-grey {
border-bottom-left-radius: 16px;
border-bottom-right-radius: 16px;
}
}
    </style>



<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>
                  @if($cart)
                  @foreach($cart as $key => $item)
                  <hr class="my-4">
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="{{url('storage/product/img/'.$item['product_image'])}}"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$item['product_name']}}</h6>
                      <h6 class="text-black mb-0">{{$item['product_description']}}</h6>
                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">{{$item['quantity']}}</h6>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">€ {{$item['product_price']}}</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="{{url('services/remove-from-cart/'.$key)}}" class="text-muted"><i class="icofont-close"></i></a>
                    </div>
                  </div>
                 @endforeach 
                 <hr class="my-4">
                 @else
                    <div >
                      <h6 class="mb-0 text-danger">Empty cart</h6>
                    </div>
                 @endif

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="{{route('services.index')}}" class="btn btn-info sm"><i class="icofont-long-arrow-left"></i>Back to Booking</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-4">
                  
                
                  <h5 class="text-uppercase mb-3">Give code</h5>

                  <div class="mb-3">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                    </div>
                  </div>

                  <hr class="my-4">

                    @php
                     $Subtotal = 0 ;
                     $discount=20 ;
                    @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $Subtotal += $details['product_price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="d-flex justify-content-between">
                    <p class="mb-2">Subtotal</p>
                    <p class="mb-2">${{$Subtotal>0 ? $Subtotal :'00.00'}}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                    <p class="mb-2">Discount</p>
                    <p class="mb-2">- ${{$discount<$Subtotal ? $discount : '00.00'}}</p>
                    </div>
                    @php 
                    $Subtotal=$Subtotal-$discount;
                    @endphp
                    <div class="d-flex justify-content-between mb-4">
                    <p class="mb-2">Total(Incl. taxes)</p>
                    <p class="mb-2">${{$Subtotal>0 ? $Subtotal :'00.00'}}</p>
                    </div>
                    <a href="{{route('billing-address')}}">
                    <button type="button" class="btn btn-info btn-block btn-lg">
                    <div class="d-flex justify-content-between">
                        <span>${{$Subtotal>0 ? $Subtotal :'00.00'}}</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                    </div>
                    </button>
</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection