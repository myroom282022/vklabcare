@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Transition Details</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('users.create')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Add User
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Transaction Id</th>
                    <th>Product Price</th>
                    <th>Quantity </th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($transition as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>{{$userdata->transaction_id}}</td>
                            <td>{{$userdata->product_price}}</td>
                            <td>{{$userdata->quantity}}</td>
                            <td>{{$userdata->payment_type}}</td>
                            <td><span class="text-success">{{$userdata->status}}</span></td>
                            <td><a href="{{'order/'.$userdata->id}}"><i class="fa fa-eye" style="font-size:30px;color:green"></i></a></td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $transition->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>

@endsection
   
  
