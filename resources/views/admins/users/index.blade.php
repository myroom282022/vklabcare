@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Users Details</h4>
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($data as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                            <img src="{{url('storage/users/img/'.$userdata->user_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">

                            </td>
                            <td>{{$userdata->name}}</td>
                            <td>{{$userdata->email}}</td>
                            <td>{{$userdata->phone_number}}</td>
                            <td>

                                <a href="{{url('admin/users/edit/'.$userdata->id)}}"   id="editbutton"><i class="fas fa-edit text-warning" aria-hidden="true" style="font-size:18px" data-bs-toggle="modal" data-bs-target="#edituser"></i></a>
                                <a href="#" delete_id="{{$userdata->id}}" class="button delete_confirm" id="deletebutton"><i class="fas fa-trash text-danger" aria-hidden="true" style="font-size:18px"></i></a>
                            </td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 



  // delete with sweetalert page =============================
  
  $(".delete_confirm").on('click',function(e){
    e.preventDefault();
    var delete_id  = $(this).attr('delete_id');
    alert();
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
                var url = "{{url('admin/users/delete')}}/"+ delete_id;
              return window.location.href=url;
            }
        });
  });
</script>
@endsection
   
  
