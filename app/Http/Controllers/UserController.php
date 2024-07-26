<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Role;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function index_admin(): View {
        $users = User::get();
        $roles = Role::where('label', '!=', 'ADMINISTRATOR')->get();

        return view('admins/admin_users', ["users" => $users, "roles" => $roles]);
    }

    public function create(UserFormRequest $request) {
        try {
            $existUser = User::where('username', $request->input('username'))->first();

            if ($existUser) {
                return to_route('admin_users')->with('error', 'Le mail est déjà utilisé');
            }

            $user = User::create($request->validated());

            $this->sendEmail(3, $user->username, [ "FIRSTNAME" => $user->firstname, "EMAIL" => $user->username ]);
        } catch (\Throwable $th) {
            dd($th);
            return to_route('admin_users')->with('error', 'Une erreur est survenue');
        }

        return to_route('admin_users')->with('success', "L'utilisateur a été créé avec succès");
    }
}
