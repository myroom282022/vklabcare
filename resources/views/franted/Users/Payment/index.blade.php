@extends('franted.layout.app')
@section('content')
@include('franted.Users.common.sidebar')

<section>
    <div class="mx-2">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand text-info">Transation List</a>
                <form class="d-flex input-group w-auto">
                <input
                    type="search"
                    class="form-control rounded"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="search-addon"
                />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                </form>
            </div>
        </nav>
        @if (count($payData) > 0)
          <table class="table align-middle mb-0 bg-white table table-hover mt-4">
            <thead class="bg-light">
              <tr>
                <th>Sr.No</th>
                <th>Transaction Id</th>
                <th>Total Price</th>
                <th>UPI Id</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $id=1;@endphp
              @foreach ($payData as $item)
              <tr class="view-orders" order-data="{{json_encode($item->singleUserPayment)}}">
                <td>{{$id}}</td>
                <td>{{$item->transaction_id ?? ''}}</td>
                <td>{{$item->total_price ?? ''}}</td>
                <td>{{$item->vpa ?? ''}}</td>
                <td>
                    @if ($item->status == 'Success')
                        <span class="badge badge-success rounded-pill d-inline">Succes</span>
                    @else
                        <span class="badge badge-danger rounded-pill d-inline">Cancel</span>
                    @endif
                  </td>
                <td><i class="fas fa-eye text-info" type="submit"></i></td>
              </tr>
              @php $id++;@endphp
               
              @endforeach
            </tbody>
          </table> 
          {!! $payData->withQueryString()->links('pagination::bootstrap-5') !!}
        @else
        <div class="text-center my-5">
            <button type="button" class="btn btn-secondary btn-rounded">Not any package purchase yet ! </button>
        </div>
        @endif
    </div>
     <!-- Modal -->
     <div class="modal" id="startet-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
      <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <div class="row">
              <div class="col-lg-7">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img src="" class="img-fluid rounded-3 product-image" alt="package">
                        </div>
                        <div class="ms-3">
                          <h5 class="product-name"></h5>
                          <p class="small mb-0 text-capitalize product-description"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Booking Details</h5>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2 total-subtotal"></p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2 total-shipping"> </p>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2 total-price"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@include('franted.Users.common.footer')
@endsection
@push('scripts')
<script src="{{asset('public/front_assets/js/user_payment.js')}}"></script>
@endpush