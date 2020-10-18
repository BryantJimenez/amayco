@extends('layouts.admin')

@section('title', 'Editar Reservación')

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
						<h4>Editar Reservación</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area">

				<div class="row">
					<div class="col-12">

						@include('admin.partials.errors')

						<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
						<form action="{{ route('reservation.update', ['slug' => $reservation->slug]) }}" method="POST" class="form" id="formReservationEdit" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-6">
									<label class="col-form-label">Reservación<b class="text-danger">*</b></label>
									<input class="form-control" type="text" name="reservation" required placeholder="Introduzca un reservación" value="{{ $reservation->reservation }}">
								</div>

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Tipo<b class="text-danger">*</b></label>
									<select class="form-control" name="type">
										<option value="">Seleccione</option>
										<option value="1" @if($reservation->type==1) selected @endif>Reservas</option>
										<option value="2" @if($reservation->type==2) selected @endif >Cancelaciones</option>
									</select>
								</div>

								<div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
									<label class="col-form-label">Idioma<b class="text-danger">*</b></label>
									<select class="form-control" name="lang">
										<option value="">Seleccione</option>
										<option value="en" @if($reservation->lang=='en') selected @endif >Inglés</option>
										<option value="es" @if($reservation->lang=='es') selected @endif >Español</option>
									</select>
								</div>


								<div class="form-group col-12">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-primary" action="reservation">Guardar</button>
										<a href="{{ route('reservation.index') }}" class="btn btn-secondary">Volver</a>
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