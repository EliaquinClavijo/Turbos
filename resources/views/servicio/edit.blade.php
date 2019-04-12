@extends('layout.layout')

@section('content')
<style type="">
	.register {
   width: 100%;
   margin: 10px auto;
   padding: 10px;
   border: 7px solid $green-border;
   border-radius: 10px;
   font-family: "Helvetica Neue", Helvetica, 
   Arial, sans-serif;
     color: #444;
   background-color: $back-color;
   box-shadow: 0 0 20px 0 #000000;
   float:left;
   }

#horizontal3 {display: inline-block; *display: inline; zoom: 1; vertical-align: top; font-size: 15px;width: 450px; text-align: center;}




.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0x09{background-color:#9b9b9b;text-align:left;vertical-align:top}
.tg .tg-yhdn{background-color:#9698ed;border-color:inherit;text-align:left}



input {
  width: 40%;
}

.tg-quj4{border-color:inherit;text-align:right}
.tg-xldj{border-color:inherit;text-align:left}

</style>
<div class="row">
	<div class="col-lg-12">
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				Ingrese los datos del Servicio
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center">
						<form role="form" method="post" action="/servicio/{{@$ide->id}}" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data" >
						{!! method_field('PUT')!!}
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
									</button>
									{{ $error }}
								</div>
							@endforeach

							<input type="hidden" name="_token" value="{{  csrf_token()  }}">

							<div  align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3"><h3>Datos del Servicio</h3></th>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Numero de proforma :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="id" readonly value="{{@$ide->id}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>DNI :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="dni" value="{{@$ide->dni}}">
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label> Nombre :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="nombre" value="{{@$ide->nombre}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Paterno :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="apellido_pate" value="{{@$ide->apellido_pate}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Materno: </label></td>
									    <td class="tg-xldj" colspan="2" ">
									    	<input type="text" class="form-control" name="apellido_mate" value="{{@$ide->apellido_mate}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Telefono :</label> </td>
									    <td class="tg-xldj" colspan="2" ">
									    	<input type="text" class="form-control" name="nro_celular" value="{{@$ide->nro_celular}}" >
									    </td>
									  </tr>
									  

									  <tr>
									    <td class="tg-quj4"><label> Fecha de Servicio :</label></td>
									    <td class="tg-xldj" colspan="2" > 
									    	<input type="date" class="form-control" name="fecha" readonly value="{{@$ide->fecha}}">
									    	
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Turbo :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="turbo" value="{{@$ide->turbo}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> OEMI :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="oemi" value="{{@$ide->oemi}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Motor :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="motor" value="{{@$ide->motor}}"  >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Placa :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text"  class="form-control" name="placa" value="{{@$ide->placa}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Descripcion :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear(this)"></label>
											<fieldset id="field" >	
											<?php 
												$var=json_decode( $ide->descripcion);
												//print_r($var[0]);
											?>
											@for ($i = 0; $i < count($var); $i++)
												<div>
													<select class="form-control" name="descripcion[]">
													@foreach($acti as $p)
														<option value="{{@$p->descripcion}}" <?php if (trim($p->descripcion) == $var[$i]) echo 'selected="selected"'; ?> >{{$p->descripcion}}</option>
													@endforeach
													</select> 
												
												</div>
											
											@endfor		    	
											</fieldset>
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label> Adelanto :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="adelanto"  value="{{@$ide->adelanto}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Costo total :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="costo_total" value="{{@$ide->costo_total}}" >
									    </td>
									  </tr>

									  <tr>
									  	<td class="tg-quj4"><button type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									    
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/servicio'">Volver</button></td>
									  </tr>
									  

									  

								</table>
					    	</div>
					    	<script type="text/javascript">
								
 
									icremento =0;
									function crear(obj) {
									  icremento++;
									 
									  field = document.getElementById('field');
									 
									  

									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Descripcion:'+icremento;
					  				  contenedor.appendChild(lbl);

					  				  select = document.createElement("select");
									  select.name="descripcion[]";
									  select.className="form-control";
									  contenedor.appendChild(select);

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("NINGUNO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE TURBO");
									  t = document.createTextNode("VENTA DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE NUCLEO CENTRAL");
									  t = document.createTextNode("VENTA DE NUCLEO CENTRAL");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE KIT DE ACCESORIOS DE TURBO");
									  t = document.createTextNode("VENTA DE KIT DE ACCESORIOS DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE EJE DE TURBO");
									  t = document.createTextNode("VENTA DE EJE DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE COMPRESOR DE TURBO");
									  t = document.createTextNode("VENTA DE COMPRESOR DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE EJE ROTOR");
									  t = document.createTextNode("VENTA DE EJE ROTOR");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE GEOMETRIA VARIABLE");
									  t = document.createTextNode("VENTA DE GEOMETRIA VARIABLE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE SENSOR DE GEOMETRIA");
									  t = document.createTextNode("VENTA DE SENSOR DE GEOMETRIA");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE CARACOL DE ESCAPE");
									  t = document.createTextNode("VENTA DE CARACOL DE ESCAPE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE CARACOL DE ADMISION");
									  t = document.createTextNode("VENTA DE CARACOL DE ADMISION");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE VALVULA DE VACIO");
									  t = document.createTextNode("VENTA DE VALVULA DE VACIO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "BALANCEO DE TURBO");
									  t = document.createTextNode("BALANCEO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "REPARACION DE TURBO");
									  t = document.createTextNode("REPARACION DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "MANTENIMIENTO DE TURBO");
									  t = document.createTextNode("MANTENIMIENTO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "DIAGNOSTICO DE TURBO");
									  t = document.createTextNode("DIAGNOSTICO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "RECTIFICACION DE EJE");
									  t = document.createTextNode("BALANCEO DE EJE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "RECTIFICADO DE NUCLEO");
									  t = document.createTextNode("BALANCEO DE NUCLEO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "COMPROVADO DE TURBO");
									  t = document.createTextNode("COMPROVADO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "OTROS");
									  t = document.createTextNode("OTROS");
									  z.appendChild(t);
									  select.appendChild(z);

									  
									  }
									function borrar(obj) {
									  field = document.getElementById('field');
									  field.removeChild(document.getElementById(obj));
									}
							</script>

								
							
							

							

							

							
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop