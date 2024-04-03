<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Partners who support us</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Labcare ensures precision and reliability in every laboratory endeavor, providing innovative solutions tailored to your needs. Healthcare stands as your ally in wellness, offering cutting-edge technologies and compassionate support. Together, Labcare and Healthcare guarantee accuracy, quality, and improved healthcare outcomes for all.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row clients-logo">
            @foreach ($partner as $partnerItem)
			<div class="col-lg-2">
                <a href="{{$partnerItem->partner_url ?? '#'}}">
                    <div class="client-thumb">
                        @if ($partnerItem->partner_url ?? '')
                            <img src="{{asset('public/storage/partner/img/'.$partnerItem->partner_image)}}" alt="{{$partnerItem->partner_image}}" target="_blank" class="img-fluid">
                            
                        @endif
                    </div>
                </a>
			</div>
            @endforeach
		</div>
	</div>
</section>