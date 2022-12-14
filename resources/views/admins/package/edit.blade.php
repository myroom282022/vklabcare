@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Update Package</h5>
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
                        <form  action="{{route('package.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Name</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$package->id}}">
                                        <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name"   value="{{$package->package_name}}">
                                        @if ($errors->has('package_name'))
                                            <span class="text-danger">{{ $errors->first('package_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Description</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="package_description" name="package_description" placeholder="Enter description">{{$package->package_description}}</textarea>
                                        @if ($errors->has('package_description'))
                                            <span class="text-danger">{{ $errors->first('package_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package  Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_price" name="package_price" placeholder="Enter package price"   value="{{$package->package_price}}">
                                        @if ($errors->has('package_price'))
                                            <span class="text-danger">{{ $errors->first('package_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Discount Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_discount_price" name="package_discount_price" placeholder="Enter package discount price"   value="{{$package->package_discount_price}}">
                                        @if ($errors->has('package_discount_price'))
                                            <span class="text-danger">{{ $errors->first('package_discount_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm control-label">Package Image</label>
                                    <div class="mb-3">
                                        <img src="{{url('storage/package/img/'.$package->package_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                        <input class="form-control" name="package_image" type="file" id="formFile"  class="img-fluid" value="{{$package->package_image}}" accept=".png, .jpg, .jpeg"> 
                                        @if ($errors->has('package_image'))
                                            <span class="text-danger">{{ $errors->first('package_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
   
  
