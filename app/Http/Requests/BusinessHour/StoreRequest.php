<?php

namespace App\Http\Requests\BusinessHour;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'venue' => 'required|string',
            'duration' => 'required|numeric',
            'start' => 'present|date_format:Y-m-d H:i:s',
            'finish' => 'present|date_format:Y-m-d H:i:s',
        ];
    }
}
