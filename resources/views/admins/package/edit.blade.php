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
                 <div class="col-12 col-xl-12">
                    
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <form id="create" action="{{route('package.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$package->id ?? ""}}"/>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="name" class="col-sm control-label">Package Type</label>
                                            <div class="col-sm-12">
                                                <select class="form-control packages-type" name="package_type">
                                                    <option value="{{$package->package_type ?? ''}}" >{{$package->package_type ?? ''}}</option>
                                                    <option value="Narmal" >Narmal</option>
                                                    <option value="Special" >Special</option>
                                                    <option value="New" >New</option>
                                                </select>
                                                @if ($errors->has('package_type'))
                                                    <span class="text-danger">{{ $errors->first('package_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Select Package category name</label>
                                            <div class="col-sm-12">
                                                @if($packageCategory)
                                                <select class="form-control" name="package_category_name">
                                                    @foreach($packageCategory as $value)
                                                        <option value="{{$value->package_category_name}}" {{$value->package_category_name == $value->package_category_name ? 'selected' : ''}}>{{$value->package_category_name}}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                @if ($errors->has('package_category_name'))
                                                    <span class="text-danger">{{ $errors->first('package_category_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Package Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name"   value="{{$package->package_name ?? ''}}">
                                                @if ($errors->has('package_name'))
                                                    <span class="text-danger">{{ $errors->first('package_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                        
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Package Price</label>
                                            <div class="col-sm-12">
                                                <input type="text"  class="form-control" id="package_price" name="package_price" placeholder="Enter package price" value="{{$package->package_price ?? ''}}">
                                                @if ($errors->has('package_price'))
                                                    <span class="text-danger">{{ $errors->first('package_price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Package Discount Price</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"  id="package_discount_price"  name="package_discount_price" placeholder="Enter package discount price"   value="{{$package->package_discount_price ?? ''}}">
                                                <span  class="error discount"></span>
                                                @if ($errors->has('package_discount_price'))
                                                    <span class="text-danger">{{ $errors->first('package_discount_price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Package Discount Percentage</label>
                                            <div class="col-sm-12">
                                                <input maxlength="5" readonly type="text" class="form-control"  id="package_discount_percentage" name="package_discount_percentage" placeholder="Enter package discount price"   value="{{$package->package_discount_percentage ?? ''}}">
                                                @if ($errors->has('package_discount_percentage'))
                                                    <span class="text-danger">{{ $errors->first('package_discount_percentage') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-sm control-label">Package Image</label>
                                            <div class="mb-3">
                                                <img src="{{url('storage/package/img/'.$package->package_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                                <input class="form-control" name="package_image" type="file" id="formFile"   class="img-fluid" value="{{$package->package_image ?? ''}}" > 
                                                @if ($errors->has('package_image'))
                                                    <span class="text-danger">{{ $errors->first('package_image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm control-label">Package Description(Change line to add  <span class="text-primary">\n</span> )</label>
                                            <div class="col-sm-12">
                                                <textarea  class="form-control" id="package_description" rows="5" name="package_description" placeholder="Enter description">{{$package->package_description ?? ''}} </textarea>
                                                @if ($errors->has('package_description'))
                                                    <span class="text-danger">{{ $errors->first('package_description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-sm control-label">Total Test Parameter</label>
                                            <div class="mb-3">
                                                <input class="form-control" name="total_test" type="number" value="{{$package->total_test ?? ''}}" >
                                                @if ($errors->has('total_test'))
                                                    <span class="text-danger">{{ $errors->first('total_test') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <a href="{{route('package.index')}}"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> </a>
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
     <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
    <script>
      $(document).ready(function(){
        
        var packages =  $('.packages-type').val();

         if(packages == 'Special'){
            $('.not-add-description').show();
         }else{
            $('.not-add-description').hide();
         }
        $('.packages-type').on('change',function(){
         var packages =  $(this).val();
         if(packages == 'Special'){
            $('.not-add-description').show();
         }else{
            $('.not-add-description').hide();
         }
         console.log("packages",packages);
        });
        $("#package_discount_price").keyup(function(){
            var disPercentage = parseFloat($(this).val());  
            var price = parseFloat($('#package_price').val()); 
            var totalPrice = ((price - disPercentage) / price) * 100;
            $("#package_discount_percentage").val(totalPrice.toFixed(2));

         });
        // validate -------------------------
        $("#create").validate({
        rules:{
        'package_category_name':{
        required: true,
        },
        'package_name':{
        required: true,
        minlength: 3,
        },
        'package_description':{
        required: true,
        minlength: 5,

      },
      'package_discount_percentage':{
      required: true,
      accept: "[0-9]+",

      },
      'package_price':{
        required: true,
      accept: "[0-9]+",
      }
      },
      
      messages:{
      'package_category_name':{
      required: "Please select",
      },
      'package_name':{
        required: "Please enter  name",
        minlength: "Plase enter  3 characters!",
        accept: "Plase enter only characters!",
      },
      'package_description':{
        required: " Please enter last name",
        minlength: "Plase enter  5 characters",
        accept: "Plase enter only characters!",
      },
      'package_discount_percentage':{
        required: "Please enter percentage",
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
   
  
