<?php

use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', compact('tasks'));
});

Route::post('/task', function (Request $request) {
    $request->validate([
        'name' => 'required|max:255',
    ]);

    Task::create([
        'name' => $request->name,
    ]);

    return redirect('/');
});

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});

