 @extends('layouts.admin')

@section('title', 'Crear Galería')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/css/forms/switches.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendor/dropify/dropify.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/vendor/jquery-taginput/jquery.tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendor/lobibox/Lobibox.min.css') }}">
@endsection

@section('content')

<div class="row layout-top-spacing">

	<div class="col-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<h4>Crear Galería</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area">

				<div class="row">
					<div class="col-12">

						@include('admin.partials.errors')

						<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
						<form action="{{ route('galery.store') }}" method="POST" class="form" id="formGaleryCreate" enctype="multipart/form-data">
							@csrf
							<div class="row">

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Categoría<b class="text-danger">*</b></label>
									<select class="form-control" name="category_id">
										<option value="">Seleccione</option>
										@foreach($category as $c)
										<option value="{{ $c->id }}">{{ $c->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-6">
									<label class="col-form-label">Título<b class="text-danger">*</b></label>
									<input class="form-control" type="text" name="title" required placeholder="Introduzca un título" value="{{ old('title') }}">
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Imagen<b class="text-danger">*</b></label>
									<input type="file" name="image" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Descripción<b class="text-danger">*</b></label>
									<textarea class="form-control" required name="description" placeholder="Introduce una descripción" rows="5">{{ old('description') }}</textarea>
								</div>

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Idioma<b class="text-danger">*</b></label>
									<select class="form-control" name="lang">
										<option value="">Seleccione</option>
										<option value="en" >Inglés</option>
										<option value="es" >Español</option>
									</select>
								</div>


								<div class="form-group col-12">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-primary" action="galery">Guardar</button>
										<a href="{{ route('galery.index') }}" class="btn btn-secondary">Volver</a>
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