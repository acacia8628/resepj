<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'r_date' => ['required', 'date', 'after:tomorrow'],
            'r_time' => ['required', 'date_format:H:i:s'],
            'r_number' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'shop_id.required' => 'お店を選択してください',
            'shop_id.max' => 'お店は255文字以内で入力してください',
            'r_date.required' => '予約日を選択してください',
            'r_date.date' => '正しく日付を入力してください 例）2022-01-01',
            'r_date.after' => '明日以降の日付を選択してください',
            'r_time.required' => '予約時間を入力してください',
            'r_time.date_format' => '正しく時間を入力してください 例）17:00',
            'r_number.required' => '予約人数を入力してください',
            'r_number.numeric' => '予約人数を数字で入力してください',
        ];
    }
}
