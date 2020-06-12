<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['min:3', 'required', 'string', 'max:255'],
            'email' => ['min:3','required', 'string', 'email', 'max:255', "unique:users,email,{$id},id"],
            'password' => ['min:3','required', 'string', 'min:6'],
        ];

        if ($this->method() == 'PUT'){
            $rules['password'] = ['min:3','nullable', 'string', 'min:6', ];
        };
        return $rules;
    }
}
