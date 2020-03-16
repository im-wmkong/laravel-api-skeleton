<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'string',
                    'email' => 'email|unique:users',
                    'password' => 'min:6',
                ];
                break;
            default:
                return [];
                break;
        }
    }
}
