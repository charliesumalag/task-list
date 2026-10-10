<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('/task', function () {
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('task.index');
Route::view('/task/create', 'create')->name('task.create');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::get('/task/{task}', function (Task $task) {
    //this is used when there is find is used. not findorfail
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }

    return view('show', ['task' => $task]);
})->name('task.show');

Route::fallback(function () {
    return 'walang page';
});

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('task.show', ['id' => $task->id])->with('success', 'Task created successfully');
})->name('task.store');
Route::put('/tasks/{task}', function (Task $task, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('task.show', ['id' => $task->id])->with('success', 'Task updated successfully');
})->name('task.update');
