@extends('layouts.web')

@section('title', __('messages.home'))

@section('content')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendor/owlcarousel/owl.carousel.min.css') }}">
@endsection

@if(count($language->banners)>0)
<section class="ftco-section bg-white py-0" id="banner">
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($language->banners as $banner)
			<div class="carousel-item vh-100 @if($loop->first) active @endif" data-interval="10000">
				@if($banner->type==1)
				<img src="{{ asset('/admins/img/banners/'.$banner->archive) }}" class="w-100 vh-100" alt="{{ $banner->title }}">
				@else
				<video class="vh-100 vw-100" style="object-fit: cover;" loop autoplay preload="auto">
					<source src="{{ asset('/admins/img/banners/'.$banner->archive) }}" type="video/mp4" />
					<source src="{{ asset('/admins/img/banners/'.$banner->archive) }}" type="video/ogg" />
				</video>
				@endif
			</div>
			@endforeach

			@if(count($language->banners)>1)
			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon bg-dark rounded-0" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon bg-dark rounded-0" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			@endif
		</div>
	</div>
</section>
@endif

<section class="ftco-section bg-black-light py-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-12 text-center text-md-left py-3">
				<p class="h5 text-white mb-0">@lang('messages.do not hesitate to contact us and') <span class="h4 text-primary"><i>@lang('messages.live the adventure')!!</i></span></p> 
				<p class="mb-0">@lang('messages.horseback riding, excursions, activities and expeditions')</p>
			</div>

			<div class="col-lg-4 col-md-4 col-12 text-center text-md-right py-4">
				<a href="{{ route('home', ['lang' => $lang]) }}#contact" class="btn btn-primary rounded-0"> @lang('messages.contact us')!</a>
			</div>

		</div>
	</div>
</section>

<section class="ftco-section bg-white py-0" id="about">
	<div class="bg-title parallax" style="background: url('{{ image_exist('/admins/img/settings/', $setting->about_banner) }}') center no-repeat fixed;">
		<div class="overlay-white"></div>
		<div class="container">
			<div class="row py-5">
				<div class="col-12 text-center">
					<i class="fa fa-2x fa-users text-white bg-primary rounded-circle p-4"></i>
				</div>
				<div class="col-12 mt-1">
					<p class="h3 font-weight-bold text-center mb-0">@lang('messages.about')</p>
				</div>
			</div>
		</div>		
	</div>
</section>

@if(!empty($language->about->about) && !is_null($language->about->about))
<section class="ftco-section bg-white py-0">
	<div class="container">
		<div class="row">
			<div class="h5 text-center text-muted col-12 pt-5 pb-4">
				{!! $language->about->about !!}
			</div>
		</div>
	</div>
</section>
@endif

<section class="ftco-section bg-primary py-0 pb-5" id="excursions">
	<div class="container pt-4">
		<div class="row pt-3 pb-3">
			<div class="col-12 heading-section">
				<p class="h4 text-white">@lang('messages.our') <b>@lang('messages.excursions')</b></p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@foreach($language->excursions->where('state', 1) as $excursion)
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
				<div class="card shadow border-0 openExcursion" slug="{{ $excursion->slug }}" image="{{ image_exist('/admins/img/excursions/', $excursion->image, false, false) }}" >
					<img src="{{ image_exist('/admins/img/excursions/', $excursion->image, false, false) }}" class="card-img-top" alt="{{ $excursion->title }}">
					<div class="card-body py-3">
						<h6 class="card-title text-dark text-center font-weight-bold mb-1">{{ $excursion->title }}</h6>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="ftco-section bg-black-light py-0">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center py-3">
				<a href="{{ route('excursions', ['lang' => $lang]) }}" class="btn btn-primary rounded-0"><i class="fa fa-arrow-right"></i> @lang('messages.see all excursions')</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-white py-0" id="gallery">
	<div class="bg-title parallax" style="background: url('{{ image_exist('/admins/img/settings/', $setting->gallery_banner) }}') center no-repeat fixed;">
		<div class="overlay-white"></div>
		<div class="container">
			<div class="row py-5">
				<div class="col-12 text-center">
					<i class="fa fa-2x fa-camera text-white bg-primary rounded-circle p-4"></i>
				</div>
			</div>
		</div>		
	</div>
