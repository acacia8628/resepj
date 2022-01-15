<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => ['required', 'string', 'max:255'],
            'score' => ['required', 'numeric'],
            'comment' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'shop_id.required' => 'お店を選択してください',
            'shop_id.string' => '文字列を入力してください',
            'shop_id.max' => 'お店は255文字以内で入力してください',
            'score.required' => '評価を選択してください',
            'score.numeric' => '正しく評価してください',
            'comment.required' => 'コメントを入力してください',
            'comment.string' => '文字列を入力してください',
            'comment.max' => 'コメントは255文字以内で入力してください',
        ];
    }
}
