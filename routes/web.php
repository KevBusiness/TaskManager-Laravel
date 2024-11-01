<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->paginate(10)]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('status', 'Task created!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  // $data = $request->validated();
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];

  $task->update($request->validated());

  $task->save();
  return redirect()->route('tasks.show', ['task' => $task->id])->with('status', 'Task update successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('status', 'Task deleted!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('status', 'Task updated!');
})->name('tasks.toggle-complete');
