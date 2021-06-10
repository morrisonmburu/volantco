@extends("dashboard.includes.main")

@section("content")
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Form controls -->
        <div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="gAaGWkWzd2">

            <div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="gAaGWkWzd2" data-index="0">
                <div class="panel-heading ui-sortable-handle">
                    <div class="btn-group"> 
                        <a style="background-color:#26a69a; border-color: #26a69a" class="btn btn-primary" href="/house_type/"> <i class="fa fa-plus"></i> View House Type</a>  
                 </div>
                 <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
                 <div class="panel-body">

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(count($errors))
                    <div class="alert alert-danger">
                        <strong>
                            Whoops!
                        </strong>
                        There were some problems with your input.
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <br>

                    {!! Form::open(['action'=> 'houseTypeController@store', 'method'=>'POST'], ['class'=>'col-sm-6']) !!}
                    <div class="form-group">
                        <label> House Title<font color="red">*</font></label>
                        {{Form::text('title', '', ['required'=>"", 'class'=>'form-control', 'placeholder'=>'Enter House Title'])}}
                    </div> 

                    <div class="form-group">
                        <label>Least Room Counts<font color="red">*</font></label>
                        {{Form::number('room_counts', '', ['required'=>"", 'class'=>'form-control', 'placeholder'=>'Least Room Counts'])}}
                    </div>  

                    <div class="form-group">
                        <label>Price<font color="red">*</font></label>
                        {{Form::number('price', '', ['required'=>"", 'class'=>'form-control', 'placeholder'=>'Price'])}}
                    </div>                                  

                <br>                            
                <div style="align-items: center;" class="reset-button">
                   {{ Form::reset('Clear form', ['class'=>'btn btn-warning form-button', 'style'=>'background-color: #26a69a, border-color:#26a69a']) }}

                   {{ Form::submit('Save', ['class'=>'btn btn-success','style'=>'background-color: #26a69a, border-color:#26a69a'])}}
               </div>
               {!! Form::close() !!}
           </div>  
       </div>
   </div>
</div>
</section>

</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page container -->

</body>
</html>


@endsection