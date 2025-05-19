<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        return response()->json(Task::all());
    }

    public function store(Request $request) {
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function show($id) {
        return response()->json(Task::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}

