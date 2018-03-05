@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col sm-8 col-xs-12">
		<h3><u><b>LISTA DE PERSONERÍAS JURÍDICAS</b></u><a href="personeria/create">
		<BUTTON type="button" class="btn btn-danger"> <i class="fa fa-plus-square"></i> Nueva Personeria</BUTTON></a></h3>
		@include('archivos.personeria.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12  col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th class="bg-primary">Hoja de Ruta</th>
						<th class="bg-primary">Nombre Personería</th>
						<th class="bg-primary">Representante Legal</th>
						<th class="bg-primary">Entidad Solicitante</th>
						<th class="bg-primary">Domicilio</th>
						<th class="bg-primary">Fecha Creacion</th>
						<th class="bg-primary">Opciones</th>
					</thead>
					@foreach($personeria as $per)
						<tr>
							<td >{{$per->hoja_ruta}}</td>
							<td>{{$per->nombre}}</td>
							<td>{{$per->representante_legal}}</td>
							<td>{{$per->institucion_solicitante}}</td>
							<td>{{$per->domicilio}}</td>
							<td>{{$per->fecha_creacion}}</td>
							<td>
								<a href="{{URL::action('PersoneriaController@edit',$per->idpersoneria)}}"><button type="button" class="btn btn-danger"> <i class="fa fa-pencil-square-o"></i> </button></a>
								<a href="" data-target="#modal-delete-{{$per->idpersoneria}}" data-toggle="modal"><button type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> </button></a>
								<!-- <a href="" data-target="#modal-delete-{{$per->idpersoneria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> -->
								<a href="\archivos\personerias/{{$per->archivo}}" download="{{$per->archivo}}" ><button type="button" class="btn btn-danger"> <i class="fa fa-cloud-download"></i></button></a>
							</td>
						</tr>
						
						@include('archivos.personeria.modal')
					@endforeach
				</table>
				
			</div>	
			{{$personeria->render()}}
		</div>
	</div>
@endsection