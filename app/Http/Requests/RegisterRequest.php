<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は255文字以内にしてください',
            'email.required' => 'Eメールを入力してください',
            'email.email' => 'Eメール形式で入力してください',
            'email.max' => 'Eメールは255文字以内にしてください',
            'email.unique' => '既に登録済みのEメールです',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上にしてください',
            'password.max' => 'パスワードは255文字以内にしてください',
        ];
    }
}
