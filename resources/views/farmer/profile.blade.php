@extends('layouts.farmer')
@section('content')
<div class="container">
	
		@if(Session::get('success') != null)

		<div class="alert alert -success alert-block">

			<button type="button" class="close" data-dismiss="alert">x</button>

			<strong>{{ Session::get('success') }}</strong>strong>
		</div>
		
		@endif

		@if(count($errors) >0)

		<div class="alert">
		
		</div>
		@endif

		<div class="d-inflex-justify" style="margin-top: 5px;">
			<div class="card col-sm-12 border-light">
				<div class="card-heading justify-content-end row " style="background-color: #FF0000; height: 30px;">
					<a href="{{ URL::to('edit/farmer/'.$user->id)}}" class="text-light"><i class="fa fa-edit" style="background-color: #FF0000"></i></a>
				</div>

				<div>
					
				</div>
			</div>
			<div class="col-sm-4">
				<table class="table table-hover table-sm table-bordered">
					<tr>
						<td><i class="fa fa-user fa-4x"></i></td>
					</tr>
					<tr><td>{{$user->name}}</td></tr>
					<tr><td>{{$user->email}}</td></tr>
					<tr><td>{{$user->phone}}</td></tr>
					<tr><td>{{ucwords($user->role)}}</td></tr>
				</table>
			</div>
		</div>
</div>



@endsection 