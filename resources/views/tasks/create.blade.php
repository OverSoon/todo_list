
@extends('layouts.main')


        @section('title', 'Create Task')
    
        @section ('content')

        <div class="row">
            <div class="container">
               
                <h1>Create task</h1>

                @component('components.taskForm')
                @endcomponent
                
            </div>
        </div>
@endsection 
