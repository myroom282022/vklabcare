@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Package Category Details</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('package-category.create')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Add Package Category
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
                    <th> Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                @if($package)
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($package as $data)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>{{$data->package_category_name}}</td>
                            <td>
                                <a href="{{url('admin/package-category/edit/'.$data->id)}}"   id="editbutton"><i class="fas fa-edit text-warning" aria-hidden="true" style="font-size:18px" data-bs-toggle="modal" data-bs-target="#edituser"></i></a>
                                <a href="#" delete_id="{{$data->id}}" class="button delete_confirm" id="deletebutton"><i class="fas fa-trash text-danger" aria-hidden="true" style="font-size:18px"></i></a>
                            </td>
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
                var url = "{{url('admin/package-category/delete')}}/"+ delete_id;
              return window.location.href=url;
            }
        });
  });
</script>
@endsection
   
  
