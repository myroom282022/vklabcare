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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Delivery charge </th>
                    <th>Category name</th>
                    <th>Discount(%)</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($order as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                            <img src="{{url('storage/package/img/'.$userdata->product_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                            </td>
                            <td>{{$userdata->order_number ?? ''}}</td>
                            <td>{{$userdata->product_name ?? ''}}</td>
                            <td>{{$userdata->product_price ?? ''}}</td>
                            <td>{{$userdata->delivery_charge ?? ''}}</td>
                            <td>{{$userdata->product_category_name ?? ''}}</td>
                            <td>{{$userdata->product_discount_percentage ?? ''}}</td>
                            <td><a class="get-description" data-bs-toggle="modal" data-bs-target="#orderDataTrn" package-desk ="{{ str_replace('\n', ',', trim($userdata->product_description ?? '')) }}" ><i class="fas fa-eye text-success" aria-hidden="true" style="font-size:18px"></i></a></td>
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
<!-- Modal -->
<div class="modal fade" id="orderDataTrn" tabindex="-1" aria-labelledby="orderDataTrn" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderDataTrn">Package Description</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4>Package Description</h4>
          <p class="package-description"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    
    $(".get-description").on('click',function(e){
      e.preventDefault();
      var packageDesk  = $(this).attr('package-desk');
      $('.package-description').text(packageDesk);
    });
  </script>
@endsection
   
  
