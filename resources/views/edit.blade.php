@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ url('/tasks/update') }}" method="post">
			@csrf
			<input type="hidden" name="task_id" value="{{ $task->id }}">
				Task:
				<textarea name="task" class="form-control mb-2"  value="{{ $task->task }}">{{ $task->task }}</textarea>
				
			<input type="submit" value="Update"
			class="btn btn-success">
		</form>
	</div>				
@endsection