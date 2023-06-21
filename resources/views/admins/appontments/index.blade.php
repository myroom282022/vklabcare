@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Appontments Details</h4>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Speciality</th>
                    <th>Doctor Name</th>
                    <th>Patient Name </th>
                    <th>Gender</th>
                    <th>Patient Age</th>
                    <th>Phone Number</th>
                    <th>Available Date</th>
                    <th>Available Time</th>
                    <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($appointments as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>{{$userdata->speciality}}</td>
                            <td>{{$userdata->doctor_name}}</td>
                            <td>{{$userdata->patient_name}}</td>
                            <td>{{$userdata->gender}}</td>
                            <td>{{$userdata->patient_age}}</td>
                            <td>{{$userdata->patient_phone_number}}</td>
                            <td>{{$userdata->available_date}}</td>
                            <td>{{$userdata->available_time}}</td>
                            <!-- <td><span class="text-success">{{$userdata->status}}</span></td>
                            <td><a href="{{'order/'.$userdata->id}}"><i class="fa fa-eye" style="font-size:30px;color:green"></i></a></td> -->
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $appointments->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>

@endsection
   
  
