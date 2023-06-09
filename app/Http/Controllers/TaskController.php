<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();

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
    public function store()
	{
		request()->validate([
			'title' => 'required',
			'body'  => 'required'
		]);
		
		$values = request(['title', 'body']);
		$values['user_id'] = auth()->id();
		
		$task = Task::create($values);
		
		return redirect('/tasks/'.$task->id);
    }
	
	public function show(Task $task)
	{
		abort_unless(auth()->user()->owns($task), 403);
		
		return view('tasks.show', [
			'task' => $task
		]);
    }
	
	public function edit(Task $task)
	{
		abort_unless(auth()->user()->owns($task), 403);
		
		return view('tasks.edit', [
			'task' => $task
		]);
    }
	
	public function update(Task $task)
	{
		abort_unless(auth()->user()->owns($task), 403);
		
		request()->validate([
			'title' => 'required',
			'body'  => 'required'
		]);
		
		$task->update(request(['title', 'body']));
		
		return redirect('/tasks/'.$task->id);
    }
	
	public function destroy(Task $task)
	{
		abort_unless(auth()->user()->owns($task), 403);
		
		$task->delete();
		
		return redirect('/tasks');
    }
}
