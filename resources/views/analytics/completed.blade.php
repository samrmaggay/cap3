@extends('layouts.app')

@section('content')
	<div class="col-md-9">
		@include('inc.messages')
	 	<div class="well container-fluid">
			<div class="panel-heading">
				<h2 style="color: black;">Summary of Completed Tasks</h2>
			</div>

			<div class="panel-body">
		    @if(count($activities) > 0)
		    <table class="table table-responsive table-striped">
		    	<thead>
			        <tr>
			            <th>Task Subject</th>			        	
			            <th>Client Name</th>
			            <th>Project Name</th>
			            <th>Deadline</th>
			        </tr>
		        </thead>
		     
		     	<tbody>
		            @foreach($activities as $activity)
		            <tr>
		                <td><a href="#">{{$activity->subject}}</a></td>
		                <td>{{$activity->client_name}}</td>
		                <td>{{$activity->project_name}}</td>
		                <td>{{$activity->due_date}} @ {{$activity->due_time}}</td>
		            </tr>
		            @endforeach
		        @else
		        	<h4>No Tasks Yet On Your List</h4>
		        	<h5><a href="/activities/create">Begin Logging In Your Tasks</a></h5>
		        @endif
		        </tbody>
		    </table>
			</div>
		</div>
	</div>

    @include('inc.sidenav')
@endsection


