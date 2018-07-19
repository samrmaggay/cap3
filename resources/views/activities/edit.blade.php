
@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="well row">
		<div class="container-fluid">
			<div class="container-fluid" style="margin-bottom: 25px;">			
		    	<h1 style="color: green;">Edit Task</h1>
		    </div>
		    {!! Form::open(['action' => 
		    				['ActivitiesController@update', $activity->id], 'method' => 'POST',
		    				'enctype' => 'multipart/form-data']) !!}
		    	<div class="col-md-5 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('client_name', 'Client Name')}}

						<select id="client_name" class="form-control" name="client_name">
	                        <option value="{{$activity->client_name}}">{{$activity->client_name}}</option>
	                        @foreach ($clients as $client)
		                        <option value="{{ $client->client_name }}">{{ $client->client_name }}</option>
	                        @endforeach
	                    </select>			          
			        </div>
		        </div>

		    	<div class="col-md-5 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('project_name', 'Project Name')}}

						<select id="project_name" class="form-control" name="project_name">
	                        <option value="{{$activity->project_name}}">{{$activity->project_name}}</option>
	                        @foreach ($projects as $project)
		                        <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
	                        @endforeach
	                    </select>			          
			        </div>
		        </div>		        

		    	<div class="col-md-4 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('subject', 'Subject')}}
			          {{Form::text('subject', $activity->subject, ['class' => 'form-control'] )}}
			        </div>
		        </div>

		    	<div class="col-md-3 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('due_date', 'Due Date')}}
			          {{Form::date('due_date', $activity->due_date, ['class' => 'form-control'] )}}
			        </div>
		        </div>

		    	<div class="col-md-3 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('time_due', 'Time Due')}}
			          {{Form::time('time_due', $activity->due_time, ['class' => 'form-control'] )}}
			        </div>
		        </div>

		        <div class="col-md-10 col-md-push-1">
			        <div class="form-group">
			           {{Form::label('details', 'Details')}}
			           {{Form::textarea('details', $activity->details, ['class' => 'form-control' 
			           				] )}}
			        </div> 
		        </div>

		        {{Form::hidden('_method', 'PUT')}}

		        <div class="col-md-7 col-md-push-1">
		        	{{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

		        	<a href="/activities" role="button" class="btn btn-warning">Cancel</a>
		    	</div>

		    	<div class="col-md-3 col-md-push-1">
			        <div class="form-group">
			         {{Form::label('status', 'Status')}}
						<select id="status" class="form-control" name="status">
	                        <option value="{{$activity->status}}">{{$activity->status}}</option>
	                        @foreach ($activityStats as $status)
		                        <option value="{{ $status->status_name }}">{{ $status->status_name }}</option>
	                        @endforeach
	                    </select>
			        </div>
		        </div>	

			{!! Form::close() !!}
		</div>
	</div>
</div>

    @include('inc.sidenav')


@endsection