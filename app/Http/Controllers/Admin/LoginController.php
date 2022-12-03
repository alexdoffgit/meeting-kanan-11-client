<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'pwd' => 'required'
        ]);

        $email = $data['email'];
        $password = $data['pwd'];

        $valid = Auth::attempt([
            'email' => $email,
            'password' => $password,
            'role' => 'admin'
        ]);

        if($valid) {
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
