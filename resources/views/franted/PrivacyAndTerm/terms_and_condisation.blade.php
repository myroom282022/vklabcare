@extends('franted.layout.app')
  @section('content')  
  <section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-5 text-lg">{{$privacy->title ?? 'terms & Condisation'}}</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section about-page">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                {!! $privacy->description ?? '' !!}
            </div>
          </div>
      </div>
  </section>
  
@endsection
   
  
