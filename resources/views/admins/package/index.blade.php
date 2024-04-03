@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Package Details</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('package.create')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Add Package
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
                    <th> Image</th>
                    <th> Package Category</th>
                    <th> Name</th>
                    <th> Price </th>
                    <th> Discount Price </th>
                    <th>Percentage</th>
                    <th>Total Test</th>
                    <th>Package Type</th>
                    {{-- <th> Description </th>
                    <th> Description Not Add</th> --}}
                    <th>Action</th>
                </tr>
                </thead>
                @if($package)
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($package as $data)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{asset('public/storage/package/img/'.$data->package_image)}}" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                </div>
                            </td>
                            <td class="text-capitilize">{{$data->package_category_name}}</td>
                            <td>{{$data->package_name}}</td>
                            <td>{{$data->package_price}}</td>
                            <td>{{$data->package_discount_price}}</td>
                            <td>{{$data->package_discount_percentage ?? '0'}}%</td>
                            <td>{{$data->total_test ?? 0}}</td>
                            <td>{{$data->package_type ?? ''}}</td>
                            {{-- <td></td>
                            <td></td> --}}
                            <td>
                                <a href="{{asset('admin/package/edit/'.$data->id)}}"   id="editbutton"><i class="fas fa-edit text-warning" aria-hidden="true" style="font-size:18px" data-bs-toggle="modal" data-bs-target="#edituser"></i></a>
                                <a href="#" delete_id="{{$data->id}}" class="button delete_confirm" id="deletebutton"><i class="fas fa-trash text-danger" aria-hidden="true" style="font-size:18px"></i></a>
                                <a class=" get-description" data-bs-toggle="modal" data-bs-target="#exampleModal" package-desk ="{{ str_replace('\n', ',', trim($data->package_description ?? '')) }}" ><i class="fas fa-eye text-success" aria-hidden="true" style="font-size:18px"></i></a>
                            </td>
                        </tr>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $package->withQueryString()->links('pagination::bootstrap-5') !!}
          @endif
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Package Description</h5>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

$(".get-description").on('click',function(e){
    e.preventDefault();
    var packageDesk  = $(this).attr('package-desk');
    $('.package-description').text(packageDesk);
  });


     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 



  // delete with sweetalert page =============================
  
  $(".delete_confirm").on('click',function(e){
    e.preventDefault();
    var delete_id  = $(this).attr('delete_id');
    swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                var url = "{{url('admin/package/delete')}}/"+ delete_id;
              return window.location.href=url;
            }
        });
  });
</script>
@endsection
   
  
