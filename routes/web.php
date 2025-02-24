<?php
use App\Http\Requests\TaskRequest;
use GuzzleHttp\Promise\Create;
use \Illuminate\Http\Resources;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');


Route::view('tasks/create', 'create')->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');


Route::get('/tasks/{task}', function (Task $task) {

    return view('show', ['task' => $task]);

})->name('tasks.show');


Route::post('/tasks', function (task $task, TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully');
})->name('tasks.store');


Route::put('/tasks/{task}/update', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully');
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'deleted successfully');
})->name('tasks.destroy');

Route::put('/tasks/{task}', function (Task $task) {
    $task->toggle_completed();
    return redirect()->back()->with('success', 'task updated successfully');
})->name('toggle-completed');

Route::fallback(function () {
    return '404';
});

