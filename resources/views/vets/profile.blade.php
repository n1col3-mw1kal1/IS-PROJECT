@extends('layouts.vet')
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

		<div style="margin-top: 10px;">
			<div class="col-sm-4">
				<table class="table table-bordered table-hover table-sm table-striped">
					<tr><td></td></tr>
					<tr><td>{{ $user->name }}</td></tr>
					<tr><td>{{ $user->email }}</td></tr>
					<tr><td>{{ $user->phone }}</td></tr>

				</table>
			</div>
		</div>
</div>



@endsection 