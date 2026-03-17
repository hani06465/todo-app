<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ $task->title }}" required>
        </div>
        
        <div>
            <label>Description:</label>
            <textarea name="description">{{ $task->description }}</textarea>
        </div>
        
        <div>
            <label>Due Date:</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" required>
        </div>
        
        <button type="submit">Update Task</button>
    </form>
    
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>