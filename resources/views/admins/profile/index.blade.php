@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Update Profile</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('profile.change.password')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Change Password
                    </button>
                </a>
            </div>
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
                            <form  action="{{route('profile.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Name</label>
                                    <div class="col-sm-12">
                                    <input type="hidden" class="form-control" id="id" name="id"   value="{{$users->id}}">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"   value="{{$users->name}}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"   value="{{$users->email}}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Phone Number</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="1234567890"   value="{{$users->phone_number}}">
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm control-label">Image</label>
                                    <div class="mb-3">
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{url('storage/users/img/'.$users->user_image)}}" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                    </div>

                                        <input class="form-control" name="user_image" type="file" id="formFile"  class="img-fluid" value="{{$users->user_image}}" accept=".png, .jpg, .jpeg"> 
                                        @if ($errors->has('user_image'))
                                            <span class="text-danger">{{ $errors->first('user_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <button type="submit" class=" btn btn-primary btn-submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
         </div>
     </div>
@endsection
   
  
