<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createForm()
    {
        return view('admin.user.create');
    }

    public function create(Request $r)
    {
        $name = $r->name;
        $email = $r->email;
        $password = $r->password;

        $user = new User;

        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        return redirect()->route('admin.user.create.get');
    }
}
