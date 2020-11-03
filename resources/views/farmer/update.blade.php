@extends('layouts.main')
@section('content')
<div class="container">
	<form class="col-sm-6" method="POST" action="{{URL::to('edit/farmer/'.$farmer->id)}}">
		{{csrf_field()}}
		<div class="form-group row">
		<label for="name" class="col-sm-4 text-md-right col-form-label">Name</label>
		<input class="form-control col-sm-8 " type="text" name="name" value="{{$farmer->name}}">
	</div >	
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label" >Email</label>
			<input class="form-control col-sm-8 " type="email" name="email" value="{{$farmer->email}}">
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label">Phone Number</label>
			<input class="form-control col-sm-8 " type="text" name="phone" value="{{$farmer->phone}}">
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-4 text-md-right col-form-label">Address</label>
			<input class="form-control col-sm-8 " type="text" name="address" value="{{$farmer->address}}">
		</div>
		<input type="submit" name="" class="btn btn-md btn-danger">
	</form>
</div>




@endsection 