@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Update product</h5>
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
                        <form  action="{{route('product.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Product Name</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$product->id}}">
                                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product Name"   value="{{$product->product_name}}">
                                        @if ($errors->has('product_name'))
                                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Select Package Name</label>
                                    <div class="col-sm-12">
                                        @if($package)
                                        <select class="form-control" name="package_name">
                                        <option value="{{$product->package_name}}" {{$product->package_name == $product->package_name ? 'selected' : ''}}>{{$product->package_name}}</option>
                                        
                                        @foreach($package as $value)
                                            <option value="{{$value->package_name}}" {{$value->package_name == $value->package_name ? 'selected' : ''}}>{{$value->package_name}}</option>
                                        @endforeach
                                        </select>
                                        @endif
                                        @if ($errors->has('product_name'))
                                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Product Description</label>
                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="product_description" name="product_description" placeholder="Enter description">{{$product->product_description}}</textarea>
                                        @if ($errors->has('product_description'))
                                            <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Product  Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price"   value="{{$product->product_price}}">
                                        @if ($errors->has('product_price'))
                                            <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm control-label">Product Discount Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="product_discount_price" name="product_discount_price" placeholder="Enter product discount price"   value="{{$product->product_discount_price}}">
                                        @if ($errors->has('product_discount_price'))
                                            <span class="text-danger">{{ $errors->first('product_discount_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm control-label">Product Image</label>
                                    <div class="mb-3">
                                        <img src="{{url('storage/product/img/'.$product->product_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                        <input class="form-control" name="product_image" type="file" id="formFile"  class="img-fluid" value="{{$product->product_image}}" accept=".png, .jpg, .jpeg"> 
                                        @if ($errors->has('product_image'))
                                            <span class="text-danger">{{ $errors->first('product_image') }}</span>
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
   
  
