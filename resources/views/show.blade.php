@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray underline decoration-blue-600"> <- Go back to Task
                list!</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700"> {{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at->diffForHumans() }}. {{ $task->updated_at->diffForHumans() }}</p>


    <p>{{ $task->completed }}</p>


    <p class="mb-4">
        @if ($task->completed)
            <span class="font-meduim text-green-600"> completed</span>
        @else
            <span class="font-meduim text-red-600">Not completed</span>
        @endif
    </p>
    <div class="flex gap-2">

        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

        <form action="{{ route('toggle-completed', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'Not completed' : 'Completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <div>

                <button type="submit" class="btn">Delete</button>
            </div>
        </form>
    </div>
@endsection
