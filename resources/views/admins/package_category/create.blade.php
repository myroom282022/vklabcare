@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Add Package Category</h5>
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
                            <form id="create" action="{{route('package-category.store')}}" method="POST" class=" btn-submit user_add form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Package Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="package_category_name" name="package_category_name" placeholder="Enter Package Name"   value="{{ old('package_category_name') }}">
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
     <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
    <script>
      $(document).ready(function(){
        $("#create").validate({
        rules:{
        'package_category_name':{
        required: true,
        minlength: 3,
        accept: "[a-zA-Z]+",
        },
      },
      messages:{
      'package_category_name':{
      required: "Please enter  name",
      minlength: "Plase enter  3 characters!",
      accept: "Plase enter only characters!",
      },
      },
      });
    });
      </script>
@endsection
   
  
