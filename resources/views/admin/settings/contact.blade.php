@extends('layouts.admin')

@section('title', 'Editar Contacto')

@section('links')
<link href="{{ asset('/admins/vendor/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/admins/vendor/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/admins/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('/admins/vendor/lobibox/Lobibox.min.css') }}">
@endsection

@section('content')

<div class="row layout-top-spacing">

	<div class="col-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<h4>Editar Contacto</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area">

				<div class="row">
					<div class="col-12">

						@include('admin.partials.errors')

						<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
						<form action="{{ route('contactos.update') }}" method="POST" class="form" id="formContact">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Teléfono (Opcional)</label>
									<input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Introduzca un télefono" value="{{ $setting->phone }}">
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Email (Opcional)</label>
									<input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Introduzca un email" value="{{ $setting->email }}">
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Dirección (Opcional)</label>
									<input class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Introduzca una dirección" value="{{ $setting->address }}">
								</div>

								<div class="form-group col-12">
									<label class="col-form-label">Mapa (Opcional)</label>
									<textarea class="form-control @error('map') is-invalid @enderror" name="map" placeholder="Ingrese un mapa embebido de google maps" rows="6">{{ $setting->map }}</textarea>
								</div>

								<div class="form-group col-12">
									<button type="submit" class="btn btn-primary" action="contact">Actualizar</button>
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
<script src="{{ asset('/admins/vendor/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendor/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendor/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendor/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/sweetalerts/custom-sweetalert.js') }}"></script>
<script src="{{ asset('/admins/vendor/lobibox/Lobibox.js') }}"></script>
@endsection