@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        @include('admins.setting.layout')
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Update Partner</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('partner.index')}}">
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
                            <form  action="{{route('partner.store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Brand URL </label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$slider->id}}">
                                        <input type="text" class="form-control" id="hidden_image" name="hidden_image"   value="{{$slider->partner_image}}">
                                        <input type="url" class="form-control" id="partner_url" name="partner_url" placeholder="Enter partner url"   value="{{$slider->partner_url}}">
                                        @if ($errors->has('partner_url'))
                                            <span class="text-danger">{{ $errors->first('partner_url') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                
                               
                                <div class="form-group">
                                    <label class="col-sm control-label">Brand  Image</label>
                                    <div class="mb-3">
                                    <img src="{{url('public/storage/partner/img/'.$slider->partner_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                        <input class="form-control" name="partner_image" type="file" id="formFile"  class="img-fluid" value="{{$slider->partner_image}}"  accept=".png, .jpg, .jpeg"> 
                                        @if ($errors->has('partner_image'))
                                            <span class="text-danger">{{ $errors->first('partner_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center my-2">
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
   
  
