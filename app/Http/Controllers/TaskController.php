<?php

namespace App\Http\Controllers;

use App\Task; //new line

use Illuminate\Http\Request;

class TaskController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Task::orderBy('id', 'DESC')->get();

        return view('task', [
            'tasks' => $data
        ]);
    }

    public function add()
    {	
    	$validator = validator(request()->all(), [
			'task' => 'required',
		]);
		
		if($validator->fails()) {
			return back()->withErrors($validator);
		} 

    	$task = new Task;
    	$task->task = request()->task;

    	$task->save();

    	return redirect('/tasks')->with('info', 'Successfully Added');
    }

    

    public function edit($id)
    {
    	$data = Task::find($id);

    	return view('edit', [
    		'task' => $data
    	]);
    }

    public function update(Request $request)
    {
    	$id = request()->task_id;
    	$task = Task::find($id);
    	$task->task = request()->task;

    	$task->save();

    	return redirect('/tasks')->with('info', 'Successfully Updated');
    }

    public function delete($id)
    {
    	$data = Task::find($id);

    	$data->delete();
    	return back()->with('info', 'Task deleted');
    }

}
