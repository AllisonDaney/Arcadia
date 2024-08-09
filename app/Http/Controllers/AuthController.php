<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthFormRequest;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Http\Requests\ChangePasswordFormRequest;
use Illuminate\View\View;
use Illuminate\Support\Str;

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

    public function reset_password(Request $request)
    {
        return view('reset_password');
    }

    public function reset_password_post(ResetPasswordFormRequest $request)
    {
        try {
            $user = User::where('username', $request->username)->first();

            if ($user) {
                $resetToken = Str::random(60);
                $user->reset_token = $resetToken;
                $user->save();

                $this->sendEmail(4, $user->username, [ "RESET_LINK" => env('APP_URL') . '/auth/change_password/' . $resetToken ]);
            }
        } catch (\Throwable $th) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }
        
        return to_route('landing')->with('success', 'Si votre email est correct, vous recevrez un mail avec le lien de changement de mot de passe');
    }

    public function change_password(Request $request, $resetToken)
    {
        $user = User::where('reset_token', $resetToken)->first();

        if (!$user) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }

        return view('change_password', [
            'resetToken' => $resetToken
        ]);
    }

    public function change_password_post(ChangePasswordFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = User::where('reset_token', $validated['reset_token'])->first();

            if ($user) {
                $user->password = Hash::make($validated['password']);
                $user->reset_token = null;
                $user->save();
            } else {
                return to_route('landing')->with('error', 'Une erreur est survenue');
            }
        } catch (\Throwable $th) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }
        
        return to_route('landing')->with('success', 'Vous avez changé votre mot de passe');
    }
}
