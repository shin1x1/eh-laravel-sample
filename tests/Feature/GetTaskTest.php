<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTaskTest extends TestCase
{
    use RefreshDatabase;

    public function testGetTask()
    {
        $task = Task::factory()->create(); // (1) ファクトリでレコード追加

        $response = $this->get('/api/tasks/' . $task->id); // (2) GET リクエスト

        $response->assertStatus(200); // (3) レスポンスの検証
        $response->assertJson([
            'id' => $task->id,
            'name' => $task->name,
        ]);
    }

    public function testGetTask_not_exists_id()
    {
        Task::factory()->create();

        $response = $this->get('/api/tasks/999');

        $response->assertStatus(404);
    }

    public function testGetTask_invalid_id()
    {
        Task::factory()->create();

        $response = $this->get('/api/tasks/a');

        $response->assertStatus(404);
    }
}
