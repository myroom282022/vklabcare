@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Add Package</h5>
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
                            <form id="create" action="{{route('package.store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name"   value="{{ old('package_name') }}">
                                        @if ($errors->has('package_name'))
                                            <span class="text-danger">{{ $errors->first('package_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Description</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="package_description" name="package_description" placeholder="Enter description">{{ old('package_description') }}</textarea>
                                        @if ($errors->has('package_description'))
                                            <span class="text-danger">{{ $errors->first('package_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package  Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_price" name="package_price" placeholder="Enter package price"   value="{{ old('package_price') }}">
                                        @if ($errors->has('package_price'))
                                            <span class="text-danger">{{ $errors->first('package_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Discount Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_discount_price" name="package_discount_price" placeholder="Enter package discount price"   value="{{ old('package_discount_price') }}">
                                        @if ($errors->has('package_discount_price'))
                                            <span class="text-danger">{{ $errors->first('package_discount_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm control-label">Package Image</label>
                                    <div class="mb-3">
                                        <input class="form-control" name="package_image" type="file" id="formFile"  class="img-fluid" value="{{old('package_image')}}" accept=".png, .jpg, .jpeg"> 
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
     <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
    <script>
      $(document).ready(function(){
        $("#create").validate({
        rules:{
        'package_name':{
        required: true,
        minlength: 3,
        accept: "[a-zA-Z]+",
        },
        'package_description':{
        required: true,
        minlength: 5,
        accept: "[a-zA-Z]+",

      },
      'email':{
      required: true,
      email: true,
     },
      'package_discount_price':{
      required: true,
      accept: "[0-9]+",

      },
      'package_price':{
        required: true,
      accept: "[0-9]+",
      }
      },
      
      messages:{
      
      'package_name':{
      
      required: "Please enter first name",
      
      minlength: "Plase enter  3 characters!",
      accept: "Plase enter only characters!",
      },
      
      'package_description':{
      required: " Please enter last name",
      minlength: "Plase enter  5 characters",
      accept: "Plase enter only characters!",
      },
      
      'email':{
      
      required: "Please enter email ",
      
      email: "Please enter a valid email address!",
      
      },
      
      'package_discount_price':{
      
      required: "Please enter mobile price",
      accept: "only number",
      
      },
      'package_price':{
        required: "Please enter price",
      
        accept: "only number",
      

      
      },
      
      
      }
      
      });
      
      });
      
      </script>
@endsection
   
  
