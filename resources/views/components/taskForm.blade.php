<div class="container">
        {!! Form::open(['route' => 'task.store', 'method' => 'POST']) !!}

        {{ Form::label('name', 'Task Name', ['class' => 'control-lable']) }}
        {{ Form::text('name', null, ['class' => 'form-control form-contorl-lg', 'placeholder' => 'Task Name']) }}

        {{ Form::label('description', 'Task Description', ['class' => 'control-lable mt-3']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Task Description']) }}

        {{ Form::label('due_date', 'Due Date', ['class' => 'control-lable mt-3']) }}
        {{ Form::date('due_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        <div class="row justify-content-center mt-3">
            <div class="col-sm-6">
            <button class="btn-block btn-success" type="submit"> Create Task</button>
            </div>
        </div>

    {!! Form::close() !!}
</div>