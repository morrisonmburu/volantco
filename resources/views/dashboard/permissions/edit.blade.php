<!-- Vertical form modal -->
<div id="ModalPermissionsForm2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Permissions Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Permission Name') }}
				        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'Name')) }}
				    </div>
				    @if(!$roles->isEmpty())
				        <h4>Assign Permission to Roles</h4>

				        @foreach ($roles as $role) 
				            {{ Form::checkbox('rolesEdit[]',  $role->id , array("class" => 'form-control', "id" => 'role')) }}
				            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

				        @endforeach
				    @endif
				    <input type="hidden" name="idNumber" id="idNumber">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="editPermission" class="btn btn-primary">Edit Permission</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->