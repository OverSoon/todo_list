
@extends('layouts.main')


@section('title', 'Edit Task')

@section ('content')

<div class="row">
    <div class="container">
       
        <h1>Edit Task</h1>
        {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'PUT']) !!}
        @component('components.taskForm')
        @endcomponent
        {!! Form::close() !!}
    </div>
</div>
@endsection 
