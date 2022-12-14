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
            'password' => $this->passwordRules(),
            'job' => ['required'],
            'description' => ['required','max:255'],
            'role' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'job' => $input['job'],
            'description' => $input['description'],
            'country' => $input['country'],
            'city' => $input['city'],
            'role' => $input['role'],
            'profile_photo_path' => 'https://via.placeholder.com/640x640.png/005588?text=people'.$input['name'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
