<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class ShopEditRequest extends FormRequest
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
            'area_id' => ['required'],
            'genre_id' => ['required'],
            'shop_name' => ['required', 'string', 'max:255'],
            'overview' => ['required', 'string', 'max:255'],
            'img_file' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'area_id.required' => 'エリアを選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'shop_name.required' => '店舗名を入力してください',
            'shop_name.string' => '文字列を入力してください',
            'shop_name.max' => '店舗名は255文字以内にしてください',
            'overview.required' => '概要を入力してください',
            'overview.string' => '文字列を入力してください',
            'overview.max' => '概要は255文字以内にしてください',
            'img_file.image' => 'イメージファイルを選択してください',
            'img_file.mimes' => '拡張端子は「jpg, png, jpeg, gif, svg」のいずれかにしてください',
            'img_file.max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
