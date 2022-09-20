<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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

        if($password != $confirmPassword) {
            return redirect("/register", 400);
        }

        $user = new User;
        $user->name = $name;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect("/login");
    }
}
