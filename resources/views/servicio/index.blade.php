@extends('layout.layout')

@section('estilos')
<!-- DataTables CSS -->
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<!-- DataTables Responsive CSS -->
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')

<div class="row">
	
	<div class="col-lg-4">
		<h3 class="page-header">OBSERVACIONES
			<button type="button" class="btn btn-primary" onclick="location.href='/observaciones/'">Observaciones</button>
		</h3>
		
	</div>
	<div class="col-lg-4">
		<h3 class="page-header">RECLAMOS
			<button type="button" class="btn btn-primary" onclick="location.href='/reclamos/'">Reclamos</button>
		</h3>
		
	</div>
	<!-- /.col-lg-12-->
</div>
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">NUEVO SERVICIO
			<button type="button" class="btn btn-primary" onclick="location.href='/servicio/create'">Nuevo</button>
		</h3>

	</div>
</div>
<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
			</div>
		
		<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					@if($servicio->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
						
						</button>
						No se tiene ningun servicio <a href="#" class="alert-link"> Ingrese un nuevo servicio</a>.
						</div>
					@else
						@if(session('mensaje'))
							<div class="alert alert-success">
								<button type="button" class="close"
								data-dismiss="alert" aria-hidden="true">x</button>
								{{ session('mensaje') }}
							</div>
						@endif
					@endif
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>NRO PROFORMA</th>
								<th>DNI</th>
								<th>NOMBRES Y APELLIDOS</th>
								<th>FECHA</th>
								<th>TURBO</th>
								<th>MOTOR</th>
								<th>PLACA</th>
								
								<th>OPERACIONES</th>
							</tr>
						</thead>
						<body>
							@foreach($servicio as $a)
							<tr class="odd gradeA" rol="row">
								<td>{{ $a->id }}</td>
								<td>{{ $a->cliente_id }}</td>
								<td>{{ $a->nombre }} {{ $a->apellido_pate }} {{ $a->apellido_mate }}</td>
								<td>{{ $a->fecha }}</td>
								<td>{{ $a->turbo }}</td>
								<td>{{ $a->motor }}</td>
								<td>{{ $a->placa }}</td>
								
								<td>
								
									<button type="button"  onclick="location.href='/servicio/{{ $a->id }}'"><i class="fa fa-tasks fa-fw"></i>Reporte
									</button>
									<button type="button"  onclick="location.href='/servicio/{{ $a->id }}/edit'"><i class="fa fa-tasks fa-fw"></i>Editar
									</button>
									<button type="button"  onclick="location.href='/observaciones/{{ $a->id }}/edit'"><i class="fa fa-tasks fa-fw"></i>Observar
									</button>
									<button type="button"  onclick="location.href='/reclamos/{{ $a->id }}/edit'"><i class="fa fa-tasks fa-fw"></i>Reclamar
									</button>
								
									
									
								</td>
							</tr>
							@endforeach
						</body>
						</table>
				</div>
			<!-- /.table-responsiv -->
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<!-- DataTables JavaScript -->
<script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>
@stop

@section('jsope')
<!-- Page-level demo Scripts - tables - Use for reference -->
<script >
	$(document).ready(function () {
		$('#dataTables-example').DataTable({ responsive:true });
		// body...
	});
</script>
@stop