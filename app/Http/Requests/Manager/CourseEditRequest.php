<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class CourseEditRequest extends FormRequest
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
            'shop_id' => ['required'],
            'course_name' => ['required', 'string', 'max:255'],
            'course_overview' => ['required', 'string', 'max:255'],
            'course_detail' => ['required', 'string', 'max:255'],
            'course_price' => ['required', 'numeric'],
            'course_img_file' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'shop_id.required' => 'ジャンルを選択してください',
            'course_name.required' => 'コース名を入力してください',
            'course_name.string' => '文字列を入力してください',
            'course_name.max' => 'コース名は255文字以内にしてください',
            'course_overview.required' => '概要を入力してください',
            'course_overview.string' => '文字列を入力してください',
            'course_overview.max' => '概要は255文字以内にしてください',
            'course_detail.required' => 'コース説明を入力してください',
            'course_detail.string' => '文字列を入力してください',
            'course_detail.max' => 'コース説明は255文字以内にしてください',
            'course_price.required' => '値段を入力してください',
            'course_price.numeric' => '数字を入力してください',
            'course_img_file.image' => 'イメージファイルを選択してください',
            'course_img_file.mimes' => '拡張端子は「jpg, png, jpeg, gif, svg」のいずれかにしてください',
            'course_img_file.max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
