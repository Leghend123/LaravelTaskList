@extends('layouts.app')


{{-- @section('title', 'Add Task')

@section('styles')
    <style>
        .error_message {
            color: red;
            font-size: 0.8rem
        }
    </style>

@endsection --}}

@section('content')
    @include('form')

    {{-- <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Description
            </label>
            <textarea type="text" name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="title">
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Add Task</button>
    </form> --}}
@endsection
