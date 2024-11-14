@extends('layouts.app')


@section('title', isset($task) ? ' Edit Title' : 'Add Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Description
            </label>
            <textarea type="text" name="description" id="description" @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="btn mt-2">
                @isset($task)
                    Update form
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="font-medium text-gray underline decoration-red-600">Cancel</a>
        </div>
    </form>

@endsection
