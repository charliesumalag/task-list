<?php


use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('/task', function () {
    $tasks = Task::latest()->paginate(5);
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('task.index');
Route::view('/task/create', 'create')->name('task.create');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::get('/task/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('task.show');

Route::fallback(function () {
    return 'walang page';
});

Route::post('/tasks', function (TaskRequest $request) {
    //this is clearner version
    $task = Task::create($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])->with('success', 'Task created successfully');
})->name('task.store');
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    //clerner version
    $task->update($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])->with('success', 'Task updated successfully');
})->name('task.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('task.index')->with('success', 'Task deleted succesfully');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {

    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully.');
})->name('task.toggle-complete');


// use Illuminate\Support\Facades\Route;
// use App\Models\Task;
// use App\Http\Requests\TaskRequest;


// Route::get('/', function () {
//     return redirect()->route('task.index');
// });


// Route::get('/task', function () {
//     $tasks = Task::latest()->get();
//     return view('index', [
//         'tasks' => $tasks,
//     ]);
// })->name('task.index');
// Route::view('/task/create', 'create')->name('task.create');

// Route::get('/task/{task}/edit', function (Task $task) {
//     return view('edit', ['task' => $task]);
// })->name('task.edit');

// Route::get('/task/{task}', function (Task $task) {
//     //this is used when there is find is used. not findorfail
//     // if (!$task) {
//     //     abort(Response::HTTP_NOT_FOUND);
//     // }

//     return view('show', ['task' => $task]);
// })->name('task.show');

// Route::fallback(function () {
//     return 'walang page';
// });

// Route::post('/tasks', function (TaskRequest $request) {
//     // $data = $request->validated();
//     // $task = new Task;
//     // $task->title = $data['title'];
//     // $task->description = $data['description'];
//     // $task->long_description = $data['long_description'];
//     // $task->save();

//     //this is clearner version
//     $task = Task::create($request->validated());
//     return redirect()->route('task.show', ['task' => $task->id])->with('success', 'Task created successfully');
// })->name('task.store');
// Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
//     // $data = $request->validated();
//     // $task->title = $data['title'];
//     // $task->description = $data['description'];
//     // $task->long_description = $data['long_description'];
//     // $task->save();

//     //clerner version
//     $task->update($request->validated());
//     return redirect()->route('task.show', ['task' => $task->id])->with('success', 'Task updated successfully');
// })->name('task.update');
