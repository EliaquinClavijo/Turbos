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
		<h3 class="page-header">NUEVO TURBO
			<button type="button" class="btn btn-primary" onclick="location.href='/turbos/create'">Nuevo</button>
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
					@if($turbos->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
						
						</button>
						No se tiene ningun turbo <a href="#" class="alert-link"> Ingrese un nuevo turbo</a>.
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
								<th>NRO Turbo</th>
								<th>Nombre</th>
								<th>OPERACIONES</th>
							</tr>
						</thead>
						<body>
							@foreach($turbos as $a)
							<tr class="odd gradeA" rol="row">
								<td>{{ $a->idturbo }}</td>
								<td>{{ $a->name }}</td>
								<td>
									<button type="button"  onclick="location.href='/turbos/{{ $a->idturbo }}'"><i class="fa fa-tasks fa-fw"></i>Ver
									</button>
									<button type="button"  onclick="location.href='/editmarca/{{ $a->idturbo }}'"><i class="fa fa-tasks fa-fw"></i>Modificar Turbo
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