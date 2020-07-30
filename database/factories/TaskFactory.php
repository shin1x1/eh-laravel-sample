<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class; // (1) Task を指定

    public function definition()
    {
        return [
            'name' => $this->faker->name, // (2) レコードに登録する値を指定
        ];
    }
}
