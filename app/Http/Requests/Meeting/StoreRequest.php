<?php

namespace App\Http\Requests\Meeting;

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
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string',
            'manager_id' => 'required|exists:managers,id',
            'start' => 'present|date_format:Y-m-d H:i:s',
            'finish' => 'present|date_format:Y-m-d H:i:s',
        ];
    }
}
