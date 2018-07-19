
@extends('layouts.app')

@section('content')
<div class="col-md-9">
	<div class="row container-fluid">
		<div class="container-fluid">
			<div class="container-fluid well" style="margin-bottom: 25px; padding: 30px 30px;">	
				<h1>Edit User Details</h1>
		    </div>

		    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		    <div class="well" style="padding: 50px 50px;">
		    	<div class="row">
			    	<div class="col-md-6">
				        <div class="form-group">
					         {{Form::label('name', 'Name')}}
					          {{Form::text('name', $user->name, ['class' => 'form-control'] )}}        
				        </div>
			        </div>
			    </div>

		    	<div class="row">
			    	<div class="col-md-4">
				        <div class="form-group">
					         {{Form::label('email', 'Email Address')}}
					          {{Form::text('email', $user->email, ['class' => 'form-control'] )}}        
				        </div>
			        </div>

			    	<div class="col-md-2">
				        <div class="form-group">
					         {{Form::label('user_role', 'User Role')}}
					          {{Form::text('user_role', $user->user_role, ['class' => 'form-control'] )}}        
				        </div>
			        </div>			        
			    </div>



			    {{Form::hidden('_method', 'PUT')}}

			    <div class="row">
			        <div class="col-md-4">
			        	{{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
			        	<a href="/users" role="button" class="btn btn-warning">Cancel</a>		        	
			    	</div>
		    	</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

    @include('inc.sidenav')
@endsection