<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (! $this->guard()->attempt($credentials)) {
            return redirect()
                ->route('admin.login')
                ->with('error', trans('auth.failed'));
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}