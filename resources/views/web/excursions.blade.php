@extends('layouts.web')

@section('title', __('messages.excursions'))

@section('content')

<section class="ftco-section bg-black-light py-2 mb-4">
	<div class="container">
		<div class="row">
			<div class="col-12 py-2">
				<p class="h5 text-white font-weight-bold mb-0">@lang('messages.excursions')</p> 
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-white py-0 pb-5" id="excursions">
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