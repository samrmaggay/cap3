
@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="row container-fluid">
		<div class="container-fluid">
			<div class="container-fluid well" style="margin-bottom: 25px; padding: 30px 30px;">	
				<h1>Add New Status</h1>
		    </div>

		    {!! Form::open(['action' => ['ActivityStatController@update', $activityStat->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		    <div class="well" style="padding: 50px 50px;">
		    	<div class="row">
			    	<div class="col-md-6">
				        <div class="form-group">
					         {{Form::label('status_name', 'Status Name')}}
					          {{Form::text('status_name', $activityStat->status_name, ['class' => 'form-control', 'placeholder' => 'Enter Status Name'] )}}        
				        </div>
			        </div>
			    </div>

				{{Form::hidden('_method', 'PUT')}}			    

			    <div class="row">
			        <div class="col-md-4">
			        	{{Form::submit('Save', ['class' => 'btn btn-primary'])}}
			        	<a href="/setup" role="button" class="btn btn-warning">Cancel</a>		        	
			    	</div>

			    	<div class="col-md-2">
		                    {!!Form::open(['action' => ['ActivityStatController@destroy', $activityStat->id],
		                  'method' => 'POST'])!!}
		                    {{Form::hidden('_method', 'DELETE')}}
		                     {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
		                    {!!Form::close()!!}			    		
			    	</div>			    	
		    	</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

    @include('inc.sidenav')
@endsection