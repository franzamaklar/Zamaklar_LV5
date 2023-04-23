<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\User;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$task = Tasks::where('user_id', auth()->user()->id)->get();
        $tasks = Tasks::all();
        $users = User::all();
        return view('dashboard', compact('tasks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Tasks;

        $task->creator_id = auth()->user()->id;
        $task->name = $request->name;
        $task->engname = $request->name;
        $task->subject = $request->subject;
        $task->facultytype = $request->facultytype;
        $task->created_at = $request->created_at;

        $task->save();

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        $task->student_id = auth()->user()->id;

        $task->save();
        return redirect('/dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function aceept($id)
    {
        $task = Tasks::find($id);
        $task->active = false;

        $task->save();
        return redirect('/dashboard');
    }

    public function decline($id)
    {
        $task = Tasks::find($id);
        $task->student_id = null;

        $task->save();
        return redirect('/dashboard');
    }
}
