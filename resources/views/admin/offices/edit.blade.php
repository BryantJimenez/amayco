 @extends('layouts.admin')

@section('title', 'Editar Datos de Oficina')

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
						<h4>Editar Datos de Oficina</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area">

				<div class="row">
					<div class="col-12">

						@include('admin.partials.errors')

						<p>Campos obligatorios (<b class="text-danger">*</b>)</p>
						<form action="{{ route('office.update', ['slug' => $office->slug]) }}" method="POST" class="form" id="formOfficeEdit" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group col-12">
									<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
									<textarea class="form-control" required name="address" placeholder="Introduce la dirección" rows="5">{{ $office->address }}</textarea>
								</div>

								<div class="form-group col-12">
								<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
									<input class="form-control" type="text" name="phone" required placeholder="Introduzca un teléfono" value="{{ $office->phone }}">
								</div>

								<div class="form-group col-12">
								<label class="col-form-label">Correo<b class="text-danger">*</b></label>
									<input class="form-control" type="email" name="email" required placeholder="Introduzca un teléfono" value="{{ $office->email }}">
								</div>


								


								<div class="form-group col-12">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-primary" action="office">Guardar</button>
										<a href="{{ route('office.index') }}" class="btn btn-secondary">Volver</a>
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