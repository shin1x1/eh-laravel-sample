<?php

namespace App\Http\Controllers;

use App\Models\Task;

class GetTaskAction extends Controller
{
    public function __invoke(int $id)
    {
        $task = Task::query()->findOrFail($id);

        return response()->json([
            'id' => $task->id,
            'name' => $task->name,
        ]);
    }
}
