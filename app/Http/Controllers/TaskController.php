<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        // when we add the login system we will use
        //$tasks = Task::where('user_id', auth()->id())->get();

        return view('tasks.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'description' => 'nullable',
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => 1, // this very important  auth()->id() this return us the users id from the users

        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
       /* if($task->user-id !== auth()->id()){
            abort(403);
        }*/
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
       /* if ($task->user_id !== auth()->id()){
            abort(403);
        }*/
        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'description' => 'nullable',
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
       /* if($task->user_id !== auth()->id()){
            abort(403);
        }*/
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
