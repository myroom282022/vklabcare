@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Update Package Category</h5>
        </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
         <div class="container-fluid py-4">
             <div class="row justify-content-center">
                 <div class="col-12 col-xl-8">
                    
                    <div class="card mb-4">
                        <div class="card-body p-4">
                        <form  action="{{route('package-category.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Name</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$package->id}}">
                                        <input type="text" class="form-control" id="package_category_name" name="package_category_name" placeholder="Enter Package Name"   value="{{$package->package_category_name}}">
                                        @if ($errors->has('package_category_name'))
                                            <span class="text-danger">{{ $errors->first('package_category_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <a href="{{route('package-category.index')}}"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> </a>
                                    <button type="submit" class=" btn btn-primary btn-submit">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
         </div>
     </div>
@endsection
   
  
