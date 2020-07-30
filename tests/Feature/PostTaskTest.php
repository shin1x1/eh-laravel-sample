<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTaskTest extends TestCase
{
    use RefreshDatabase; // (1) データベースをリセット

    public function testPostTask()
    {
        $name = 'new task';

        $response = $this->postJson('/api/tasks', [  // (2) JSON を POST
            'name' => $name,
        ]);

        $id = $response->json(['id']);

        $response->assertStatus(201);  // (3) レスポンスの検証
        $response->assertJson([
            'id' => $id,
            'name' => $name,
        ]);

        $this->assertDatabaseHas('tasks', [ // (4) データベースの検証
            'id' => $id,
            'name' => $name,
        ]);
    }

    public function testPostTask_validation_error()
    {
        $response = $this->postJson('/api/tasks', [
            'name' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }
}
