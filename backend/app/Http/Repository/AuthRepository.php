<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function login($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public function register($fullname, $email, $password)
    {
        return User::create([
            'fullname' => $fullname,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'user',
        ]);
    }
}