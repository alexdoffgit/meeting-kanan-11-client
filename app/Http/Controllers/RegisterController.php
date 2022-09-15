<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class RegisterController extends Controller
{
    public function displayRegister()
    {
        return view('register');
    }

    public function register(Request $r)
    {
        $name = $r->name;
        $lastName = $r->lastname;
        $email = $r->email;
        $password = $r->password;
        $confirmPassword = $r->repass;

        dd([$name, $lastName, $email, $password, $confirmPassword]);
    }
}