</section>

<section class="ftco-section bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-center mb-4" id="filter">
				<button class="btn btn-primary text-uppercase rounded mr-3" category="all">Todas</button>
				@foreach($language->categories->where('state', 1) as $category)
				<button class="btn btn-secondary text-uppercase rounded @if(!$loop->last) mr-3 @endif" category="{{ $category->slug }}">{{ $category->name }}</button>
				@endforeach
			</div>

			<div class="col-12" id="items-gallery">
				<div class="row">
					@foreach($language->galleries->where('state', 1) as $gallery)
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 item-gallery mb-4" category="{{ $gallery->category->slug }}">
						<div class="card shadow border-0">
							<img src="{{ image_exist('/admins/img/galleries/', $gallery->image, false, false) }}" class="card-img-top" alt="{{ $gallery->title }}">
							<div class="card-body py-3">
								<h6 class="card-title text-dark text-center font-weight-bold mb-1">{{ $gallery->title }}</h6>
								<p class="card-text text-center text-uppercase">{{ $gallery->category->name }}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-white py-0">
	<div class="bg-title parallax" style="background: url('{{ image_exist('/admins/img/settings/', $setting->activity_banner) }}') center no-repeat fixed;">
		<div class="overlay-dark"></div>
		<div class="container">
			<div class="row py-5">
				<div class="col-12 text-center">
					<i class="fa fa-2x fa-comments text-white bg-primary rounded-circle p-4"></i>
				</div>
				<div class="col-12 mt-1">
					<p class="h3 font-weight-bold text-white text-center mb-0">@lang('messages.give yourself a few dream days for you and your family')</p>
					<p class="h5 text-center text-white">@lang('messages.horseback riding, excursions, activities and expeditions that you will never forget')</p>
				</div>
			</div>
		</div>		
	</div>
</section>

<section class="ftco-section bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12 mb-2">
				<div class="row">
					<div class="col-12 heading-section">
						<p class="h4 mb-4">@lang('messages.some') <b>@lang('messages.activities')</b></p>
					</div>
					@foreach($language->activities->where('state', 1) as $activity)
					<div class="col-lg-6 col-md-6 col-12">
						<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">{{ $activity->name }}</span></p>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 col-12 mb-2">
				<p class="h4 font-weight-bold text-center mb-0">@lang('messages.transfers')</p>
				<p class="h4 text-center mb-4">@lang('messages.airport hotel airport')</p>

				<div class="accordion mb-3" id="accordion">
					@foreach($language->transfers->where('state', 1) as $transfer)
					<div class="card">
						<div class="card-header p-0" id="{{ "heading".$transfer->slug }}">
							<a href="javascript:void(0);">
								<p class="h6 text-dark p-2 mb-0" data-toggle="collapse" data-target="{{ "#collapse".$transfer->slug }}" aria-expanded="@if($loop->iteration==1){{ 'true' }}@else{{ 'false' }}@endif" aria-controls="{{ "collapse".$transfer->slug }}">{{ $transfer->title }}</p>
							</a>
						</div>

						<div id="{{ "collapse".$transfer->slug }}" class="collapse @if($loop->iteration==1){{ 'show' }}@endif" aria-labelledby="{{ "heading".$transfer->slug }}" data-parent="#accordion">
							<div class="card-body p-2">{{ $transfer->description }}</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-white py-0" id="contact">
	<div class="bg-title parallax" style="background: url('{{ image_exist('/admins/img/settings/', $setting->contact_banner) }}') center no-repeat fixed;">
		<div class="overlay-white"></div>
		<div class="container">
			<div class="row py-5">
				<div class="col-12 text-center">
					<i class="fa fa-2x fa-envelope-o text-white bg-primary rounded-circle p-4"></i>
				</div>
				<div class="col-12 mt-1">
					<p class="h3 font-weight-bold text-center mb-0">@lang('messages.contacts')</p>
				</div>
			</div>
		</div>
	</div>
