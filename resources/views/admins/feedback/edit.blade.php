@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            @include('admins.setting.layout')
            <div class="card-header pb-0">
                <h4>Service Update</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                    <a href="{{route('feedback.index')}}">
                        <button class="btn btn-primary me-md-2 btn-sm" >
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
                            <form  action="{{route('feedback.store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Title</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$slider->id}}">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"   value="{{$slider->title}}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Rating (0-5)</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control rating" id="review" name="review" placeholder="5"  minlength="1" maxlength="1" value="{{$slider->review}}">
                                        <p class="rating-error error"></p>
                                        @if ($errors->has('review'))
                                            <span class="text-danger">{{ $errors->first('review') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">description</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" class="form-control" id="description" name="description" placeholder="Enter description">{{$slider->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
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
   
  
