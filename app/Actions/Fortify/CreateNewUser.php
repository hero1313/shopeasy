<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'string', 'max:255', 'unique:users'],
            'shop_name' => ['required', 'string', 'max:255', 'unique:users'],
            'terms' => ['required'],
            // 'captcha' => 'required|captcha',
            'password' => $this->passwordRules(),
        ])->validate();        

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'number' => $input['number'],
            'shop_name' => $input['shop_name'],
            'terms' => $input['terms'],
            // 'captcha' => $input['captcha'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
