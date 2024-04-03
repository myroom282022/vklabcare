@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        @include('admins.setting.layout')
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Update Contact Info</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('contact-info.index')}}">
                    <button class="btn btn-primary me-md-2 btn-sm">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;
                    Back
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
                            <form  action="{{route('contact-info.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$ContactData->id ?? ''}}" name="id" />
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$ContactData->email ?? ''}}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Phone Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="1234567890" value="{{$ContactData->phone ?? ''}}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Address</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="address" name="address" placeholder="Enter address">{{$ContactData->address ?? ''}}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <button type="submit" class=" btn btn-primary btn-submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
         </div>
     </div>
@endsection
   
  
