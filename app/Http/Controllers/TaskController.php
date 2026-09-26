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
        return view('task.main', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:0,1'
        ]);

    Task::create([
        'title'=> $request->title,
        'description'=> $request->description,
        'due_date'=> $request->due_date,
        'status'=> $request->status 
    ]);

    return redirect()->route('tasks.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
       return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view ('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
       $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'nullable|date',
        'status' => 'required|in:0,1',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'status' => $request->status,
    ]);

    return redirect()->route('tasks.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Deleted Successfully');
    }
}
