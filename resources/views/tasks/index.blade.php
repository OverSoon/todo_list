@extends('layouts.main')

@section('title', 'Task Home')

@section ('content')

<div class="row justify-content-center mb-3">
    <div class="col-sm-4">
        <a href=" {{ route('task.create')}} " class="btn btn-block btn-success">Create Task</a>
    </div>
</div>

<div class="container">

    @if($tasks->count() == 0)
    <p class="lead text-center">There are no task listed. Create one!</p>
    @else
    @foreach($tasks as $task)

    <div class="row">
        <div class="col-sm-12" style="margin-top: 20px">
            <h3>
                {{ $task->name }}
                <small>{{ $task->created_at }}</small>                
            </h3>
            <hr>
            <p>{{ $task->description }}</p>
            <h4>Due Date: <small>{{ $task->due_date }}</small></h4>

            {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
            <a href=" {{ route('task.edit', $task->id )}} " class="btn btn-sm btn-primary">Edit</a>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            {!! Form::close() !!}

        </div>
    </div>

    @endforeach
    @endif
</div>
@endsection