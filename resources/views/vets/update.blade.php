@extends('layouts.main')
@section('content')
<div class="container">
	<form class="col-sm-6" method="POST" action="{{URL::to('update/vet/'.$vet->id)}}">
		{{csrf_field()}}
		<div class="form-group row">
		<label for="name" class="col-sm-4 text-md-right col-form-label">Name</label>
		<input class="form-control col-sm-8 " type="text" name="name" value="{{$vet->name}}">
	</div >	
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label" >Email</label>
			<input class="form-control col-sm-8 " type="email" name="email" value="{{$vet->email}}">
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label">Phone Number</label>
			<input class="form-control col-sm-8 " type="text" name="phone" value="{{$vet->phone}}">
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label">Address</label>
			<input class="form-control col-sm-8 " type="text" name="address" value="{{$vet->address}}">
		</div>
		<input type="submit" name="" class="btn btn-md btn-danger">
	</form>
</div>




@endsection 