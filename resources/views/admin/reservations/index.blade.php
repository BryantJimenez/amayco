@extends('layouts.admin')

@section('title', 'Lista de Reservaciones')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/vendor/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/vendor/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admins/vendor/table/datatable/dt-global_style.css') }}">
<link href="{{ asset('/admins/vendor/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/admins/vendor/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/admins/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row layout-top-spacing">

	<div class="col-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
						<h4>Lista de "Reservaciones"</h4>
					</div>                 
				</div>
			</div>
			<div class="widget-content widget-content-area shadow-none">

				<div class="row">
					<div class="col-12">
						<div class="text-right">
							<a href="{{ route('reservation.create') }}" class="btn btn-primary">Agregar</a>
						</div>

						<div class="table-responsive mb-4 mt-4">
							<table class="table table-hover table-export">
								<thead>
									<tr>
										<th>#</th>
										<th>Reservación</th>
										<th>Tipo</th>
										<th>Idioma</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($reservations  as $reservation)
									<tr>
										<td>{{ $num++ }}</td>
										<td>{{ $reservation->reservation }}</td>
										<td>{!! reservation($reservation->type) !!}</td>
										<td>{!! lang($reservation->lang) !!}</td>
										<td>{!! state($reservation->state) !!}</td>
										<td>
											<div class="btn-group" role="group">
												<a href="{{ route('reservation.edit', ['slug' => $reservation->slug]) }}" class="btn btn-info btn-sm bs-tooltip" title="Editar"><i class="fa fa-edit"></i></a>
												<button type="button" class="btn btn-danger btn-sm bs-tooltip" title="Eliminar" onclick="deleteReservation('{{ $reservation->slug }}')"><i class="fa fa-trash"></i></button>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>                                        
				</div>

			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="deleteReservation" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres eliminar esta Reservación?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
				<form action="#" method="POST" id="formDeleteReservation">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-primary">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deactiveReservation" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar esta Reservación?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
				<form action="#" method="POST" id="formDeactiveReservation">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="activeReservation" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar esta Reservación?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
				<form action="#" method="POST" id="formActiveReservation">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Activar</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/admins/vendor/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('/admins/vendor/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/table/datatable/button-ext/jszip.min.js') }}"></script>    
<script src="{{ asset('/admins/vendor/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/admins/vendor/sweetalerts/custom-sweetalert.js') }}"></script>
@endsection