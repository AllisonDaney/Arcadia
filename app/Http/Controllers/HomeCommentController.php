<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomesComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\HomeCommentFormRequest;

class HomeCommentController extends Controller
{
    public function index_admin(): View {
        $homesComments = HomesComment::with(["home", "user"])->get();
        $homes = Home::get();

        return view('admins/admin_homes_comments', ["homesComments" => $homesComments, 'homes' => $homes]);
    }

    public function create(HomeCommentFormRequest $request) {
        try {
            $newHomeComment = $request->validated();
            $newHomeComment['user_id'] = Auth::user()->id;

            HomesComment::create($newHomeComment);
        } catch (\Throwable $th) {
            dd($th);
            return to_route('admin_homes_comments')->with('error', "Le commentaire n'a pas été créé");
        }

        return to_route('admin_homes_comments')->with('success', "Le commentaire a été créé");
    }
}
