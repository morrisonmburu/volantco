<!-- Vertical form modal -->
<div id="ModalRolesForm2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Roles Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Role Name') }}
				        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'Name')) }}
				    </div>

				    <h5><b>Assign Permissions</b></h5>
				    @foreach ($permissions as $permission)

				        {{ Form::checkbox('permissionsedit[]',  $permission->id, array('class' => 'form-control')) }}
				        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

				    @endforeach
				    <br>
				    <input type="hidden" name="idNumber" id="idNumber">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="editRole" class="btn btn-primary">Edit Role</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->