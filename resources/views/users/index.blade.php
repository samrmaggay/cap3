@extends('layouts.app')

@section('content')
	<div class="col-md-9">
		@include('inc.messages')
	 	<div class="well container-fluid">
			<div class="panel-heading">
				<h2>User List</h2>
			</div>

			<div class="panel-body">
		    @if(count($users) > 0)
		    <table class="table table-responsive table-striped">
		    	<thead>
			        <tr>
			            <th>Username</th>			        	
			            <th>Email</th>
			            <th>User Role</th>
			        </tr>
		        </thead>
		     
		     	<tbody>
		            @foreach($users as $user)
		            <tr>
		                <td>
		                	<a href="/users/{{ $user->id }}/edit">				{{$user->name}}
		                	</a>
		                </td>
		                <td>{{$user->email}}</td>
		                <td>{{$user->user_role}}</td>
		            </tr>
		            @endforeach
		        @endif
		        </tbody>
		    </table>
			</div>
		</div>
	</div>

    @include('inc.sidenav')
@endsection


