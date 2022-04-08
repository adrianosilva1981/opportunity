<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidate extends FormRequest
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
        $rules =  [
            'name'     => ['required','string'],
            'email'    => ['string', 'unique:users,email'],
            'password' => ['required','string'],
            'type'     => ['required','string'],
        ];


        if ($this->method() == 'PUT') {
            $rules = [
                'name'     => ['nullable','string'],
                'email'    => ['nullable','string'],
                'password' => ['nullable','string'],
                'type'     => ['required','string'],
            ];
        }

        return $rules;
    }
}