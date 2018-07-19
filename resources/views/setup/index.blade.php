@extends('layouts.app')


@section('content')
    <div class="col-md-9">
    	@include('inc.messages')
    	<div class="row">
    		<div class="col-md-3 well">
	 			@if(count($clients) > 0)
			    <table class="table table-responsive table-striped">
			    	<thead>
				        <tr>
				            <th>Client List</th>			        	
				        </tr>
			        </thead>
			     
			     	<tbody>
			            @foreach($clients as $client)
			            <tr>
			                <td>
			                	<a href="/addclient/{{ $client->id }}/edit">	{{$client->client_name}}
			                	</a>
			               	</td>
			            </tr>
			            @endforeach
			    @endif
			        </tbody>
			    </table>
			    <hr>
			    <a href="/addclient" class="btn btn-primary">Add New</a>
    		</div>

    		<div class="col-md-4 col-md-push-1 well">
	 			@if(count($projects) > 0)
			    <table class="table table-responsive table-striped">
			    	<thead>
				        <tr>
				            <th>Project List</th>			        	
				        </tr>
			        </thead>
			     
			     	<tbody>
			            @foreach($projects as $project)
			            <tr>
			                <td>
			                	<a href="/addproject/{{ $project->id }}/edit">
			                		{{$project->project_name}}
			                	</a>
			                </td>
			            </tr>
			            @endforeach
			    @endif
			        </tbody>
			    </table>
			    <hr>
			    <a href="/addproject" class="btn btn-primary">Add New</a>
    		</div>

    		<div class="col-md-3 col-md-push-2 well">
	 			@if(count($activityStats) > 0)
			    <table class="table table-responsive table-striped">
			    	<thead>
				        <tr>
				            <th>Status List</th>			        	
				        </tr>
			        </thead>
			     
			     	<tbody>
			            @foreach($activityStats as $activityStat)
			            <tr>
			                <td>
			                	<a href="/addstat/{{ $activityStat->id }}/edit">
			                		{{$activityStat->status_name}}
			                	</a></td>
			            </tr>
			            @endforeach
			    @endif
			        </tbody>
			    </table>
			    <hr>
			    <a href="/addstat" class="btn btn-primary">Add New</a>
    		</div>
    	</div>
    </div>

    @include('inc.sidenav')
@endsection


