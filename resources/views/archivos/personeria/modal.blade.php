<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="0" id="modal-delete-{{$per->idpersoneria}}">
{{Form::Open(array('action'=>array('PersoneriaController@destroy',$per->idpersoneria),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hiden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Personeria</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea eliminar</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
				
			</div>
		</div>
	</div>
{{Form::Close()}}
</div>