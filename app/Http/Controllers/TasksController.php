<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use index;

use function GuzzleHttp\Promise\all;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::orderBy('due_date', 'asc')->paginate();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, [
            'name'=> 'required|string|max:255|min:3',
            'description'=> 'required|string|max:10000|min:5',
            'due_date'=> 'required|date',
        ]);
        //Create a new task
        $task = new Task;

        //Assigne the task data from our request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        //Save the task
        $task->save();

        //Flash ssesion message with success
        Session::flash('success', 'Created Task Successfully');

        //Return a redirect
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $task->dueDateFormatting = false;

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validate the data
         $this->validate($request, [
            'name'=> 'required|string|max:255|min:3',
            'description'=> 'required|string|max:10000|min:5',
            'due_date'=> 'required|date',
        ]);

        //Find the related task
        $task = Task::find($id);

        //Assigne the task data from our request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        //Save the task
        $task->save();

        //Flash ssesion message with success
        Session::flash('success', 'Saved The Task Successfully');

        //Return a redirect
        return redirect()->route('task.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Finding the specific task by id
        $task = Task::find($id);
        
        //Deleting the task
        $task->delete();

        // Flashing a session message
        Session::flash('success', 'Deleted The Task Successfully');

        // Returning a redirect back to the index
        return redirect()->route('task.index');
    }
}
