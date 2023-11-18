@php
	$contactData = App\Models\ContactInfo::latest()->first();
@endphp
<div class="header-top-bar">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<ul class="top-bar-info list-inline-item pl-0 mb-0">
					<li class="list-inline-item"><a href="mailto:{{$contactData->email ?? 'info@vka3healthcare.com'}}"><i class="icofont-support-faq mr-2"></i> {{$contactData->email ?? 'info@vka3healthcare.com'}}</a></li>
					<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i> {{$contactData->address ?? 'B-108 Graund floor,Punjabi basti Baljeet nagar new delhi Near Ram chok Ambedkar park'}}</li>
				</ul>
			</div>
			<div class="col-lg-5">
				<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
					<a href="tel:+91 {{$contactData->phone ?? '91 958 230 6210'}}">
						<span>Call Now : </span>
						<span class="h6">+91 {{$contactData->phone ?? ' 958 230 6210'}}</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
