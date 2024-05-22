<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $redirectUrl = '/';
            $user = User::with('role')->find(Auth::id());

            if ($user->role->label === 'ADMINISTRATOR') {
                $redirectUrl = route('admin_administrator');
            } elseif ($user->role->label === 'EMPLOYEE') {
                $redirectUrl = route('admin_animals_reports');
            } elseif ($user->role->label === 'VETERINARY') {
                $redirectUrl = route('admin_veterinarians_reports');
            }

            return ['redirectUrl' => $redirectUrl];
        }

        return 'error';
    }

    public function logout()
    {
        Auth::logout();

        return view('contact');
    }
}
