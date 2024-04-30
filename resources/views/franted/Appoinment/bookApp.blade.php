@extends('franted.layout.app')
@section('content')

<section class="section appoinment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 ">
				<div class="appoinment-content">
					<img src="{{asset('public/front_assets/images/about/img-3.jpg')}}" alt="" class="img-fluid">
					<div class="emergency">
						<h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+91 958 230 6210</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-10 ">
            <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
               <form  class="appoinment-form" method="post" action="{{route('book-appoinment-store')}}">
                @csrf
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                               

                                <select class="form-control" id="Speciality" name="speciality" value="{{old('Speciality')}}">
                                    @foreach(getMedicalSpecializations() as $specialization)
                                    <option value="{{ $specialization }}">{{ $specialization }}</option>
                                @endforeach
                                </select>
                            </div>
                            @if ($errors->has('speciality'))
                                <span class="text-danger">{{ $errors->first('speciality') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctor_name" name="doctor_name" value="{{old('doctor_name')}}">
                                  <option value="0">Select Doctors</option>
                                  <option value="Dr Vijay">Dr Vijay</option>
                                </select>
                            </div>
                            @if ($errors->has('doctor_name'))
                                <span class="text-danger">{{ $errors->first('doctor_name') }}</span>
                            @endif
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input  id="available_date" name="available_date"type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{old('available_date')}}">
                            </div>
                            @if ($errors->has('available_date'))
                                <span class="text-danger">{{ $errors->first('available_date') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input id="available_time" name="available_time"type="time" class="form-control"  value="09:00" value="{{old('available_time')}}">
                            </div>
                            @if ($errors->has('available_time'))
                                <span class="text-danger">{{ $errors->first('available_time') }}</span>
                            @endif
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="patient_name" id="patient_name" type="text" class="form-control" placeholder="Full Name" value="{{old('patient_name')}}">
                            </div>
                            @if ($errors->has('patient_name'))
                                <span class="text-danger">{{ $errors->first('patient_name') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect2" name="gender" value="{{old('gender')}}">
                                  <option>Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                       
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="patient_age" id="patient_age" type="text" class="form-control" placeholder="Old Year" maxlength="2" value="{{old('patient_age')}}">
                            </div>
                            @if ($errors->has('patient_age'))
                                <span class="text-danger">{{ $errors->first('patient_age') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="patient_phone_number" id="patient_phone_number" type="text" class="form-control" placeholder="Phone Number" maxlength="10" value="{{old('patient_phone_number')}}">
                            </div>
                            @if ($errors->has('patient_phone_number'))
                                <span class="text-danger">{{ $errors->first('patient_phone_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="patient_problem" id="patient_problem" class="form-control" rows="6" placeholder="Your Problem  as Chat or English " value="{{old('patient_problem')}}"></textarea>
                        @if ($errors->has('patient_problem'))
                            <span class="text-danger">{{ $errors->first('patient_problem') }}</span>
                        @endif
                    </div>

                    <button class="btn btn-main btn-round-full" type="submit">Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>
			</div>
		</div>
	</div>
</section>

@endsection