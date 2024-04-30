@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Update Users Details</h5>
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
                            <form  action="{{route('users.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Name</label>
                                        <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$users->id}}">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"   value="{{$users->name}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"   value="{{$users->email}}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="1234567890"   value="{{$users->phone_number}}">
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Select Role</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="role">
                                                <option class="text-capitalize" value="{{$users->role ?? ''}}" selected>{{$users->role ?? ''}}</option>
                                                <option value="User">User</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Caller">Caller</option>
                                                <option value="Delivery Man">Delivery Man</option>
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="text-danger">{{ $errors->first('role') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-sm control-label">Image</label>
                                        <div class="mb-3">
                                        <img src="{{asset('public/storage/users/img/'.$users->user_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">

                                            <input class="form-control" name="user_image" type="file" id="formFile"  class="img-fluid" value="{{$users->user_image}}" accept=".png, .jpg, .jpeg"> 
                                            @if ($errors->has('user_image'))
                                                <span class="text-danger">{{ $errors->first('user_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="text-center my-2">
                                        <button type="submit" class=" btn btn-primary btn-submit">Save changes</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
         </div>
     </div>
@endsection
   
  
