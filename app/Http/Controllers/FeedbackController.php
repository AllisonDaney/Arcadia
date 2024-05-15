<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function index_admin(): View {
        $feedbacks = Feedback::get();

        return view('admins/admin_feedbacks', ["feedbacks" => $feedbacks]);
    }

    public function create(Request $request) {
        $feedback = new Feedback();
        $feedback->rating = $request->input('rating');
        $feedback->pseudo = $request->input('pseudo');
        $feedback->content = $request->input('content');
        $feedback->status = 'accepted';

        $feedback->save();

        return ["data" => $feedback];
    }

    public function update(Request $request, Int $feedbackId) {
        $feedback = Feedback::find($feedbackId);
        $feedback->status = $request->input('status');

        $feedback->save();

        return ["data" => $feedback];
    }
}
