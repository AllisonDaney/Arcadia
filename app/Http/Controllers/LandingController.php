<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Hour;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(): View {
        //dd(phpinfo());
        $feedbacks = DB::select('SELECT * FROM feedbacks WHERE status = ? LIMIT 10', ['accepted']);

        return view('landing', ["feedbacks" => $feedbacks]);
    }

    public function index_infos(): View {
        $hours = DB::select('SELECT * FROM hours');

        return view('infos', ["hours" => $hours]);
    }
}
