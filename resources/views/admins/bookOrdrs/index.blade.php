@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Transition Details</h4>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Zip</th>
                    <th>State code</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($orderData as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>{{$userdata->getBookOrders->email ?? ''}}</td>
                            <td>{{$userdata->getBookOrders->phone ?? ''}}</td>
                            <td>{{$userdata->getDeviceDatils->cityName ?? ''}}</td>
                            <td>{{$userdata->getDeviceDatils->countryName ?? ''}}</td>
                            <td>{{$userdata->getDeviceDatils->zipCode ?? ''}}</td>
                            <td>{{$userdata->getDeviceDatils->regionCode ?? ''}}</td>
                            <td><a href="{{'book-order/'.$userdata->package_id ?? ''}}"><i class="fa fa-eye" style="font-size:20px;color:#cb0c9f"></i></a>
                            </td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $orderData->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>
@endsection

   
  
