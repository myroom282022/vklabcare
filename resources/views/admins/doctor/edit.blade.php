@extends('admins.layout.app')
  @section('content')  
  <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h5>Update Doctor Details</h5>
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
                            <form  action="{{route('doctor.update')}}" method="POST" class=" btn-submit user_add form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <h4>Doctor Info</h4>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Name</label>
                                        <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="id" name="id"   value="{{$users->id ?? ''}}">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"   value="{{$users->name ?? ''}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"   value="{{$users->email ?? ''}}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="1234567890"   value="{{$users->phone_number ?? ''}}">
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label class="col-sm control-label">Image</label>
                                        <div class="mb-3">
                                            @if ($users->user_image ?? '')
                                                <img src="{{asset('public/storage/users/img/'.$users->user_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                            @else
                                                <img src="{{asset('public/img_defautl/users.png')}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                            @endif
                                            <input class="form-control" name="user_image" type="file" id="formFile"  class="img-fluid" value="{{$users->user_image}}" accept=".png, .jpg, .jpeg"> 
                                            @if ($errors->has('user_image'))
                                                <span class="text-danger">{{ $errors->first('user_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                <h4>Doctor Realted Details</h4>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Specialization</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="medical_specialization[]" id="medical_specialization" multiple>
                                                @if ($users->getDoctor->medical_specialization ?? '')
                                                    @foreach(json_decode($users->getDoctor->medical_specialization) as $key => $specialization)
                                                        <option selected value="{{ $specialization }}">{{ $specialization }}</option>
                                                    @endforeach
                                                @endif
                                               
                                                @foreach(getMedicalSpecializations() as $specialization)
                                                    <option value="{{ $specialization }}">{{ $specialization }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('medical_specialization'))
                                                <span class="text-danger">{{ $errors->first('medical_specialization') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Medical License No </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="state" name="medical_license_no" placeholder="medical_license_no" value="{{$users->getDoctor->medical_license_no ?? ''}}">
                                            @if ($errors->has('medical_license_no'))
                                                <span class="text-danger">{{ $errors->first('medical_license_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Total Experience </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="total_experience" name="total_experience" placeholder="total_experience"   value="{{$users->getDoctor->total_experience ?? ''}}">
                                            @if ($errors->has('total_experience'))
                                                <span class="text-danger">{{ $errors->first('total_experience') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Clinic Name </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="clinic_name" name="clinic_name" placeholder="clinic_name"   value="{{$users->getDoctor->clinic_name ?? ''}}">
                                            @if ($errors->has('clinic_name'))
                                                <span class="text-danger">{{ $errors->first('clinic_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Education Degree</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="education_degree[]" id="education_degree" multiple>
                                                @if ($users->getDoctor->education_degree ?? '')
                                                    @foreach(json_decode($users->getDoctor->education_degree) as $key => $specialization)
                                                        <option selected value="{{ $specialization }}">{{ $specialization }}</option>
                                                    @endforeach
                                                @endif
                                                
                                                @foreach(getDoctorDegrees() as $key => $specialization)
                                                    <option value="{{ $key }}">{{ $key }}</option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('education_degree'))
                                                <span class="text-danger">{{ $errors->first('education_degree') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>    
                                <h4>Doctor Address</h4>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Gender</label>
                                        <div class="col-sm-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" @if ($users->getUserDetails->gender  ?? ''=== 'male')
                                                    checked
                                                @endif type="radio" name="gender" id="male" value="male">
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" @if ($users->getUserDetails->gender ?? ''=== 'female')
                                                    checked
                                                @endif type="radio" name="gender" id="female" value="female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            
                                            @if ($errors->has('gender'))
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">D.O.B</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter dob"   value="{{$users->getUserDetails->dob ?? ''}}">
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Address</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="address" name="address" placeholder="Enter address"   value="{{$users->getUserDetails->address ?? ''}}">{{$users->getUserDetails->address ?? ''}}</textarea>
                                            
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">city</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city"   value="{{$users->getUserDetails->city ?? ''}}">
                                            @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">Zip code </label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="zip code"   value="{{$users->getUserDetails->zip_code ?? ''}}">
                                            @if ($errors->has('zip_code'))
                                                <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">state </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="state" name="state" placeholder="state name"   value="{{$users->getUserDetails->state ?? ''}}">
                                            @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="col-sm control-label">country </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Country name"   value="
                                            {{$users->getUserDetails->country ?? ''}}">
                                            @if ($errors->has('country'))
                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
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
 
    <script>
      $("#medical_specialization").select2({
          placeholder: "Select a medical specialization",
          allowClear: true
      });
      $("#education_degree").select2({
          placeholder: "Select a education degree",
          allowClear: true
      });
    </script>
  </body>
</html>
@endsection
   
  
