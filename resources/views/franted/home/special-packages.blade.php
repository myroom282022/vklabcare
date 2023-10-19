<link rel="stylesheet" href="{{url('public/front_assets/css/packages.css')}}">
<section class="pricing-section">
    <div class="container">
        <div class="sec-title text-center">
            <span class="title">Get plan</span>
            <h2>Choose a Plan</h2>
        </div>

        <div class="outer-box">
            <div class="row">
                <!-- Pricing Block -->
                @foreach ($package as $item)
                @if($item->package_type == 'Special')
                <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="icon-outer">
                                @if ($item->package_image ?? '')
                                    <i><img src="{{url('storage/package/img/'.$item->package_image)}}" class="avatar avatar-sm package-image me-3 m-auto" alt="user1"></i>
                                @else
                                    <i class="fas fa-paper-plane"></i>
                                @endif
                            </div>
                        </div>
                        <div class="price-box">
                            <div class="title">{{$item->package_name ?? ''}}</div>
                            <h6 class="text-danger"><del>₹{{$item->package_price ?? ''}}</del> ({{$item->package_discount_percentage ?? ''}}%OFF)</h6>
                            <h4 class="price">₹{{$item->package_discount_price ?? ''}}</h4>
                        </div>
                        <ul class="features">
                            @php
                                $packageDescription = $item->package_description ?? '';
                                $packageDescriptionNotAdd = $item->description_not_add ?? '';
                                $packageItems = explode(',', $packageDescription);
                                $packageItemsNotAdd = explode(',', $packageDescriptionNotAdd);
                            @endphp
                            <h6>{{ count($packageItems) }} Packages</h6>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                <i class="fa fa-star " aria-hidden="true"></i>
                                <span class="rating-number">(4.8)</span>
                                
                            @foreach($packageItems as $packageItem)
                                @if($packageItem)
                                    <li class="true">{{ trim($packageItem ?? '') }}</li>
                                @endif
                            @endforeach
                            @foreach($packageItemsNotAdd as $packageItem)
                                @if($packageItem)
                                    <li class="false">{{ trim($packageItem ?? '') }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="btn-box">
                            <a href="{{route('packages.book',$item->package_slug_name ?? $item->id)}}" class="theme-btn">Book Now</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

