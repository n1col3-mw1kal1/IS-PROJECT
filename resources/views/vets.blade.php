@extends('layouts.main')
@section('content')
<div class="container">
	@if(Session::get('message') != null)
		<div class="alert alert-success">
			{{Session::get('message')}}
			<a href="" class="close" data-dismiss="alert">&times;</a>
		</div>
	@endif
	<table class="table table-sm table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>Email</td>
				<td>Address</td>
				<td>Phone</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			@if(count($vets) != 0)
			<?php $i = 1; ?>
				@foreach($vets as $vet)
					<tr>
						<td>{{$i}}</td>
						<td>{{$vet->name}}</td>
						<td>{{$vet->email}}</td>
						<td></td>
						<td></td>
						<td>
							<div class="d-inline-flex">
								<a href="{{URL::to('update/vet/'.$vet->id)}}" class="nav-link">Update</a>
								<a href="{{URL::to('delete/vet/'.$vet->id)}}" class="nav-link">Delete</a>
							</div>
						</td>
					</tr>
				@endforeach
			@else
			@endif
		</tbody>
	</table>
</div>
@endsection