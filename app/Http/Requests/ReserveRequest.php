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
            'r_time' => ['required', 'date_format:H:i'],
            'r_number' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'r_date.required' => '予約日を選択してください',
            'r_date.date' => '日付を入力してください',
            'r_date.after' => '明日以降の日付を選択してください',
        ];
    }
}
