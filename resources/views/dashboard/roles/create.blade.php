<!-- Vertical form modal -->
<div id="ModalRolesForm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Roles Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) }}
				    </div>

				    <h5><b>Assign Permissions</b></h5>

				    <div class='custom-control custom-checkbox'>
				        @foreach ($permissions as $permission)
				            {{ Form::checkbox('permissions[]',  $permission->id, array('class' => 'form-control')) }}
				            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

				        @endforeach
				    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="createRole" class="btn btn-primary">Add Roles</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->