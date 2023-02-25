@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Order Details</h4>
            
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Image</th>
                    <th>Order Number</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Price</th>
                    <th>Quantity </th>
                    
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($order as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                            <img src="{{url('storage/Product/img/'.$userdata->product_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                            </td>
                            <td>{{$userdata->order_number}}</td>
                            <td>{{$userdata->product_name}}</td>
                            <td>{{$userdata->product_description}}</td>
                            <td>{{$userdata->product_price}}</td>
                            <td>{{$userdata->quantity}}</td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $order->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>

@endsection
   
  
