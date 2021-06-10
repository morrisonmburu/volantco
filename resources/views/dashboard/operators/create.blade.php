<!-- Vertical form modal -->
<div id="ModalUserForm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Operator Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'name')) }}
				    </div>

				    <div class="form-group">
				        {{ Form::label('email', 'Email') }}
				        {{ Form::email('email', '', array('class' => 'form-control', 'id' => 'email')) }}
				    </div>

				    <h5><b>Give Role</b></h5>

				    <div class='form-group'>
				        @foreach ($roles as $role)
				            {{ Form::checkbox('roles[]',  $role->id, array('class' => 'form-control', 'id' => 'role')) }}
				            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
				        @endforeach
				    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="createOperator" class="btn btn-primary">Add Operator</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->