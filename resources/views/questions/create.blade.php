@extends('layouts.farmer')
@section('content')
<div class="container">
	<div class="col-sm-8">
		<div class="card card-info">
			<div class="card-heading bg-info">
				<h4 class="text-light">Question</h4>
			</div>
			<form action="{{URL::to('question/'.$id)}}" method="POST">
				{{csrf_field()}}
				<div class="col-sm-12" style="margin-top: 10px;">
					<div class="form-group row justify-content-center">
						<textarea style="height: 150px; margin-left: 10px;" class="form-control col-sm-11" placeholder="Type your question" name="question"></textarea>
					</div>
				</div>
				<div class="row justify-content-center">
					<button class="btn btn-md btn-info">Send</button>
				</div>
			</form>
		
		</div>
	</div>
</div>
@endsection