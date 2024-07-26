<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthFormRequest;

class AuthController extends Controller
{
    public function login(AuthFormRequest $request)
    {
        try {
            if (!Auth::attempt($request->validated())) {
                return to_route('landing')->with('error', 'Erreur lors de la connexion');
            }
        } catch (\Throwable $th) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }

        $redirectRoute = 'landing';
        $user = User::with('role')->find(Auth::id());

        if ($user->role->label === 'ADMINISTRATOR') {
            $redirectRoute = 'admin_administrator';
        } elseif ($user->role->label === 'EMPLOYEE') {
            $redirectRoute = 'admin_animals_reports';
        } elseif ($user->role->label === 'VETERINARY') {
            $redirectRoute = 'admin_veterinarians_reports';
        }

        return to_route($redirectRoute)->with('success', 'Vous êtes connecté');
    }

    public function logout()
    {
        try {
            Auth::logout();
        } catch (\Throwable $th) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }
        
        return to_route('landing')->with('success', 'Vous êtes déconnecté');
    }
}
