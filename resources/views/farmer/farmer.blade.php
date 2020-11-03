@extends('layouts.farmer')
@section('content')
<div class="container">
	@if(Session::get('message') != null)
		<div class="col-sm-8 alert alert-success">
			{{Session::get('message')}}
		</div>
	@endif

	<div class="card">
		<div class="card-heading" style="background-color: #76448A ;">
			<h4 class="text-light" style="margin-left: 10px; margin-top: 5px;">My Questions</h4>
		</div>
		<div style="padding: 5px;">
			<table class="table table-sm table-bordered table-hover table-striped">
				<thead style="background-color: #76448A;">
					<tr>
						<td>#</td>
						<td>Question</td>
						<td>Date</td>
					</tr>
				</thead>
				<tbody>
					@if(count($questions) != 0)
					<?php $i = 1; ?>
					@foreach($questions as $question)
					<tr>
						<td>{{$i}}</td>
						<td>{{$question->question}}</td>
						<td>{{$question->date}}</td>
					</tr>
					<?php $i++; ?>
					@endforeach
					@else
					<tr><td colspan="3">You have asked 0 questions!</td></tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	<div class="card" style="margin-top: 10px;">
		<div class="card-heading" style="background-color: rgb(#000000;">
			<h4 class="text-light" style="margin-top: 5px; margin-left: 10px;">Answered Questions</h4>

		</div>

		<div style="padding: 5px;">
			<?php $i = 1; ?>
			@foreach($answered as $answerd)
			<table class="col-sm-8" style="margin-top: 5px;">
				<tr><td></td></tr>
				<tr><td style="color: silver">{{$i}}. {{$answerd->question}}</td></tr>
				<?php 
					$qs = App\Answer::where('question_id', $answerd->id)->orderBy('id', 'desc')->paginate(10);
		 		?>
		 			@foreach($qs as $q)
						<tr ><td style="margin-left: 100px;"><span style="font-weight: bold;">{{$q->vet()}}</span> replied: {{$q->answer}}</td>
						</tr>		 			
		 			@endforeach
			</table>
			{{ $answered->onEachSide(5)->links() }}
			<?php $i++; ?>
			@endforeach
		</div>
		
	</div>
</div>


@endsection