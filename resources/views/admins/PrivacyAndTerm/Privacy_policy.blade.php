@extends('admins.layout.app')
  @section('content')  
  <style>
  .ck-editor__editable_inline {
      min-height: 300px;
  }
  </style>
<div class="row">
    <div class="col-12">
        @include('admins.setting.layout')
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Privacy Policy</h4>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="content-wrapper">
                <div class="container-fluid py-4">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10">
                           <div class="card mb-4">
                               <div class="card-body p-4">
                                   <form  action="{{route('privacy-policy-store')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                       @csrf
                                       <input type="hidden" class="form-control" id="id" name="id" value="{{$privacy->id ?? ''}}">
                                       <input type="hidden" class="form-control" name="type" value="{{$privacy->type ?? 'privacy'}}">
                                       <div class="form-group">
                                           <label for="name" class="col-sm control-label">Title</label>
                                           <div class="col-sm-12">
                                               <input type="text" class="form-control"  name="title" placeholder="Enter title"   value="{{$privacy->title ?? ''}}">
                                               @if ($errors->has('title'))
                                                   <span class="text-danger">{{ $errors->first('title') }}</span>
                                               @endif
                                           </div>
                                           <div class="col-sm-12 mt-3">
                                            <textarea style=" min-height: 300px;" id="editor"  class="form-control"  name="description" placeholder="Enter description " rows="10"  value="{{$privacy->description ?? ''}}">{{$privacy->description ?? ''}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
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
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
              
        } );
</script>
@endsection
   
  
