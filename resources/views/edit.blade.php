@extends('layouts.app')


@section('title', 'Edit Task')
{{--
@section('styles')
    <style>
        .error_message {
            color: red;
            font-size: 0.8rem
        }
    </style>

@endsection --}}

@section('content')


    @include('form', ['task' => $task])

    {{-- <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Description
            </label>
            <textarea type="text" name="description" id="description">{{ $task->description }}</textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Edit Task</button>
    </form> --}}

@endsection
