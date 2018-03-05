@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col sm-6 col-xs-12">
		<h3><u><b>EDITAR PERSONERIA:</b></u>  {{$personeria->nombre}}</h3>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif	

		{!!Form::model($personeria,['method'=>'PATCH','route'=>['personeria.update',$personeria->idpersoneria],'files'=>'true'])!!}
			{{Form::token()}}

				<div class="form-group">
					<label for="hoja_ruta">Hoja de Ruta:</label>
					<input type="text" name="hoja_ruta" value="{{$personeria->hoja_ruta}}" class="form-control">
				</div>

				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" value="{{$personeria->nombre}}"  class="form-control">
				</div>

				<div class="form-group"> 
                		<label form ="fecha_creacion">Fecha de Creacion del Documento:</label>
                		<div class="input-group date">
                    	<input type="text" class="form-control" id="datepicker" required value="2018-01-01" name="fecha_creacion" readonly="readonly">
                    	<div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                    	</div>
                        </div>
              	</div>

				<div class="form-group">
					<label for="representante_legal">Representante Legal:</label>
					<input type="text" name="representante_legal" value="{{$personeria->representante_legal}}"  class="form-control">
				</div>

				<div class="form-group">
					<label for="institucion_solicitante">Institucion/Entidad Solicitante:</label>
					<input type="text" name="institucion_solicitante" value="{{$personeria->institucion_solicitante}}" class="form-control">
				</div>

				<div class="form-group">
					<label for="domicilio">Domicilio:</label>
					<input type="text" name="domicilio" value="{{$personeria->domicilio}}" class="form-control">
				</div>

				<div class="form-group">
      				<label for="imagen">Archivo:</label>
      				<input type="file" name="imagen">
        		</div>

        		<div class="form-group">
				<!-- <div  class="box-footer"> -->
					<button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Guardar</button>
					<button class="btn btn-primary" type="reset"><i class="fa fa-times"></i> Cancelar</button>
					<button type="button" name="Back" onclick="history.back()" class="btn btn-primary"><i class="fa fa-history"></i> Volver a la Lista</button>
					<!-- <input type="button" value="Volver a la Lista" name="Back" onclick="history.back()" class="btn btn-primary" /> -->
				</div>

				<!-- <div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-primary" type="reset">Cancelar</button>
					<input type="button" value="Volver a la Lista" name="Back" onclick="history.back()" class="btn btn-primary" />
				</div> -->
		{!!Form::close()!!}

		</div>
	</div>
@endsection

@section('scripts')
    <script>
        $('#datepicker').datepicker(
        {
            format: 'yyyy/mm/dd',
            autoclose: true,
            enableOnReadonly:true,
            todayBtn:true,
            todayHighlight:true,
            endDate:"0d"
        });
    </script>
@endsection
