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
                <th>Total Price</th>
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
                <td>{{ str_replace('\n', ',', trim($item->product_description ?? '')) }}</td>
                <td>{{$item->product_price ?? ''}}</td>
                <td>
                    <a><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                    <a><i class="fa fa-ban text-warning" aria-hidden="true"></i></a>
                </td>
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
</section>
@include('franted.Users.common.footer')
@endsection
