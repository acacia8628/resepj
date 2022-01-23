<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegisterRequest extends FormRequest
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
            'area' => ['required'],
            'genre' => ['required'],
            'shopname' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'area.required' => 'エリアを選択してください',
            'genre.required' => 'ジャンルを選択してください',
            'shopname.required' => '店舗名を入力してください',
            'shopname.string' => '文字列を入力してください',
            'shopname.max' => '店舗名は255文字以内にしてください',
        ];
    }
}
