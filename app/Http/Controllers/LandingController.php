<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Hour;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View {
        $feedbacks = Feedback::where('status', 'accepted')->limit(10)->get();

        return view('landing', ["feedbacks" => $feedbacks]);
    }

    public function index_infos(): View {
        $hours = Hour::get();

        return view('infos', ["hours" => $hours]);
    }
}
