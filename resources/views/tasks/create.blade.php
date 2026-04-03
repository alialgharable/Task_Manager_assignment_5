@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Task</h1>
        <p>Add a new personal task with a title, description, and due date.</p>
        <div>
            <button type="button" onclick="window.location='{{ route('tasks.index') }}'">Back to Tasks</button>
        </div>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label>Description</label>
                <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
            </div>

            <div>
                <label>Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date') }}" required>
            </div>

            <div>
                <button type="submit">Create Task</button>
            </div>
        </form>
    </div>
@endsection
