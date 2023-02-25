@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Change Password</h5>
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
                            <form  action="{{route('profile.update.password')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                               
                               
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Current Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="*********"   >
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">New Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="*********"   >
                                        @if ($errors->has('new_password'))
                                            <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Confirm Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="*********"   >
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-center my-2">
                                    <button type="submit" class=" btn btn-primary btn-submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
         </div>
     </div>
@endsection
   
  
