<!-- Vertical form modal -->
<div id="ModalUserForm2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Operator Form</h5>
				<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
					<div class="form-group">
				        {{ Form::label('name', 'Name') }}
				        {{ Form::text('name', null, array('class' => 'form-control', 'id' => 'Name')) }}
				    </div>

				    <div class="form-group">
				        {{ Form::label('email', 'Email') }}
				        {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'Email')) }}
				    </div>

				    <h5><b>Give Role</b></h5>

				    <div class='form-group'>
				        @foreach ($roles as $role)
				            {{ Form::checkbox('rolesEdit[]',  $role->id, $user->roles ) }}
				            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

				        @endforeach
				    </div>
				    <input type="hidden" name="idNumber" id="idNumber">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button id="editOperator" class="btn btn-primary">Edit Operator</button>
				</div>
			</form>
		</div>
	</div>
</div>
					<!-- /vertical form modal -->