<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index_admin(): View {
        $users = User::get();

        return view('admins/admin_users', ["users" => $users]);
    }

    public function create(Request $request) {
         $existUser = User::where('username', $request->input('username'))->first();

        if ($existUser) {
            return ["error" => 'Le mail est déjà utilisé'];
        }

        $user = new User();
        $user->role_id = $request->input('role');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = $request->input('password');

        $user->save();

        return ["data" => $user];
    }
}
