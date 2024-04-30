@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Doctor Details</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('doctor.create')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Add User
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($data as $userdata)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>
                                @if ($userdata->user_image)
                                    <img src="{{asset('public/storage/users/img/'.$userdata->user_image)}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                @else
                                    <img src="{{asset('public/img_defautl/users.png')}}" class="img-fluid" alt="user" style="height: 40px; width:40px;  border-radius: 50%;">
                                @endif
                            </td>
                            <td>{{$userdata->name}}</td>
                            <td>{{$userdata->email}}</td>
                            <td>{{$userdata->phone_number}}</td>
                            <td>
                                <a href="{{asset('admin/doctor/edit/'.$userdata->id)}}"   id="editbutton"><i class="fas fa-edit text-warning" aria-hidden="true" style="font-size:18px" data-bs-toggle="modal" data-bs-target="#edituser"></i></a>
                                <a href="#" delete_id="{{$userdata->getDoctor->id ?? ''}}" class="button delete_confirm_doctor" id="deletebutton"><i class="fas fa-trash text-danger" aria-hidden="true" style="font-size:18px"></i></a>
                                <a  class="button get-doctor-info" data-bs-toggle="modal" doctor-data="{{$userdata}}" data-bs-target="#doctor-details" ><i class="fas fa-eye text-success" aria-hidden="true" style="font-size:18px"></i></a>
                            </td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="doctor-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Portfolio Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <section  style="background-color: #f4f5f7;">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-12 mb-4 mb-lg-0">
                      <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                          <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img class="doctor-img" src="" alt="image" class="img-fluid my-5" style="width: 80px;" />
                            <h5 class="doctor-name text-capitalize"></h5>
                            <h6>Reffreal :- <span class="doctor-referral_code text-success"></span></h6>
                            <span class="text-dark"><b>Address :-</b></span><span class="text-dark doctor-address" style="text-align: justify;"></span>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body p-4">
                              <h6>Information</h6>
                              <hr class="mt-0 mb-4">
                              <div class="row pt-1">
                                <div class="col-6 mb-3">
                                  <h6>Email</h6>
                                  <p class="text-muted doctor-email"></p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Phone</h6>
                                  <p class="text-muted doctor-phone_number"></p>
                                </div>
                              </div>
                              <h6>Doctor Details</h6>
                              <hr class="mt-0 mb-4">
                              <div class="row pt-1">
                                <div class="col-6 mb-3">
                                  <h6>Clinic Name</h6>
                                  <p class="text-muted doctor-clinic_name">Lorem ipsum</p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Education Degree</h6>
                                  <p class="text-muted doctor-education_degree"></p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Medical License No.</h6>
                                  <p class="text-muted doctor-medical_license_no "></p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Medical Specialization</h6>
                                  <p class="text-muted doctor-medical_specialization"></p>
                                </div>
                                <div class="col-6 mb-3">
                                  <h6>Total Experience</h6>
                                  <p class="text-muted doctor-total_experience"></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

$(".get-doctor-info").on('click',function(e){
    e.preventDefault();
    var doctorInfo = JSON.parse($(this).attr('doctor-data'));
    if (doctorInfo.user_image === null) {
        $('.doctor-img').attr("src", "{{ asset('public/img_defautl/users.png') }}");
    } else {
        $('.doctor-img').attr("src", "{{ asset('public/storage/users/img') }}" + '/' + doctorInfo.user_image);
    }
    const address = doctorInfo?.get_user_details?.address + ',' + doctorInfo?.get_user_details?.city + ',' + doctorInfo?.get_user_details?.state +' ( ' + doctorInfo?.get_user_details?.zip_code+ ' ), ' + doctorInfo?.get_user_details?.country;
    $('.doctor-name').text(doctorInfo.name);
    $('.doctor-email').text(doctorInfo.email);
    $('.doctor-phone_number').text(doctorInfo.phone_number);
    $('.doctor-referral_code').text(doctorInfo.referral_code);
    $('.doctor-address').text(address);

    var medicalSpecializations = doctorInfo?.get_doctor?.medical_specialization;
    var medicalSpecializations = JSON.parse(medicalSpecializations);
    var medicalDegree =doctorInfo?.get_doctor?.education_degree;
    var medicalDegree = JSON.parse(medicalDegree);

    var specializationText = medicalSpecializations.join(", ");
    var medicalDegree = medicalDegree.join(", ");
   
    $('.doctor-total_experience').text(doctorInfo?.get_doctor?.total_experience);
    $('.doctor-medical_specialization').text(specializationText);

    $('.doctor-medical_license_no').text(doctorInfo?.get_doctor?.medical_license_no);
    $('.doctor-education_degree').text(medicalDegree);
    $('.doctor-clinic_name').text(doctorInfo?.get_doctor?.clinic_name);

    console.log("doctorInfo",doctorInfo);
  });

  // delete with sweetalert page =============================
  
  $(".delete_confirm_doctor").on('click',function(e){
    e.preventDefault();
    var delete_id  = $(this).attr('delete_id');
    swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                var url = "{{url('admin/doctor/delete')}}/"+ delete_id;
              return window.location.href=url;
            }
        });
  });
</script>
@endsection
   
  
