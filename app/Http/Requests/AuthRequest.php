<?php

namespace App\Http\Requests;

/**
 * @property mixed username
 * @property mixed password
 */
class AuthRequest extends Request
{
    /**
     * @return array
     */
    public function login(): array
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
