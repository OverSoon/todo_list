
@extends('layouts.main')


        @section('title', 'Create Task')
    
        @section ('content')

        <div class="row">
            <div class="container">
               
                <h1>Create task</h1>
                {!! Form::open(['route' => 'task.store', 'method' => 'POST']) !!}
                @component('components.taskForm')
                @endcomponent
                {!! Form::close() !!}
            </div>
        </div>
@endsection 
