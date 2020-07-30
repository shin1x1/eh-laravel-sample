<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // (1) ここでは認証、認可は不要なので true
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100', // (2) バリデーションルールを追加
        ];
    }
}
