@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            @include('admins.setting.layout')
            <div class="card-header pb-0">
                <h4>Slider Create</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                    <a href="{{route('slider.index')}}">
                        <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                            <i class="fa fa-arrow-left"></i> &nbsp;&nbsp;
                        Back 
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper card">
         <div class="container-fluid py-4">
             <div class="row justify-content-center">
                 <div class="col-12 col-xl-8">
                    
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <form  action="{{route('slider.store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"   value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">description</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                               
                                <div class="form-group">
                                    <label class="col-sm control-label">Slider Image</label>
                                    <div class="mb-3">
                                        <input class="form-control" name="slider_image" type="file" id="formFile"  class="img-fluid" value="{{old('slider_image')}}" accept=".png, .jpg, .jpeg"> 
                                        @if ($errors->has('slider_image'))
                                            <span class="text-danger">{{ $errors->first('slider_image') }}</span>
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
   
  
