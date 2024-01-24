@extends('layouts.app')

@section('content')
<div class="container">

	@if($errors->any())
		<div class="alert alert-danger">
			<ol>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ol>
		</div>
	@endif

	@if(session('info'))
		<div class="alert alert-info">
			{{ session('info') }}
		</div>
	@endif

	<form action="{{ url('/tasks/create') }}" method="post">
		@csrf
		
			Task:
			<textarea name="task" class="form-control mb-2" placeholder="What's to do?" value="title"></textarea>
			<input type="submit" value="Create" class="btn btn-success">
	</form>

	<br>

    @foreach($tasks as $task)
			<div class="card mb-2">
				<div class="card-body">
					
					<div class="card-subtitle mb-2 text-muted small">
						{{ $task->created_at->diffForHumans() }}
					</div>
					<p class="card-text">{{ $task->task }}</p>
					
					<a class="btn btn-primary"
					href="{{ url("/tasks/edit/$task->id") }}">
						Edit
					</a>

					<a class="btn btn-danger" href="{{ url("/tasks/delete/$task->id") }}">
						Delete
					</a>

				</div>
			</div>
		@endforeach
</div>
@endsection
