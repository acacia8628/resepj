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
            'area' => ['required'],
            'genre' => ['required'],
            'shopname' => ['required', 'string', 'max:255'],
            'overview' => ['required', 'string', 'max:255'],
            'imgfile' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
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
            'overview.required' => '概要を入力してください',
            'overview.string' => '文字列を入力してください',
            'overview.max' => '概要は255文字以内にしてください',
            'imgfile.image' => 'イメージファイルを選択してください',
            'imgfile.mimes' => '拡張端子は「jpg, png, jpeg, gif, svg」のいずれかにしてください',
            'imgfile.max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
