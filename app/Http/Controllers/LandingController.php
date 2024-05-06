<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View {
        $feedbacks = Feedback::where('status', 'accepted')->limit(10)->get();

        return view('landing', ["feedbacks" => $feedbacks]);
    }
}
