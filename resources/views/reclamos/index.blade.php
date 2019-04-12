@extends('layout.layout')

@section('estilos')
<!-- DataTables CSS -->
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<!-- DataTables Responsive CSS -->
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')
<div class="row">
	<div class="col-lg-6">
		<h3 class="page-header">SERVICIOS
			<button type="button" class="btn btn-primary" onclick="location.href='/servicio/'">Servicios</button>
		</h3>
 
	</div>
	
	<div class="col-lg-6">
		<h3 class="page-header">OBSERVACIONES
			<button type="button" class="btn btn-primary" onclick="location.href='/observaciones/'">Observaciones</button>
		</h3>
		
	</div>
	<!-- /.col-lg-12-->
</div>

<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<h3>RECLAMOS</h3>
		<div class="panel panel-primary">
			<div class="panel-heading">
				
			</div>
		
		<!-- /.panel-heading -->

			<div class="panel-body">

				<div class="dataTable_wrapper">

					@if($total->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
						
						</button>
						No se tiene ninguna observacion <a href="#" class="alert-link"> Ingrese una nuevo reclamo</a>.
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
								<th>TURBO</th>		
								<th>MOTOR</th>
								<th>PLACA</th>
								<th>ESTADO DEL RECLAMO</th>
								<th>OPERACIONES</th>	
							</tr>
						</thead>
						<body>
							@foreach($total as $a)
							<tr class="odd gradeA" rol="row">
								<td>{{ $a->id }}</td>
								<td>{{ $a->cliente_id }}</td>
								<td>{{ $a->nombre }} {{ $a->apellido_pate }} {{ $a->apellido_mate }}</td>
								<td>{{ $a->turbo }}</td>
								<td>{{ $a->motor }}</td>
								<td>{{ $a->placa }}</td>
								<td><?php if (@$a->estado=="ACTIVO") {
									echo '<strong style="color:green;">'.$a->estado.'</strong>';
									} else{echo '<strong style="color:red;">'.$a->estado.'</strong>';}
									?>  
								</td>

								<td>				
									<button type="button"  onclick="location.href='/reclamos/{{ $a->id }}'"><i class="fa fa-tasks fa-fw"></i>Reporte
									</button>
									<button type="button"  onclick="location.href='/reclamos/{{ $a->id }}/edit'"><i class="fa fa-tasks fa-fw"></i>Editar
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