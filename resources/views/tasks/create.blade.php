<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create New Task</h1>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        
        <div>
            <label>Description:</label>
            <textarea name="description"></textarea>
        </div>
        
        <div>
            <label>Due Date:</label>
            <input type="date" name="due_date" required>
        </div>
        
        <button type="submit">Create Task</button>
    </form>
    
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>