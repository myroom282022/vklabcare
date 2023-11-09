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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Delivery charge </th>
                    <th>Discount percentage</th>
                    <th>Package category name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($order as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                            <img src="{{url('storage/package/img/'.$userdata->package_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                            </td>
                            <td>{{$userdata->order_number ?? ''}}</td>
                            <td>{{$userdata->package_name ?? ''}}</td>
                            <td>{{$userdata->package_price ?? ''}}</td>
                            <td>{{$userdata->package_discount_price ?? ''}}</td>
                            <td>{{$userdata->package_discount_percentage ?? ''}}</td>
                            <td>{{$userdata->package_category_name ?? ''}}</td>
                            <td><a class=" get-description" data-bs-toggle="modal" data-bs-target="#orderData" package-desk ="{{ str_replace('\n', ',', trim($userdata->package_description ?? '')) }}" ><i class="fas fa-eye text-success" aria-hidden="true" style="font-size:18px"></i></a></td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="orderData" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderData">Package Description</h5>
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

  