</section>

@if(!empty($setting->map) && !is_null($setting->map))
<section class="ftco-section bg-light py-0">
	<div class="row mx-0">
		<div class="col-12 px-0">
			{!! $setting->map !!}
		</div>
	</div>
</section>
@endif

<section class="ftco-section bg-white pt-5 pb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<form method="POST" action="#">
					<div class="row">
						<div class="col-12">
							<p class="h4 title-last-bold"><b>@lang('messages.contact/form')</b> @lang('messages.form/contact')</p>
						</div>
						<div class="col-lg-6 col-md-6 col-12 mb-3">
							<label class="col-form-label">@lang('messages.your name') *</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="col-lg-6 col-md-6 col-12 mb-3">
							<label class="col-form-label">@lang('messages.your email') *</label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="col-12 mb-3">
							<label class="col-form-label">@lang('messages.subject') *</label>
							<input type="text" class="form-control" name="subject" required>
						</div>
						<div class="col-12 mb-3">
							<label class="col-form-label">@lang('messages.your message') *</label>
							<textarea class="form-control" name="message" required rows="7"></textarea>
						</div>
						<div class="col-12 mb-3">
							<input type="submit" class="btn btn-primary rounded" value="@lang('messages.send')">
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-6 col-md-6 col-12">
				<div class="row">
					@if(!empty($language->attention->attention) && !is_null($language->attention->attention))
					<div class="col-12">
						<p class="h5 text-primary">@lang('messages.customer/attention') <b>@lang('messages.attention/customer')</b></p>
						{!! $language->attention->attention !!}
					</div>

					<div class="col-12">
						<hr>
					</div>
					@endif

					<div class="col-12">
						<p class="h5 text-primary">@lang('messages.our') <b>@lang('messages.offices')</b></p>
						<p class="text-dark"><i class="fa fa-map-marker text-white bg-primary rounded-circle px-2 py-2 mr-3"></i> <b>@lang('messages.address'):</b> {{ $setting->address }}</p>
						<p class="text-dark"><i class="fa fa-phone text-white bg-primary rounded-circle p-2 mr-3"></i> <b>@lang('messages.phone'):</b> {{ $setting->phone }}</p>
						<p class="text-dark"><i class="fa fa-envelope text-white bg-primary rounded-circle p-2 mr-3"></i> <b>@lang('messages.email'):</b> {{ $setting->email }}</p>
					</div>

					<div class="col-12">
						<hr>
					</div>

					@if(!empty($language->attention->schedule) && !is_null($language->attention->schedule))
					<div class="col-12 mb-3">
						<p class="h5 text-primary">@lang('messages.attention/achedule') <b>@lang('messages.schedule/attention')</b></p>
						{!! $language->attention->schedule !!}
					</div>
					@endif
				</div>
			</div>

			<div class="col-12">
				<hr>
			</div>

			@if(!empty($language->politic->booking) && !is_null($language->politic->booking))
			<div class="col-12 mb-3">
				<p class="h5 text-primary">@lang('messages.reservation/policy') <b>@lang('messages.policy/reservation')</b></p>
				{!! $language->politic->booking !!}
			</div>
			@endif

			@if(!empty($language->politic->cancellations) && !is_null($language->politic->cancellations))
			<div class="col-12 mb-5">
				<p class="h5 text-primary">@lang('messages.cancelltion/policy') <b>@lang('messages.policy/cancelltion')</b></p>
				{!! $language->politic->cancellations !!}
			</div>
			@endif
		</div>
	</div>
</section>

<div class="modal fade" id="modalExcursion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleExcursion"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<img src="" class="w-100 img-fluid" id="imgExcursion">
					</div>
					<div class="col-12" id="descriptionExcursion">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/admins/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
@endsection