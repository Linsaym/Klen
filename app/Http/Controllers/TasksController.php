<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return Task::with('tags')->get();
    }

    public function getOne(int $id)
    {
        return Task::with('tags')->find($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date'],
            'estimated_hours' => ['required', 'integer'],
            'completed' => ['boolean'],
        ]);

        return task::create($data);
    }

    public function show(task $tasks)
    {
        return $tasks;
    }

    public function update(Request $request, task $tasks)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date'],
            'estimated_hours' => ['required', 'integer'],
            'completed' => ['boolean'],
        ]);

        $tasks->update($data);

        return $tasks;
    }

    public function destroy(task $tasks)
    {
        $tasks->delete();

        return response()->json();
    }
}
