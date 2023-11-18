@extends('franted.layout.app')
@section('content')

<section class="contact-form-wrap my-3">
  <div class="container">
    <div class="col-12 text-center  mb-5 bg-info">
      <div class="btn-group btn-group-toggle " data-toggle="buttons">
        <label class="btn active ">
          <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
        </label>
        <label class="btn ">
          <input type="radio" name="shuffle-filter" value="cat1" />Cardiology
        </label>
      </div>
  </div>
    <div class="row">
      
      <div class="col-lg-6 col-md-12 col-sm-12">
        <form id="contact-form" class="contact__form " method="post" action="mail.php">
          <!-- form message -->
          <div class="row">
            <div class="col-12">
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input name="subject" id="subject" type="text" class="form-control" placeholder="Your Query Topic" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input name="phone" id="phone" type="text" class="form-control" placeholder="Your Phone Number" required>
              </div>
            </div>
          </div>

          <div class="form-group-2 mb-4">
            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message" required></textarea>
          </div>

          <div>
            <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Send Messege"></input>
          </div>
        </form>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-lg-12 col-md-6">
            <div class=" mb-4 mb-lg-0">
              <i class="icofont-live-support text-info"></i>
              +91 {{$contactData->phone ?? '958 230 6210'}}<br/>
              <i class="icofont-support-faq text-info "></i>
              {{$contactData->email ?? 'info@vka3healthcare.com'}}<br/>
              <i class="icofont-location-pin text-info"></i>
              {{$contactData->address ?? 'B-108 Graund floor,Punjabi basti Baljeet nagar new delhi Near Ram chok Ambedkar park'}}
            </div>
            <div class="google-map my-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.9604027271093!2d77.16068557550183!3d28.660904275649315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d031e0369b695%3A0x845e668e223a20cc!2sAkash%20Verma!5e0!3m2!1sen!2sin!4v1699985959581!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              {{-- <div id="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="{{url('public/front_assets/images/marker.png')}}"></div> --}}
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection