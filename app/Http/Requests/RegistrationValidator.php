<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegistrationValidator extends FormRequest
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
            '_firstname' => ['max:25'],
            '_lastname' => ['max:25'],
            '_password' => ['confirmed', 'min:8'],
            '_mobile' => ['integer', 'digits:10'],
            '_email' => ['regex:/^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/'],
        ];
    }
    public function messages()
    {
        return [
            '_password.confirmed' => 'The confirmation password doesn\'t match with password.',
            '_mobile.integer' => 'The mobile number must be the digits'
        ];
    }
}
