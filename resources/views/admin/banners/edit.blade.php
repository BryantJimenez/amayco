@extends('layouts.admin')

@section('title', 'Editar Banner')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendor/dropify/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendor/lobibox/Lobibox.min.css') }}">
@endsection

@section('content')

<div class="row layout-top-spacing">

	<div class="col-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<h4>Editar Banner</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area">

				<div class="row">
					<div class="col-12">

						@include('admin.partials.errors')

						<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
						<form action="{{ route('banners.update', ['slug' => $banner->slug]) }}" method="POST" class="form" id="formBannerEdit" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Título<b class="text-danger">*</b></label>
									<input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Introduzca un título" value="{{ $banner->title }}">
								</div>

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Tipo<b class="text-danger">*</b></label>
									<select class="form-control @error('type') is-invalid @enderror" name="type" required>
										<option value="">Seleccione</option>
										<option @if($banner->type=="1") selected @endif value="1">Imagen</option>
										<option @if($banner->type=="2") selected @endif value="2">Video</option>
									</select>
								</div>

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Idioma<b class="text-danger">*</b></label>
									<select class="form-control @error('language_id') is-invalid @enderror" name="language_id" required>
										<option value="">Seleccione</option>
										@foreach($languages as $language)
										<option @if($banner->language_id==$language->id) selected @endif value="{{ $language->slug }}" >{{ $language->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Imagen/Video<b class="text-danger">*</b></label>
									<input type="file" name="archive" accept="image/*,video/*" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3 mp4" data-default-file="{{ '/admins/img/banners/'.$banner->archive }}" />
								</div>

								<div class="form-group col-12">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-primary" action="banner">Actualizar</button>
										<a href="{{ route('banners.index') }}" class="btn btn-secondary">Volver</a>
									</div>
								</div> 
							</div>
						</form>
					</div>                                        
				</div>

			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('/admins/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/select2/custom-select2.js') }}"></script>
<script src="{{ asset('/admins/vendor/dropify/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/admins/vendor/jquery-taginput/jquery.tagsinput.js') }}"></script>
<script src="{{ asset('/admins/vendor/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendor/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendor/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendor/lobibox/Lobibox.js') }}"></script>
@endsection