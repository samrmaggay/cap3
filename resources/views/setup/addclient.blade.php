
@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="row container-fluid">
		<div class="container-fluid">
			<div class="container-fluid well" style="margin-bottom: 25px; padding: 30px 30px;">	
				<h1>Add New Client</h1>
		    </div>

		    {!! Form::open(['action' => 'ClientsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		    <div class="well" style="padding: 50px 50px;">
		    	<div class="row">
			    	<div class="col-md-5">
				        <div class="form-group">
					         {{Form::label('client_name', 'Client Name')}}
					          {{Form::text('client_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Client Name'] )}}        
				        </div>
			        </div>
			    </div>

			    <div class="row">
			        <div class="col-md-5 col-md-push-1">
			        	{{Form::submit('Save', ['class' => 'btn btn-primary'])}}
			        	<a href="/setup" role="button" class="btn btn-warning">Cancel</a>		        	
			    	</div>
		    	</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

    @include('inc.sidenav')
@endsection