<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;
class StoreCallbackRequest extends FormRequest
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
            'name' => 'required|min:2|max:40',
            'phone' => 'required|numeric',
            'g-recaptcha-response' => new Captcha()
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name',
            'phone.required'  => 'phone',
        ];
    }
}
