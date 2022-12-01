<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            "email" => 'required|email',
            "name" => 'required',
            "last_name" => 'required',
            "password" => 'required',
            "repass" => "required|same:password"
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = 'admin';
        $user->save();

        return redirect('/admin/login');
    }
}
