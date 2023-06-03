<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // ユーザー管理をして機能の制限をしたいときに用いる。 デフォルトはfalseだが、使用しない場合は、true.
        // falseのままだと、403エラーになる
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // バリデーションのルールを記入する
            "title" => 'required|min:3',
            "body" => 'required',
        ];
    }

    public function messages()
    {
        return [
            // バリデーションのメッセージを記入する
            "title.required" => 'タイトルは必須です',
            "title.min" => ':min 文字以上で入力してください',
            "body.required" => '本文は必須です',
        ];
    }
}
