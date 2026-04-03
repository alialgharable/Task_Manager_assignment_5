@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Task</h1>
        <p>Update the task details and save your changes.</p>
        <div>
            <button type="button" onclick="window.location='{{ route('tasks.index') }}'">Back to Tasks</button>
        </div>

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PATCH')

            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div>
                <label>Description</label>
                <textarea name="description" rows="5" required>{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label>Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
            </div>

            <div>
                <button type="submit">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
