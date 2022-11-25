<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRERequests extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'input1'=>'required|string|min:3|max:255',
            'input2'=>'required|string|min:3|max:255',
            'input3'=>'required|string|min:3|max:255',
            'input4'=>'required|string|min:3|max:255',
            'output1'=>'required|string|min:3|max:255',
            'output2'=>'required|string|min:3|max:255',

        ];
    }
}
