<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
    public function store()
    {
        return [
            'username' => 'required|unique:users|string',
            'password' => 'required|min:6',
            'nickname' => 'required|string',
            'phone' => 'required|phone',
            'avatar' => 'required|file'
        ];
    }

    public function update()
    {
        return [
            'username' => 'unique:users|string',
            'password' => 'min:6',
            'nickname' => 'string',
            'phone' => 'phone',
            'avatar' => 'file'
        ];
    }
}
