<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetHelloTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/api/hello');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello',
        ]);
    }
}
