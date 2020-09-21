@extends('layouts.main')

@section('title', 'Task Home')

@section ('content')
<div class="container">
    @foreach($tasks as $task)

    <div class="row">
        <div class="col-sm-12" style="margin-top: 20px">
            <h3>
                {{ $task->name }}
                <small>{{ $task->created_at }}</small>
            </h3>
            <hr>
            <p>{{ $task->description }}</p>
            <h4>{{ $task->due_date }}</h4>
        </div>
    </div>

    @endforeach


    
    <!-- <div class="row justify-content-center">
		<div class="col-sn-2 text-center">
			{{ $tasks->links() }}
		</div>
	</div> -->

    @endsection
</div>