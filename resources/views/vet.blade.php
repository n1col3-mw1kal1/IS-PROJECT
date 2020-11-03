@extends('layouts.vet')
@section('content')

<div class="container">
	<div class="card">
		<div class="card-heading" style="background-color: #000000;">
			<h4 class="text-dark" style="margin-left: 10px; margin-top: 5px; ">All Questions</h4>
			@if(Session::get('message') != null)
				<div class="alert alert-success col-sm-10">
					{{Session::get('message')}}
					<a href="" class="close" data-dismiss="alert">&times;</a>
				</div>
			@endif
		</div>

		<div style="padding: 5px;">
			@foreach($questions as $question)
			<div style="border-bottom: 1px solid silver; margin-left: 20px;" >
				<table class="row col-sm-10">
					<tr><td><span style="font-weight: bold;"> {{$question->farmer()}}</span> asked:</td></tr>
					<tr><td style="color: silver;s">{{$question->created_at}}</td></tr>
					<tr><td>{{$question->question}}</td></tr>
					<tr><td></td></tr>
					<tr><td><a href="javascript:void(0)" style="text-decoration: none;">Reply>></a></td></tr>
				</table>
				<div id="{{$question->id}}" >
					<form action="{{URL::to('answer/'.$question->id)}}" method="POST">
						{{csrf_field()}}
						<textarea class="col-sm-12 form-control" name="answer" placeholder="Reply..."></textarea>
					<div class="col-sm-12 justify-content-end row" style="padding:2px;">
						<button class="btn btn-md btn-danger">Send</button>

					</div>
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function(){
		$.get("{{url('get/questions')}}", function(data){
			$.each(function(key, value){
				$("#5").hide();
			});
		});
	});
</script>

@endsection