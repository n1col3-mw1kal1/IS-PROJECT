@extends('layouts.unauthorised')
@section('content')

<div class="container">
	@if(Session::get('message') != null)
		<div class="alert alert-danger">
			{{Session::get('message')}}
			<a href="" class="nav-link close" data-dismiss="alert">&times;</a>
		</div>
	@else
		You are not authorised to access this page!
		<br>
		<a href="{{ URL::to('/')}}" class="nav-link">Redirect to your page</a>
	@endif
</div>

@endsection