<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomesComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeCommentController extends Controller
{
    public function index_admin(): View {
        $homesComments = HomesComment::with(["home", "user"])->get();
        $homes = Home::get();

        return view('admins/admin_homes_comments', ["homesComments" => $homesComments, 'homes' => $homes]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $homesComment = new HomesComment();
        $homesComment->user_id = Auth::user()->id;
        $homesComment->home_id = $data['home_id'];
        $homesComment->content = $data['content'];

        $homesComment->save();

        return ["data" => $homesComment];
    }
}
