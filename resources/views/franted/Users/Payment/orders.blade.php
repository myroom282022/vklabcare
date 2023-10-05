@extends('franted.layout.app')
@section('content')
@include('franted.Users.common.sidebar')

<section>
    <div class="mx-2">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand text-info">Orders List</a>
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
                <th>Image</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Delivery Charge</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $id=1;@endphp
              @foreach ($payData as $item)
              <tr>
                <td>{{$id}}</td>
                <td>
                    <img src="{{$item->image ?? ''}}" alt="" class="user-image">
                </td>
                <td>{{$item->product_name ?? ''}}</td>
                <td>{{$item->product_description ?? ''}}</td>
                <td>{{$item->total_price ?? ''}}</td>
                <td>{{$item->product_price ?? ''}}</td>
                <td>{{$item->delivery_charge ?? ''}}</td>
                <td>
                    @if ($item->singleUserOrderPayment->status == 'Success')
                        <span class="badge badge-success rounded-pill d-inline">Succes</span>
                    @else
                        <span class="badge badge-danger rounded-pill d-inline">Cancel</span>
                    @endif
                  </td>
                <td>
                    <a><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                    <a><i class="fa fa-ban text-warning" aria-hidden="true"></i></a>

                </td>
              </tr>
              @php $id++;@endphp
               
              @endforeach
            </tbody>
          </table> 
        @else
        <div class="text-center my-5">
            <button type="button" class="btn btn-secondary btn-rounded">Not any package purchase yet ! </button>
        </div>
        @endif
    </div>
</section>
@include('franted.Users.common.footer')
@endsection
