<!-- Vertical form modal -->
<div id="ModalPermissionsForm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Permissions Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'name')) }}
				    </div><br>
				    @if(!$roles->isEmpty())
				        <h4>Assign Permission to Roles</h4>

				        @foreach ($roles as $role) 
				            {{ Form::checkbox('roles[]',  $role->id , array("class" => 'form-control', "id" => 'role')) }}
				            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

				        @endforeach
				    @endif
				    <br>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="createPermission" class="btn btn-primary">Add Permission</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->