@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Add Product</h5>
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
                            <form id="create" action="{{route('product.store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label"> Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Package Name"   value="{{ old('product_name') }}">
                                        @if ($errors->has('product_name'))
                                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Name</label>
                                    <div class="col-sm-12">
                                        @if($package)
                                        <select class="form-control" name="package_name">
                                        <option value="" selected>------------ Select Package -------------</option>
                                            @foreach($package as $value)
                                                 <option value="{{$value->package_name}}" >{{$value->package_name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                        @if ($errors->has('package_name'))
                                            <span class="text-danger">{{ $errors->first('package_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm control-label"> Description</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="product_description" name="product_description" placeholder="Enter description">{{ old('product_description') }}</textarea>
                                        @if ($errors->has('product_description'))
                                            <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">  Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter package price"   value="{{ old('product_price') }}">
                                        @if ($errors->has('product_price'))
                                            <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label"> Discount Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="product_discount_price" name="product_discount_price" placeholder="Enter package discount price"   value="{{ old('product_discount_price') }}">
                                        @if ($errors->has('product_discount_price'))
                                            <span class="text-danger">{{ $errors->first('product_discount_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm control-label"> Image</label>
                                    <div class="mb-3">
                                        <input class="form-control" name="product_image" type="file" id="formFile"  class="img-fluid" value="{{old('product_image')}}" accept="image/jpeg,image/png,jpg|png" > 
                                        @if ($errors->has('product_image'))
                                            <span class="text-danger">{{ $errors->first('product_image') }}</span>
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
        'product_name':{
        required: true,
        minlength: 3,
        accept: "[a-zA-Z]+",
        },
        'package_name':{
            required: true,
        },
        'product_description':{
        required: true,
        minlength: 5,
        accept: "[a-zA-Z]+",

      },
      'email':{
      required: true,
      email: true,
     },
      'product_discount_price':{
      required: true,
      accept: "[0-9]+",

      },
      'product_price':{
        required: true,
      accept: "[0-9]+",
      }
      },
      
      messages:{
      
      'product_name':{
      
      required: "Please enter first name",
      
      minlength: "Plase enter  3 characters!",
      accept: "Plase enter only characters!",
      },
      'package_name':{
        required: "Please select Category",

      },
      'product_description':{
      required: " Please enter last name",
      minlength: "Plase enter  5 characters",
      accept: "Plase enter only characters!",
      },
      
      'email':{
      
      required: "Please enter email ",
      
      email: "Please enter a valid email address!",
      
      },
      
      'product_discount_price':{
      
      required: "Please enter mobile price",
      accept: "only number",
      
      },
      'product_price':{
        required: "Please enter price",
      
        accept: "only number",
      

      
      },
      
      
      }
      
      });
      
      });
      
      </script>
@endsection
   
  
