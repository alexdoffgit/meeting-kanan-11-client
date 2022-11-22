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
        try {
            $request->validate([
                'email' => 'required',
                'pwd' => 'required'
            ]);

            $email = $request->email;
            $password = $request->pwd;

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
        } catch(ValidationException $v) {
            return response('please fill all field', 400);
        } catch(\Throwable $th) {
            Log::error($th);
            return response('internal server error', 500);
        }

    }
}
