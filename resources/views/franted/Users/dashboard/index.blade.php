@extends('franted.layout.app')
@section('content')
@include('franted.Users.common.sidebar')


<section class="">
    <div class="row my-3">
        <div class="col-sm-3">
            <div class="card bg-primary text-light">
                <div class="card-body">
                  <h5 class="card-title text-light">Card title</h5>
                  <p class="card-text">20</p>
                </div>
              </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-secondary text-light">
                <div class="card-body">
                  <h5 class="card-title text-light">Card title</h5>
                  <p class="card-text">20</p>
                </div>
              </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-success text-light">
                <div class="card-body">
                  <h5 class="card-title text-light">Card title</h5>
                  <p class="card-text">20</p>
                </div>
              </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-danger text-light">
                <div class="card-body">
                  <h5 class="card-title text-light">Card title</h5>
                  <p class="card-text">20</p>
                </div>
              </div>
        </div>
    </div>
    <div class="row my-3">
      <div class="col-sm-3">
          <div class="card text-secondary">
              <div class="card-body">
                <h5 class="card-title text-secondary">Card title</h5>
                <p class="card-text">20</p>
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-warning text-light">
              <div class="card-body">
                <h5 class="card-title text-light">Card title</h5>
                <p class="card-text">20</p>
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-info text-light">
              <div class="card-body">
                <h5 class="card-title text-light">Card title</h5>
                <p class="card-text">20</p>
              </div>
            </div>
      </div>
      <div class="col-sm-3 text-light">
          <div class="card bg-dark ">
              <div class="card-body">
                <h5 class="card-title text-light">Card title</h5>
                <p class="card-text ">20</p>
              </div>
            </div>
      </div>
    </div>
</section>
<section class="">
	@include('franted.home.secondp')
</section>
@include('franted.Users.common.footer')
@endsection