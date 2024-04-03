@extends('admins.layout.app')
  @section('content')  
<div class="row">
    <div class="col-12">
        @include('admins.setting.layout')
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h4>Contact Details</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end userbuttton">
                <a href="{{route('contact-info.create')}}">
                    <button class="btn btn-primary me-md-2 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                    Add Contact
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $useId=1; @endphp
                    @foreach($contactData as $data)
                        <tr>
                            <td>{{$useId}}</td>
                            <td>{{$data->email ?? ''}}</td>
                            <td>{{$data->phone ?? ''}}</td>
                            <td>{{$data->address ?? ''}}</td>
                            <td>
                                <a href="{{ route('contact-info.edit', ['id' => $data->id]) }}"   id="editbutton"><i class="fas fa-edit text-warning" aria-hidden="true" style="font-size:18px" data-bs-toggle="modal" data-bs-target="#edituser"></i></a>
                                <a href="{{ route('contact-info.delete', ['id' => $data->id]) }}" class="button delete_confirm" id="deletebutton"><i class="fas fa-trash text-danger" aria-hidden="true" style="font-size:18px"></i></a>
                            </td>
                        </tr>
                        @php $useId++; @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            {!! $contactData->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>
@endsection
   
  
