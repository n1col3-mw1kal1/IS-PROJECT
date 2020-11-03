@extends('layouts.main')
@section('content')
<div class="container">
	<div class="">
		<table class="table table-sm table-bordered table-hover table-striped">
			<thead>
				<tr>
					<td>#</td>
					<td>Name</td>
					<td>Email</td>
					<td>Address</td>
					<td>Phone Number</td>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				@foreach($users as $f)
				<tr>
					<td>{{$i}}</td>
					<td>{{$f->name}}</td>
					<td>{{$f->email}}</td>
					<td>{{$f->address}}</td>
					<td>{{$f->phone}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
				Delete Form
			</div>
			<div class="modal-body">
				Do you want to delete this record?
			</div>
			<div class="modal-footer">
				<a class="nav-link" href="" data-modal="dismiss">No</a>
				<form action="{{URL::to('delete/farmer')}}" method="POST">
					{{csrf_field()}}
					<input type="hidden" name="farmer" id="farmer" value="">
					<input type="submit" class="btn btn-sm btn-info" value="Yes" name="">
				</form>
				
			</div>
		</div>
	</div>	
</div>

<script type="text/javascript">
	function deleted($id){
		$.get('{{URL::to("delete/farm")}}', {id: $id}, function(data){
			$("#farmer").val(data.id);
			alert(data.name);
		});
	}
</script>
@endsection
